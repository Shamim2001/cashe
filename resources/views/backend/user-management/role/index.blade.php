@extends('backend.layouts.master')

@section('title', 'User Role')
@section('page', 'User Role')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <div class="flex-1 mr-20">
                            <form action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="mb-5">
                                    <label for="name" class="block cursor-pointer">Name</label>
                                    <input type="text" id="name" name="name" placeholder="type role name" class="w-full rounded-md">
                                </div>
                                @error('name')
                                    <p class="text-red-500"><small class="text-red-500">{{ $message }}</small></p>
                                @enderror

                                <div class="py-2">
                                    <button type="submit" class="px-3 py-1 bg-green-700 text-white rounded">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="flex-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="roleData">
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
