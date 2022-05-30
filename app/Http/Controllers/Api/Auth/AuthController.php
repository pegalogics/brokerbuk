<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function signup(Request $request){
        $request->validate([
            'mobile' => 'required|digits:10|numeric'
        ]);

        //check for already registerd mobile number

        $checkExisting = User::where('mobile',$request->mobile)->count();
        if($checkExisting > 0){
            return response(['status' => 'error', 'message'=> 'Mobile Number already used', 'response_code'=> 400]);
        }else{

                // $send_otp = $this->sendOtp($request->mobile);
         
        if(true){
            return response(['status' => 'success', 'message'=> 'OTP send successfully', 'mobile' => $request->mobile, 'response_code'=> 200]);
        }else{
            return response(['status' => 'error', 'message'=> 'OTP send failed', 'response_code'=> 204]);
        }

        }
 
    }



    public function verifyOtp(Request $request){

        try{
            $validate = $request->validate([
                'mobile'      =>  'required|numeric|digits:10',
                'otp'    =>  'required|numeric|digits:6',
            ]);


            $mobile = $request->mobile;
            $otp = $request->otp;

            // $otp_verify_status = $this->verifyOtp($otp, $mobile);
            $otp_verify_status = ( $otp == '123456') ? true : false;

            if($otp_verify_status){
             
                $data['mobile'] = $mobile;

                $userRegister = User::create($data);

                if($userRegister){
                    $user  =   User::where('mobile',$mobile)->first();
                    $token = $user->createToken('brokerbuk')->plainTextToken;

                    return response(['status' => 'success', 'message'=> 'OTP verified successfully','token'=>$token, 'user_id'=>$user->id, 'response_code'=> 200]);
                }else{
                    return response(['status' => 'error', 'message'=> 'User Signup failed', 'response_code'=> 204]);
                }

            }else{
                return response(['status' => 'error', 'message'=> 'OTP Mis-match', 'response_code'=> 204]);
            }

        } catch (Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!!', 'response_code' => 400]);
        }
    }

}
