<?php

namespace App\Http\Controllers;

use App\Models\RadioStation;

class RadioStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all radio stations
        $stations = RadioStation::all();

        return response()->json([
            'data' => $stations
        ], 200);
    }

    public function getStation(int $id)
    {
        // get one station by id
        $station = RadioStation::whereId($id)->firstOrFail();

        return response()->json([
            'data' => $station
        ], 200);
    }
}
