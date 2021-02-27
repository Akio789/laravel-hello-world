<?php

namespace App\Http\Api\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\Coin;

class CoinsController extends BaseController
{
    public function index(Request $request)
    {
        $coins = Coin::all();
        return response()->json($coins);
    }
}
