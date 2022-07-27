@extends('backend.layouts.master')

@section('title', 'IDA | User Edit')
@section('page', 'User Edit')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>{{ $user->name }}</h2>
                    <form action="{{ route('user.update', $user) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="max-w-xl">
                            <div class="mt-6">
                                <label for="name" class="block cursor-pointer mb-1 font-semibold">Roles :</label>
                                @foreach ($roles as $role)
                                    <label for="role->{{ $role->name }}" class="cursor-pointer">
                                        <input type="checkbox" name="roles[]" id="role->{{ $role->name }}"
                                            value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                        <span>{{ $role->name }}</span>
                                    </label>
                                @endforeach

                            </div>
                            <div class="mt-6">
                                <label for="name" class="block cursor-pointer mb-1 font-semibold">Permission :</label>
                                @foreach ($permissions as $permission)
                                    <label for="permission->{{ $permission->name }}" class="cursor-pointer">
                                        <input type="checkbox" name="permissions[]" id="permission->{{ $permission->name }}"
                                            value="{{ $permission->name }}"
                                            {{ $permission->name == $user->hasDirectPermission($permission->name) ? 'checked' : '' }}>
                                        <span>{{ $permission->name }}</span>
                                    </label>
                                @endforeach

                            </div>
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="bg-teal-700 px-2 py-1 text-white rounded-md">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
