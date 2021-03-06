<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\CashIn;
use Illuminate\Http\Request;

class CashInController extends Controller
{
    public function index()
    {
        $cashins = CashIn::orderBy('id')->latest()->paginate(15);
        return view('backend.cashin.index')->with('cashins', $cashins);
    }

    public function delete($id)
    {
        CashIn::find($id)->delete();
        return redirect()->route('cashin.index')->with('success', 'Delete Successfull');
    }
}
