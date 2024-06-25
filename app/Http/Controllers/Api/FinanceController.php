<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finance;

class FinanceController extends Controller
{
    public function index()
    {
        $finance = Finance::all();
        return response()->json([
            'data' => $finance
        ], 200);
    }
}
