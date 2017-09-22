<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class OrderController extends Controller
{
    public function show(Request $request){
        $page = $request->input('page', 1);
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'admin/orders', [
            'verify' => false,
            'form_params' => [
                'page' => $page
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        return view('orders-list')->with('orders', $response);
    }

    public function details(Request $request, $ohid){
        $client = new Client();
        $result = $client->get(config('api.api_url') . 'admin/orders/'.$ohid, [
            'verify' => false
        ]);
        $response = json_decode((string)$result->getBody());
        return view('orders-track')->with([
            'booking' => $response->booking,
            'last_location' => $response->last_location,
            'locations' => $response->locations,
            'before_location' => $response->before_location
        ]);
    }
}
