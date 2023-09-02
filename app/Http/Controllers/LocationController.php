<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    public function getDistricts($divisionId)
    {
        $districts = DB::table('districts')
                    ->where('division_id', '=', $divisionId)
                    ->get();
        return response()->json([
            'districts' => $districts
        ]);
    }
}
