<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    // public static function sendNotification($title, $body, $firebaseToken, $type) {
	// 	// $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

	// 	$SERVER_API_KEY = 'AAAAWwo24mM:APA91bEAX6--bfmIrO1m9mqocoOpT2rHdHuv6o0BY9oJIF_pwW2i_ffVdHBqXIjOfP7DKCiV_VLPJuSuMNrpGZmfFIf58PO_GTRmw13fSJztYjmPmZd1BNG6daaRMVfLm-WbHyNxcFTf';

	// 	$data = [
	// 		"registration_ids" => $firebaseToken,
	// 		"notification" => [
	// 			"title" => $title,
	// 			"body" => $body,
	// 		],
	// 		"data" => [
	// 			"title" => $title,
	// 			"body" => $body,
	// 			"type" => $type,
	// 		],
	// 	];
	// 	$dataString = json_encode($data);

	// 	$headers = [
	// 		'Authorization: key=' . $SERVER_API_KEY,
	// 		'Content-Type: application/json',
	// 	];

	// 	$ch = curl_init();

	// 	curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
	// 	curl_setopt($ch, CURLOPT_POST, true);
	// 	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	// 	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

	// 	$response = curl_exec($ch);
	// 	return $response;
	// 	// dd($response);
	// }

    
    // public function postNotification(){
    //     return 'notification send successfully';
    // }

    // public function sendOtp($mobile){
        
    //     $otp = '1234';
    //     $obj = MobileOtp::where('mobile',$mobile);
    //     if($obj->count() > 0){
    //         $obj->update(['otp'=>$otp]);
    //     }else{
    //         MobileOtp::create(['mobile'=>$mobile,'otp'=>$otp]);
    //     }
    //     return true;
    // }
    // public function verifyOtp($otp,$mobile){
        
    //     $obj = MobileOtp::where(['mobile' => $mobile, 'otp' => $otp]);
    //     if($obj->count() > 0){
    //        return true;
    //     }else{
    //         return false;
    //     }
       
    // }

    // protected function uploadFiles_on_server($directory, $file,$filename, $permission = null){
       
	// 	// $file->move($directory, $filename);
	// 	$status = Storage::putFileAs($directory,$file,$filename,'public');

	// 	if($status){

	// 		return true;
	// 	}else{
	// 		return false;
	// 	}

    // }

	// protected function getAppSetting(){
	// 	$appsetting = DB::where('id','1')->firest();
    //     return $appsetting;
    // }





}
