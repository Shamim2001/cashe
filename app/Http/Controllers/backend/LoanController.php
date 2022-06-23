<?php

namespace App\Http\Controllers\backend;

use App\Events\ActivityEvent;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Loan;
use App\Models\LonerInformation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoanController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $loans = Loan::latest()->paginate();
        return view( 'backend.loan.index' )->with( 'loans', $loans );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.loan.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ) {
        if ( $request->clientType == 'new' ) {
            // dd( $request->all() );
            $request->validate( [
                'name'         => 'required|max:100',
                'fatherName'   => 'required|max:100',
                'nid'          => 'required',
                'email'        => 'required|max:255|email',
                'phone'        => 'required',
                'address'      => 'required|',
                'business'     => 'required|not_in:none',
                'loanAmount'   => 'required|integer',
                'loanDate'     => 'required',
                'returnAmount' => 'required|integer',
                'returnDate'   => 'required',
            ] );

            $thumb = '';
            if ( !empty( $request->file( 'thumbnail' ) ) ) {
                $thumb = time() . '-' . $request->file( 'thumbnail' )->getClientOriginalName();
                $thumb = str_replace( ' ', '-', $thumb );

                $request->file( 'thumbnail' )->storeAs( 'public/uploads/clients', $thumb );
            }

            $user = User::create( [
                'name'   => $request->name,
                'email'  => $request->email,
                'password'  => Hash::make(Str::random(8)),
                'fathername'  => $request->fatherName,
                'address'  => $request->address,
                'phone'  => $request->phone,
                'image'  => $thumb,
                'role'   => 'client',
                'status' => 'active',
            ] );

            $loan = Loan::create( [
                'loan_amount'     => $request->loanAmount,
                'loan_date'       => $request->loanDate,
                'received_amount' => $request->returnAmount,
                'received_date'   => $request->returnDate,
                'user_id'         => $user->id,
            ] );

            LonerInformation::create([
                'user_id' => $user->id,
                'loan_id' => $loan->id,
                'address' => $request->address,
                'nid' => $request->nid,
                'business_category' => $request->business,
            ]);

            // Activity Event Fire

            return redirect()->route('loan.index')->with('success', 'Loan Created');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id ) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id ) {
        Loan::find($id)->delete();

        // Activity Event fire

        return redirect()->route('loan.index')->with('success', 'Loan has been Deleted!');
    }
}
