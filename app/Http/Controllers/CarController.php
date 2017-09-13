<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CarController extends Controller
{
    public function show(Request $request){
        $page = $request->input('page', 1);
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'admin/cars', [
            'verify' => false,
            'form_params' => [
                'page' => $page
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        return view('cars-list')->with('cars', $response);
    }

    public function add(Request $request){
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'admin/brands', [
            'verify' => false
        ]);
        $response = json_decode((string)$result->getBody());
        return view('cars-new')->with('brands', $response);
    }

    public function create(Request $request){
        
    }
}
