@extends('backend.layouts.master')

@section('title', 'User Permission')
@section('page', 'User Permission')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <div class="flex-1 mr-20">

                            <form action="{{ request('name') ? route('permission.store', request('id')) : route('permission.store') }}"
                                method="POST">
                                @csrf
                                @if (request('id'))
                                    @method('PUT')
                                @endif
                                <div class="mb-3">
                                    @if (request('id'))
                                        <input type="hidden" name="id" value="{{ request('id') }}">
                                    @endif
                                    <label for="name" class="block cursor-pointer mb-1">Name</label>
                                    <input type="text" id="name" name="name" placeholder="type permission name"
                                        class="w-full rounded-md" autocomplete="off"
                                        value="{{ old('name') ?? request('name') }}">
                                </div>
                                @error('name')
                                    <p class="text-red-500"><small class="text-red-500">{{ $message }}</small></p>
                                @enderror

                                <div class="py-2">
                                    <button type="submit"
                                        class="px-3 py-1 bg-green-700 text-white rounded">{{ request('name') ? 'Update' : 'Create' }}</button>
                                </div>
                            </form>
                        </div>
                        <div class="flex-1">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr>
                                        <th class="border py-2">#</th>
                                        <th class="border py-2">Name</th>
                                        <th class="border py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="roleData">
                                    @forelse ($permissions as $key => $permission)
                                        <tr>
                                            <td class="border py-2 text-center w-20">{{ ++$key }}</td>
                                            <td class="border py-2 text-center">{{ $permission->name }}</td>
                                            <td class="border py-2 text-center">
                                                <div class="flex justify-center ">
                                                    <a href="{{ route('user.permission.index') }}?name={{ $permission->name }}&id={{ $permission->id }}"
                                                        class="text-xl px-2"><i class="fa fa-edit text-green-600"></i></a>

                                                    <form action="{{ route('permission.delete', $permission) }}" method="POST"
                                                        onsubmit="return confirm('Do you want to delete?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-xl px-2"><i class="fa fa-trash text-red-600"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        @empty
                                            <td colspan="3" class="text-red-700 text-center">No Role Found!</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
