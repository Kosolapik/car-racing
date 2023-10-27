<?php

namespace App\Http\Controllers\CarRacing;

use App\Http\Controllers\Controller;
use App\Services\CarRacing\DataProcessing;
use Illuminate\Http\Request;

class CarRacingController extends Controller
{
    public function index ()
    {
        $data = new DataProcessing;
        $table = $data->getReadyData();
        $index = 1;
        return view('car-racing-index', compact('table', 'index'));
    }
}
