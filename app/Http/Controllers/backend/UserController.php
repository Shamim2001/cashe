<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller {
    public function index() {
        $users = User::orderBy( 'id' )->latest()->paginate( 15 );
        return view( 'backend.user.index' )->with( 'users', $users );
    }

    public function create() {
        return view( 'backend.user.create' );
    }

    public function store( Request $request ) {
        $request->validate( [
            'name'       => 'required|max:100',
            'fatherName' => 'required|max:100',
            'nid'        => 'required',
            'email'      => 'required|max:255|email',
            'phone'      => 'required',
            'address'    => 'required|',
        ] );

        $thumb = '';
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            $thumb = time() . '-' . $request->file( 'thumbnail' )->getClientOriginalName();
            $thumb = str_replace( ' ', '-', $thumb );

            $request->file( 'thumbnail' )->storeAs( 'public/uploads/clients', $thumb );
        }

        User::create( [
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make( Str::random( 8 ) ),
            'fathername' => $request->fatherName,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'image'      => $thumb,
        ] );

        return redirect()->route( 'users.index' )->with( 'success', 'User Created' );
    }

    public function edit( User $user ) {
        return view( 'backend.user.edit' )->with( 'user', $user );
    }

    public function update( Request $request, User $user ) {
        $request->validate( [
            'name'       => 'required|max:100',
            'fatherName' => 'required|max:100',
            'nid'        => 'required',
            'email'      => 'required|max:255|email',
            'phone'      => 'required',
            'address'    => 'required',
        ] );

        $thumb = $user->image;
        if ( !empty( $request->file( 'thumbnail' ) ) ) {
            $thumb = time() . '-' . $request->file( 'thumbnail' )->getClientOriginalName();
            $thumb = str_replace( ' ', '-', $thumb );
            Storage::delete('public/uploads/clients'.$thumb);

            $request->file( 'thumbnail' )->storeAs( 'public/uploads/clients', $thumb );
        }

        $user->update( [
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make( Str::random( 8 ) ),
            'fathername' => $request->fatherName,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'image'      => $thumb,
            'role'       => $request->role,
            'status'     => $request->status,
        ] );

        return redirect()->route( 'users.index' )->with( 'success', 'User Updated' );
    }

    public function destroy( User $user ) {


        $user->delete();
        return redirect()->route( 'users.index' )->with( 'success', 'User Deleted!' );
    }

     // Email send
    public function sendEmail(User $user)
    {
        Mail::send('emails.email', [''], function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('john@johndoe.com', 'John Doe');
            $message->subject('Test Mail');
        });
        return redirect()->route('users.index')->with('success', 'Email Sent');
    }

}
