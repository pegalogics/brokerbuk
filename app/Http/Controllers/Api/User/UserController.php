<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\UserProfileDetails;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

 public function updateUserDetails(Request $request){
     $request->validate([
         'user_id' =>'required|numeric|min:1',
         'fname' => 'required',
         'lname' => 'required',
         'password' => 'required',
         'office_address' => 'required',
         'city' => 'required',
         'state' => 'required',
         'aow' => 'required', // area of work
         'exp_in_year' => 'required',
         'tod' => 'required', // type of deal
         'service_intro' => 'required',
     ]);

     // required values
     $user_id = $request->user_id;
     $fname = $request->fname;
     $lname = $request->lname;
     $password = $request->password;
     $office_address = $request->office_address;
     $city = $request->city;
     $state = $request->state;
     $aow = $request->aow;
     $exp_in_year = $request->exp_in_year;
     $tod = $request->tod;
     $service_intro = $request->service_intro;

     //optional values 
     $office_address2 = $request->office_address2;
     $email = $request->email;
     $gst_n = $request->gst_n;
     $company_name = $request->company_name;

     $userCheck = User::where('id', $user_id)->first();

     if($userCheck != null){

        $user_data = [
               
            'fname'	=> $fname,
            'lname'	=> $lname,
            'password'=>  Hash::make($password)
        ]; 

        if($email != ''){
            $user_data['email'] = $email;
        }
       
        $user = User::where('id', $user_id)->update($user_data);

        $checkExisting = UserProfileDetails::where('user_id', $user_id)->first();

        if($checkExisting != null){

           $user_detail_data = [
            'office_add_1' => $office_address,	
            'city' => $city,	
            'state' => $state,	
            'work_area' => $aow,	
            'total_exp' => $exp_in_year,
            'type_of_segment' => $tod,	
            'service_intro' => 	$service_intro
           ];

           if($office_address2 != ''){
            $user_detail_data['office_add_2'] = $office_address2;
            }

            if($company_name != ''){
                $user_detail_data['company_name'] = $company_name;
            }

            if($gst_n != ''){
                $user_detail_data['gst_n'] = $gst_n;
            }
            
            $userDetailStatus = UserProfileDetails::where('user_id', $user_id)->update($user_detail_data);

         return response(['data' => '', 'status' => 'success', 'response_code' => 200, 'message' => 'User details updated successfully!!']);


        }else{
            
           $user_detail_data = [
            'user_id' => $user_id,
            'office_add_1' => $office_address,	
            'city' => $city,	
            'state' => $state,	
            'work_area' => $aow,	
            'total_exp' => $exp_in_year,
            'type_of_segment' => $tod,	
            'service_intro' => 	$service_intro
           ];


           if($office_address2 != ''){
            $user_detail_data['office_add_2'] = $office_address2;
            }

            if($company_name != ''){
                $user_detail_data['company_name'] = $company_name;
            }

            if($gst_n != ''){
                $user_detail_data['gst_n'] = $gst_n;
            }
            
            $userDetailStatus = UserProfileDetails::create($user_detail_data);

            return response(['data' => '', 'status' => 'success', 'response_code' => 200, 'message' => 'User details created successfully!!']);


        }

     }else{
         return response(['data' => '', 'status' => 'error', 'response_code' => 204, 'message' => 'User dose not exist!!']);
     }














 }

}
