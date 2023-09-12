<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Mail\HosForgotPass;
use App\Models\Ambulance_request;
use App\Models\Bed_reservation;
use App\Models\Hospital;
use App\Models\Hospital_feedback;
use App\Models\Payment_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; 
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail; 

class HospitalController extends Controller
{

   public function HosLog(Request $request){
 //   $hospital=Hospital::where('email',$request->email);
      /*  if($hospital->block='1'){
            return redirect()->back()->with('error','Hospital is blocked');
        }*/
    $request->validate([
      'email' => 'required|email|exists:hospitals',
      'password' => 'required',
    ],[
      'email.required' => 'email is must.',
      'password.required' => 'password is must.',
      'email.exists'=>'wrong email',
   // 'password.exists'=>'wrong password'
    ]
);
      if(!Auth::guard('hospital')->attempt($request->only('email','password'))){
       return redirect()->back()->with('error','Invalid Credentials');
      };
      return redirect()->intended(route('hospital.home'));
   }
   public function createhospital(Request $request){
      $validate = Validator::make($request->all(), [
         'name' => 'required',
         'email' => 'required|email|unique:hospitals,email',
         'password' => 'required|min:6|confirmed',
         'password_confirmation' => 'required',
         'address' => 'required',
         'phone' => 'required',
         'type'=>'required',
     ],[
         'name.required' => 'Name is must.',
         'email.required' => 'email is must.',
         'password.required' => 'password is must.',
         'password.min' => 'password must have 6 char.',
         'password.confirmed' => 'password must be matched.',
         'password_confirmation.required' => 'confirmation is must .',
         'phone.required' => 'phone is must.',
         'address.required' => 'address is must.',
         'type.required' => 'type is must.',
         'email.email' => 'please enter valid email.',
         'email.unique' => 'this email already exists.',
     ]);
     if($validate->fails()){
      return back()->withErrors($validate->errors())->withInput();
      }
      Hospital::create([
         'admin_id'=>'1',
          'Hospital_name' => $request['name'],
          'email' => $request['email'],
          'password' => Hash::make($request['password']),
          'phone' => $request['phone'],
          'address' => $request['address'],
          'type'=>$request['type']
      ]);
      Auth::guard('hospital')->attempt($request->only('email','password'));

      return redirect()->route('hospital.home');
  }
   public function destroy(){
      Auth::guard('hospital')->logout();
      return redirect()->route('hospital.login');
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
   $hospital=Hospital::where('id',auth()->guard('hospital')->user()->id);
   $hospital->update([
       'Hospital_name'=>$request->name,
       'email'=>$request->email,
       'phone'=>$request->phone,
       'password'=>Hash::make($request->password),
       'availability'=>$request->availability,
   ]);
 //  return redirect()->route('hospital.profile');
 return redirect()->back();
}
    public function sendFeedback(Request $request){
     /* $validate = Validator::make($request->all(), 
      ['feedback'=>'required'],['feedback.required'=>'this field is required']);
      if($validate->fails()){
        return back()->withErrors($validate->errors())->withInput();
        }*/
        $hospital=auth()->guard('hospital')->user();

        $feedback=new Hospital_feedback();
       $feedback->hospital_id = $hospital->id;
        $feedback->reaction = $request->reaction;
        $feedback->content = $request->feedback;
        $feedback->save();
     return view('Hospital.HosFeedback');
    }

    public function viewBedReq(){
      $hospital=auth()->guard('hospital')->user();

    $reservations=Bed_reservation::all()->where('hospital_id',$hospital->id)->where('request_status','pending');
     return view('Hospital.HosReservationReq',compact('reservations'));
    }

    public function viewAmbReq(){
      $hospital=auth()->guard('hospital')->user();

    $ambRequests=Ambulance_request::all()->where('hospital_id',$hospital->id)->where('request_status','pending');
     return view('Hospital.ambulance requests',compact('ambRequests'));
    }

    public function acceptres($id){
      $res=Bed_reservation::where('id',$id);
      $res->update(['request_status'=>'accepted']);
      return back();
    }

    public function rejectres($id){
      $res=Bed_reservation::where('id',$id);
      $res->update(['request_status'=>'rejected']);
      return back();
   }

   public function acceptreq($id){
      $req=Ambulance_request::where('id',$id);
      $req->update(['request_status'=>'accepted']);
      return back();
   }

   public function rejectreq($id){
      $req=Ambulance_request::where('id',$id);
      $req->update(['request_status'=>'rejected']);
      return back();
   }
   public function viewresponse(){
   // $acceptedhos=Hospital::where('status','accepted')->get();
    $appointments=Payment_detail::where('hospital_id',auth()->guard('hospital')->user()->id)->get();
    return view('Hospital.HosViewResponse',compact('appointments'));
   }

   public function showResetPasswordForm($token) { 
      return view('Hospital.NewPassword', ['token' => $token]);
   }

  public function submitForgetPasswordForm(Request $request)
  {
      $request->validate([
          'email' => 'required|email|exists:hospitals',
      ]);

      $token = Str::random(64);

      DB::table('password_resets')->insert([
          'email' => $request->email, 
          'token' => $token, 
          'created_at' => Carbon::now()
        ]);

      Mail::to($request->email)->send(new HosForgotPass($token), ['token' => $token]);
      

      return back()->with('message', 'We have e-mailed your password reset link!');
  }
  public function submitResetPasswordForm(Request $request)
  {
      $request->validate([
          'email' => 'required|email|exists:hospitals',
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

      $user = Hospital::where('email', $request->email)
                  ->update(['password' => Hash::make($request->password)]);

      DB::table('password_resets')->where(['email'=> $request->email])->delete();

      return redirect()->route('hospital.login')->with('message', 'Your password has been changed!');
  }

  public function hpassupdate(Request $request){
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
        'password_confirmation' => 'required'
    ]);

    $hospital=auth()->guard('hospital')->user();
    Hospital::where('id', $hospital->id)
                ->update(['password' => Hash::make($request->password)]);


    return redirect()->route('hospital.update');
  }

}
