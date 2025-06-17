<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TravelInfoController extends Controller
{
    public function weather(Request $request)
    {
        $city = $request->input('city');
        $apiKey = env('OPENWEATHER_API_KEY');
        $url = "https://api.openweathermap.org/data/2.5/forecast?q={$city},JP&units=metric&appid={$apiKey}";

        $response = Http::get($url);
        if ($response->successful()) {
            return response()->json($response->json());
        }
        return response()->json(['error' => 'Unable to fetch weather data'], 500);
    }

    public function places(Request $request)
    {
        $city = $request->input('city');
        $apiKey = env('FOURSQUARE_API_KEY');
        $url = "https://api.foursquare.com/v3/places/search?near={$city},JP&limit=5";
        // You can add category filtering if needed (see Foursquare docs).

        $response = Http::withHeaders([
            'Authorization' => $apiKey,
            'accept' => 'application/json',
        ])->get($url);

        if ($response->successful()) {
            return response()->json($response->json());
        }
        return response()->json(['error' => 'Unable to fetch places data'], 500);
    }
}
