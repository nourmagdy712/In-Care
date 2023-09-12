<?php

namespace App\Http\Controllers;

use App\Models\Ambulance_request;
use App\Models\Bed_reservation;
use App\Models\Hospital;
use App\Models\Patient_feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\ForgotPassMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;


class UserController extends Controller
{
    public function userlog(Request $request){
      /*  $user=User::where('email',$request->email);
        if($user->block='1'){
            return redirect()->back()->with('error','User is blocked');
        }*/
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ],
        [
            'email.required' => 'email is must.',
            'password.required' => 'password is must.',
            'email.exists'=>'wrong email',
        ]
    );

        if(!Auth::guard()->attempt($request->only('email','password'))){
         return redirect()->back()->with('error','Invalid Credentials');
        };
        return redirect()->intended(route('home'));
    }

    public function createuser(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'phone' => 'required',
        ],[
            'name.required' => 'Name is must.',
            'email.required' => 'email is must.',
            'password.required' => 'password is must.',
            'password.min' => 'password must have 6 char.',
            'password.confirmed' => 'password must be matched.',
            'password_confirmation.required' => 'confirmation is must .',
            'phone.required' => 'phone is must.',
            'email.email' => 'please enter valid email format.',
            'email.unique' => 'this email alredy exists.',
        ]);
        if($validate->fails()){
        return back()->withErrors($validate->errors())->withInput();
        }
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone']
        ]);

        Auth::guard()->attempt($request->only('email','password'));

        return redirect()->route('home');
    }

    public function destroy(){
        Auth::guard()->logout();
        return redirect()->route('login');
    }

    public function updateprofile(Request $request){
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ],[
            'name.required' => 'Name is must.',
            'email.required' => 'email is must.',
            'phone.required' => 'phone is must.',
            'email.email' => 'please enter valid email.',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
            }
        $user=User::where('id',auth()->user()->id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);
        return redirect()->back();

    }

    public function reserveBed(Request $request,$id){

        $user=$request->user();
        $user=auth()->user();

        $image=$request->file('condition')->getClientOriginalName();
        $path= $request->file('condition')->storeAs('reports',$image,'report');

        $reservation=new Bed_reservation();
        $reservation->hospital_id = $id;
        $reservation->patient_id = $user->id;
        $reservation->gender = $request->gender;
        $reservation->name = $request->name;
        $reservation->condition = $path;
        $reservation->age = $request->age;
        $reservation->phone = $request->phone;
        $reservation->save();
        return back();
        // Bed_reservation::create([
        //     // $user=Auth::user(),
        //     'hospital_id' =>'1',
        //     'patient_id' =>$request->user(),
        //    'request_status' =>'pending',
        //     'name' => $request->name,
        //     'gender' => $request->gender,
        //     'condition' => $request->condition,
        //     'age' => $request->age,
        //     'phone' => $request->phone
        //    ]);
    
       // return response('reserved successfully');
    }
   /* public function uploadFile(){
        Storage::disk('reports')->put('','');
    }*/
    public function sendFeedback(Request $request){
       /* $validate = Validator::make($request->all(), 
        ['feedback'=>'required'],['feedback.required'=>'this field is required']);
        if($validate->fails()){
          return back()->withErrors($validate->errors())->withInput();
          }*/
        $user=$request->user();
        $user=auth()->user();
        $feedback= new Patient_feedback();
        $feedback->patient_id = $user->id;
        $feedback->reaction = $request->reaction;
        $feedback->content = $request->content;

        $feedback->save();
        return back();
        //return back()->with('status', 'Feedback sent successfully.');


    }
//to show in progress reservations
    public function cancelReservation(){
        $user=auth()->user();
        $reservations=Bed_reservation::where([
     ['request_status','pending' ],
     ['patient_id',$user->id]
        ])->orwhere( [['request_status','accepted' ],
        ['patient_id',$user->id]])->get();
        $requests=Ambulance_request::where([
            ['request_status','pending' ],
            ['patient_id',$user->id]
               ])->orwhere( [['request_status','accepted' ],
               ['patient_id',$user->id]])->get();
        return view('user.CancelReservation',compact(['reservations','requests']));
    }
//for the cancel button
    public function cancel($id){
        $reservation=Bed_reservation::with('Hospital')->where('id',$id);
        $reservation->update(['request_status'=>'cancelled']);
        return back(); 
    }
    public function cancelAmb($id){
    $request=Ambulance_request::with('Hospital')->where('id',$id);
    $request->update(['request_status'=>'cancelled']);
    return back(); 
    }
    public function viewHistory(){
        $user=auth()->user();
        $histories=Bed_reservation::where('patient_id',$user->id)->with('Hospital')->get();
        return view('user.UserReservationHis',['histories'=>$histories]);
        
    }
    public function viewResponse(){
        $user=auth()->user();

     $acceptedRes=Bed_reservation::with('Hospital')->where([
        ['patient_id',$user->id],
        ['request_status','accepted']
     ])->get();
     $rejectedRes=Bed_reservation::with('Hospital')->where([
        ['patient_id',$user->id],
        ['request_status','rejected']
     ])->get();
     $acceptedReq=Ambulance_request::with('Hospital')->where([
        ['patient_id',$user->id],
        ['request_status','accepted']
     ])->get();
     $rejectedReq=Ambulance_request::with('Hospital')->where([
        ['patient_id',$user->id],
        ['request_status','rejected']
     ])->get();
        return view('user.UserViewResponse',compact(['acceptedRes','rejectedRes','acceptedReq','rejectedReq']));
    }

    public function requestAmb(Request $request,$id){
        $user=$request->user();
        $user=auth()->user();
        $req= new Ambulance_request();
        $req->patient_id = $user->id;
        $req->hospital_id = $id;
        $req->name = $request->name;
        $req->location = $request->address;
        $req->phone_number = $request->phone;
        $location = geoip()->getLocation($_SERVER['REMOTE_ADDR']) ;
        $req->latitude=$location->lat;
        $req->longitude=$location->lon;
        $req->save();
        return back();
    }
    public function showResetPasswordForm($token) { 
        return view('auth.reset-password', ['token' => $token]);
     }
  
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
  
        $token = Str::random(64);
  
        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);
  
        Mail::to($request->email)->send(new ForgotPassMail($token), ['token' => $token]);
        
  
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    public function submitResetPasswordForm(Request $request)
  {
      $request->validate([
          'email' => 'required|email|exists:users',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required'
      ]);

      $updatePassword = DB::table('password_resets')
                          ->where([
                            'email' => $request->email, 
                            'token' => $request->token
                          ])
                          ->first();

      if(!$updatePassword){
          return back()->withInput()->with('error', 'Invalid token!');
      }

      $user = User::where('email', $request->email)
                  ->update(['password' => Hash::make($request->password)]);

      DB::table('password_resets')->where(['email'=> $request->email])->delete();

      return redirect()->route('login')->with('message', 'Your password has been changed!');
  }

  public function passupdate(Request $request){
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'
    ]);

    $user=auth()->user();
    User::where('id', $user->id)
                ->update(['password' => Hash::make($request->password)]);


    return redirect()->route('profile.edit');
  }
}