<?php 

namespace App\Helper;
class ImageHelper
{

    public static function GetApi($url)
    {
        $client = new \GuzzleHttp\Client();
        $url = "http://165.22.215.229:3080/suman_ar";
        $request = $client->get($url);
        $response = $request->getBody();
        return $response;
    }


    public static function PostApi($url,$body, $image) {
        $client = new \GuzzleHttp\Client();
        $body[ '$image'] =$request->$image;
        $url = "http://165.22.215.229:3080/save_image";
        $response = $client->request("POST", $url, ['form_params'=>$body]);
        $response = $client->send($image_token);
        return $response;
    }
}
