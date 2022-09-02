<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\RequestException;
use App\Models\City;
use App\Models\Province;

class OrderController extends Controller
{
    public function index(){
        $city = City::all();
        $courier = [
            'jne', 'pos', 'tiki', 'rpx', 'pandu', 'wahana', 'sicepat', 'jnt', 'pahala', 'sap', 'jet', 'indah', 'dse', 'slis', 'first', 'ncs', 'star', 'ninja', 'lion', 'idl', 'rex', 'ide', 'sentral', 'anteraja', 'jtl'
        ];
        return view('landing', compact('city', 'courier'));
    }

    public function getProvince(){
        $client = new Client();

        try {
            $response = $client->get('https://pro.rajaongkir.com/api/province',
            [
                'headers' => [
                    'key' => env('API_KEY'),
                ]
                ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $result = json_decode($json, true);

        return $result;
        // insert data to database
        // for ($i=0; $i < count($result["rajaongkir"]["results"]) ; $i++) {
        //     $province = new Province();
        //     $province->id = $result["rajaongkir"]["results"][$i]["province_id"];
        //     $province->name = $result["rajaongkir"]["results"][$i]["province"];
        //     $province->save();
        // }
    }

    public function getCity(){
        $client = new Client();

        try {
            $response = $client->get('https://pro.rajaongkir.com/api/city',
            [
                'headers' => [
                    'key' => env('API_KEY'),
                ]
                ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $result = json_decode($json, true);

        return $result;

        // insert data to database
        // for ($i=0; $i < count($result["rajaongkir"]["results"]) ; $i++) {
        //     $city = new City();
        //     $city->id = $result["rajaongkir"]["results"][$i]["city_id"];
        //     $city->province_id = $result["rajaongkir"]["results"][$i]["province_id"];
        //     $city->name = $result["rajaongkir"]["results"][$i]["city_name"];
        //     $city->type = $result["rajaongkir"]["results"][$i]["type"];
        //     $city->save();
        // }
    }

    public function getSubdistrict(){
        $client = new Client();
        try {
            $response = $client->get('https://pro.rajaongkir.com/api/subdistrict?city=78',
            [
                'headers' => [
                    'key' => env('API_KEY'),
                ]
                ]);
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $result = json_decode($json, true);

        return $result;

        // insert data to database
        // for ($i=0; $i < count($result["rajaongkir"]["results"]) ; $i++) {
        //     $city = new City();
        //     $city->id = $result["rajaongkir"]["results"][$i]["city_id"];
        //     $city->province_id = $result["rajaongkir"]["results"][$i]["province_id"];
        //     $city->name = $result["rajaongkir"]["results"][$i]["city_name"];
        //     $city->type = $result["rajaongkir"]["results"][$i]["type"];
        //     $city->save();
        // }
    }

    public function progressShipping(Request $request){
        $client = new Client();

        $request->validate([
            'origin_city' => 'required',
            'destination_city' => 'required',
            'weight' => 'required|numeric',
            'courier' => 'required',
        ]);

        try {
            $response = $client->request('POST','https://pro.rajaongkir.com/api/cost',
            [
                'body' =>   'origin='.$request->origin_city.'&originType=city&destination='.$request->destination_city.'&destinationType=city&weight='.$request->weight.'&courier='.$request->courier.'',
                'headers' => [
                    'key' => env('API_KEY'),
                    'content-type' => 'application/x-www-form-urlencoded',
                ],
            ]
        );
        } catch (RequestException $e) {
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();
        $result = json_decode($json, true);
        $origin = $result["rajaongkir"]["origin_details"]["city_name"];
        $destination = $result["rajaongkir"]["destination_details"]["city_name"];
        $courier = $result["rajaongkir"]["query"]["courier"];
        $data = $result["rajaongkir"]["results"][0]["costs"];
        $weight = $request->weight;

        // dd($data);
        return view('get')->with([
            'origin' => $origin,
            'destination' => $destination,
            'courier' => $courier,
            'data' => $data,
            'weight' => $weight,
        ]);

    }

    public function autoCompleteCity(Request $request){
        $keyword = $request->origin_city;
        $city = City::where('name', 'like', "%" . $keyword . "%")->get();
        return response()->json($city);
    }
}
