<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\UserEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::orderBy( 'id' )->latest()->paginate( 15 );
        return view( 'backend.user.index' )->with( 'users', $users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view( 'backend.user.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $user = User::create( [
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make( $request->password ),
            'fathername' => $request->fatherName,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'image'      => $thumb,
        ] );

        // Activity Event fire

        $this->sendEmail( $user );


        return redirect()->route( 'users.index' )->with( 'success', 'User Created' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( User $user ) {
        return view( 'backend.user.show' )->with( 'user', $user );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user ) {
        return view( 'backend.user.edit' )->with( 'user', $user );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            Storage::delete( 'public/uploads/clients' . $thumb );

            $request->file( 'thumbnail' )->storeAs( 'public/uploads/clients', $thumb );
        }

        $user->update( [
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make( $request->password ),
            'fathername' => $request->fatherName,
            'address'    => $request->address,
            'phone'      => $request->phone,
            'image'      => $thumb,
            'role'       => $request->role,
            'status'     => $request->status,
        ] );

        return redirect()->route( 'users.index' )->with( 'success', 'User has been Updated' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( User $user ) {

        $user->delete();

        $thumb = pathinfo( $user->image );
        $image_ext = $thumb['basename'];

        Storage::delete( 'public/uploads/clients/' . $image_ext );

        return redirect()->route( 'users.index' )->with( 'success', 'User has been Deleted!' );
    }

    // Email send
    public function sendEmail( User $user ) {

        $token = Str::random(60);
        DB::table('password_resets')->insert(['email' => $user->email, 'token' => bcrypt($token), 'created_at'=> now()]);

        $data = [
            'user' => Auth::user(),
            'client' => $user,
            'token' => $token,
        ];

        Mail::send(new UserEmail($data));

        // Mail::send( 'emails.email', ['token' => $token, 'email' =>$user->email ], function ( $message ) use($user) {
        //     $message->from( Auth::user()->email, Auth::user()->name );
        //     $message->to( $user->email, $user->name );
        //     $message->subject( 'Test Mail' );
        // } );

        $user->update( [
            'mail_sent' => 'yes',
        ] );

       // reset password send email
        // $status = Password::sendResetLink(
        //     ['email' => $user->email]
        // );

        // if ($status == Password::RESET_LINK_SENT) {
        //    return redirect()->route( 'users.index' )->with( 'success', 'Email has been Sent' );
        // }

            return redirect()->route( 'users.index' )->with( 'success', 'Email has been Sent' );
    }

}
