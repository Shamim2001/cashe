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

                            <form action="{{ request('name') ? route('role.store', request('id')) : route('role.store') }}"
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
                                    <input type="text" id="name" name="name" placeholder="type role name"
                                        class="w-full rounded-md" autocomplete="off"
                                        value="{{ old('name') ?? request('name') }}">
                                </div>
                                @error('name')
                                    <p class="text-red-500"><small class="text-red-500">{{ $message }}</small></p>
                                @enderror

                                <div class="mb-5">
                                    @php
                                        $role = Spatie\Permission\Models\Role::find(request('id'));
                                    @endphp
                                    @if (request('id'))
                                        <label for="name" class="block cursor-pointer mb-1">Permissions</label>
                                        @foreach ($permissions as $permission)
                                            <label for="permission->{{ $permission->name }}" class="cursor-pointer">
                                                <input type="checkbox" name="permissions[]"
                                                    id="permission->{{ $permission->name }}" value="{{ $permission->name }}"
                                                    {{ $permission->name == $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                <span>{{ $permission->name }}</span>
                                            </label>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="mb-5">
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
                                        <th class="border py-2">Permission</th>
                                        <th class="border py-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="roleData">
                                    @forelse ($roles as $key => $role)
                                        <tr>
                                            <td class="border py-2 text-center w-20">{{ ++$key }}</td>
                                            <td class="border py-2 text-center">{{ $role->name }}</td>
                                            <td class="border py-2 text-center">
                                                @foreach ($role->permissions as $permission)
                                                    <span
                                                        class="px-2 py-1 rounded-md bg-teal-700 text-white">{{ $permission->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="border py-2 text-center">
                                                <div class="flex justify-center ">
                                                    @can('edit')
                                                        <a href="{{ route('user.role.index') }}?name={{ $role->name }}&id={{ $role->id }}"
                                                            class="text-xl px-2"><i class="fa fa-edit text-green-600"></i>
                                                        </a>
                                                    @endcan

                                                    @can('delete')
                                                        <form action="{{ route('role.delete', $role) }}" method="POST"
                                                        onsubmit="return confirm('Do you want to delete?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-xl px-2"><i
                                                                class="fa fa-trash text-red-600"></i></button>
                                                    </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        @empty
                                            <td colspan="2" class="text-red-700">No Role Found!</td>
                                        </tr>S
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
