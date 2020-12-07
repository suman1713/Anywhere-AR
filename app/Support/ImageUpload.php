<?php
namespace App\Support;
use Illuminate\Http\Request;
use App\FileUpload;
use Imgur;
class ImageUpload{

    public function imageUpload($request,$index)
    {    
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.imgbb.com/1/upload?key=485f8901c859087e940ad11ac77066ae', [
        'headers' => [
            'authorization' => 'Client-ID ' . '76bde505962aab3',
            'content-type' => 'application/x-www-form-urlencoded',
        ],
        'form_params' => [
            'image' => base64_encode(file_get_contents($request->file('file')[$index]->path()))
        ],
        ]);
        return json_decode($response->getBody()->getContents())->data->url;
        
    }
}