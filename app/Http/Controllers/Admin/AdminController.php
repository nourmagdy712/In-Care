<?php

namespace App\Http\Controllers\Admin;

use App\Events\WelcomeHos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hospital;
use App\Models\Patient_feedback;
use App\Models\Hospital_feedback;
use App\Models\Payment_detail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponseMail;

class AdminController extends Controller
{
    public function show(){
        $hospitals=Hospital::where('block','0')->get(); 
        return view('Admin.Dashboard',compact('hospitals'));
        }
        public function showSubscriptions(){
            $subscriptions=Hospital::all()->where('status','pending');
            return view('Admin.ViewSubscriptions',compact('subscriptions'));
        }
        public function showFeedbacks(){
            $HospitalFeedbacks=Hospital_feedback::with('Hospital')->get();
            $UserFeedbacks=Patient_feedback::with('User')->get();
            return view('Admin.viewFeedbacks',compact(['HospitalFeedbacks','UserFeedbacks']));
        }
      /*  public function blockHospital($id){
        $hospital=Hospital::findorFail($id);
        $hospital->update(['block'=>'1
        ']);
       $data=['availability'=>'not'];
        $hospital->fill($data); 
        $hospital->save();
        return response('blocked');
          }*/
    
          public function blockUser(Request $request){
            $email = $request->input('userMail');
            $user=User::where('email',$email);
            $user->update(['block'=>'1']);
        }
        
        public function blockHos($id){
         //   $em = $request->input('hospitalMail');
            $hos=Hospital::where('id',$id);
            $hos->update(['block'=>'1']);
            return redirect()->back();
         
        } 
    
        public function addHospital(Request $request){
            $request->validate(
                [
                    'email' => 'email|unique:hospitals,email'
                ]
                );
           Hospital::create([
                'admin_id'=>'1',
                'Hospital_name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->pass),
                'phone' => $request->phone,
                'address' => $request->address,
                'type' => $request->type,
                'status' =>'accepted'
               ]);
               return redirect()->back();
        }
    
        public function setdate(Request $request){
           Payment_detail::create([
                 'admin_id'=>auth()->guard('admin')->user()->id,
                 'hospital_id' => $request->hospitalid,
                 'appointment_date' => $request->paymentdetails,
                ]);
                return redirect()->back();
         }

        public function acceptHos($id){
            $hosp=Hospital::where('id',$id);
            $hosp->update(['status'=>'accepted']);
            return redirect()->back();
        }
    
        public function rejectHos($id){
            $hosp=Hospital::where('id',$id)->first();
            $hosp->update([
              'status'=>'rejected',
                'block'=>'1'
            ]);
           // event(new WelcomeHos($hosp));
            Mail::to($hosp->email)->send(new ResponseMail($hosp->email));
            return redirect()->back();
        }

}
