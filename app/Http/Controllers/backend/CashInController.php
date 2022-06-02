<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CashIn;
use Illuminate\Http\Request;

class CashInController extends Controller
{
    public function index()
    {
        $cashins = CashIn::latest()->paginate(15);
        return view('backend.cashin.index')->with('cashins', $cashins);
    }
}
