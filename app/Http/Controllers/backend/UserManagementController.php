<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller {
    public function index() {
        return view( 'backend.user-management.index' )->with( 'users', User::orderBy( 'name', 'ASC' )->get() );
    }

    public function userEdit( User $user ) {
        return view( 'backend.user-management.edit' )->with( [
            'user'  => $user,
            'roles' => Role::orderBy( 'name', 'ASC' )->get(),
            'permissions' => Permission::orderBy( 'name', 'ASC' )->get(),
        ] );
    }

    public function userUpdate( Request $request, User $user ) {

        $user->syncRoles( $request->roles );
        $user->syncPermissions( $request->permissions );
        return redirect()->route( 'user.management.index' )->with( 'success', 'Updated Successfull' );
    }

    // Role function start
    public function roleIndex() {
        return view( 'backend.user-management.role.index' )->with( [
            'roles'       => Role::orderBy( 'name', 'ASC' )->get(),
            'permissions' => Permission::orderBy( 'name', 'ASC' )->get(),
        ] );
    }

    public function roleStore( Request $request ) {
        if ( $request->isMethod( 'post' ) ) {
            $request->validate( [
                'name' => 'required|unique:roles,name',
            ] );
            Role::create( [
                'name' => Str::slug( $request->name ),
            ] );
            $msg = 'created successfull';

        } else if ( $request->isMethod( 'put' ) ) {
            $request->validate( [
                'name' => 'required|unique:roles,name,' . $request->id,
            ] );

            $role = Role::find( $request->id );
            $role->update( [
                'name' => Str::slug( $request->name ),
            ] );

            // permissions
            $role->syncPermissions($request->permissions);

            $msg = 'Updated successfull';
        }

        return redirect()->route( 'user.role.index' )->with( 'success', $msg );
    }

    public function roleDelete( Role $role ) {
        $role->delete();
        return redirect()->route( 'user.role.index' )->with( 'success', 'Deleted Successfull' );
    }
    // End role

    // Permission function start
    public function permissionIndex() {
        return view( 'backend.user-management.permission.index' )->with( 'permissions', Permission::orderBy( 'name', 'ASC' )->get() );
    }

    public function permissionStore( Request $request ) {
        if ( $request->isMethod( 'post' ) ) {
            $request->validate( [
                'name' => 'required|unique:permissions,name',
            ] );
            Permission::create( [
                'name' => Str::slug( $request->name ),
            ] );
            $msg = 'created successfull';

        } else if ( $request->isMethod( 'put' ) ) {
            $request->validate( [
                'name' => 'required|unique:permissions,name,' . $request->id,
            ] );
            Permission::find( $request->id )->update( [
                'name' => Str::slug( $request->name ),
            ] );
            $msg = 'Updated successfull';
        }

        return redirect()->route( 'user.permission.index' )->with( 'success', $msg );
    }

    public function permissionDelete( Permission $permission ) {
        $permission->delete();
        return redirect()->route( 'user.permission.index' )->with( 'success', 'Deleted Successfull' );
    }
}
