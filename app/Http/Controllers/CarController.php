<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class CarController extends Controller
{
    public function index(Request $request){
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

    public function show(Request $request, $cid){
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'admin/cars/show/'.$cid, [
            'verify' => false,
            'form_params' => [
                
            ]
        ]);
        $result2 = $client->post(config('api.api_url') . 'admin/brands', [
            'verify' => false
        ]);
        $response2 = json_decode((string)$result2->getBody());
        $response = json_decode((string)$result->getBody());
        if($response->status == 'OK'){
            return view('cars-view')->with([
                'car' => $response->car,
                'brands' => $response2
            ]);
        }else{
            return redirect()->back();
        }  
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
        $this->validate($request, [
            'name' => 'required',
            'cbid' => 'required|numeric',
            'model' => 'required',
            'release_year' => 'required|digits:4',
            'car_types' => 'required|in:SEDAN,SUV,HATCHBACK,SPORT',
            'transition_mode' => 'required|in:AUTO,MANUAL',
            'price' => 'required|numeric',
            'capacity' => 'nullable|numeric',
            'doors' => 'nullable|numeric',
            'large_bags' => 'nullable|numeric',
            'small_bags' => 'nullable|numeric',
            'air_conditioned' => 'required|boolean',
            'fuel_policy' => 'nullable',
            'unlimited_mileage' => 'required|boolean',
            'limit_mileage' => 'nullable|numeric'
        ]);
        $client = new Client();
        $result = $client->post(config('api.api_url') . 'admin/cars/create', [
            'verify' => false,
            'form_params' => [
                'name' => $request->name,
                'cbid' => $request->cbid,
                'model' => $request->model,
                'release_year' => $request->release_year,
                'car_types' => $request->car_types,
                'transition_mode' => $request->transition_mode,
                'price' => $request->price,
                'capacity' => $request->capacity,
                'doors' => $request->doors,
                'large_bags' => $request->large_bags,
                'small_bags' => $request->small_bags,
                'air_conditioned' => $request->air_conditioned,
                'fuel_policy' => $request->fuel_policy,
                'unlimited_mileage' => $request->unlimited_mileage,
                'limit_mileage' => $request->limit_mileage
            ]
        ]);
        $response = json_decode((string)$result->getBody());
        if($response->status == 'OK'){
            $cid = $response->car->cid;
            return redirect("/cars/$cid");
        }else{
            $request->session()->flash('success', false);
            $request->session()->flash('status', 'Error creating a car!');
            return redirect()->back()->withInput();
        }
        
    }
}
