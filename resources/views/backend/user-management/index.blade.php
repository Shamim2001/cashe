@extends('backend.layouts.master')

@section('title', 'IDA | User')
@section('page', 'User')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th class="border py-2">#</th>
                                <th class="border py-2">Name</th>
                                <th class="border py-2">Email</th>
                                <th class="border py-2">Roles</th>
                                <th class="border py-2">Permissions</th>
                                <th class="border py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody id="roleData">
                            @forelse ($users as $key => $user)
                                <tr>
                                    <td class="border py-2 text-center w-20">{{ ++$key }}</td>
                                    <td class="border py-2 text-center">{{ $user->name }}</td>
                                    <td class="border py-2 text-center">{{ $user->email }}</td>
                                    <td class="border py-2 text-center">
                                        @foreach ($user->getRoleNames() as $role )
                                            <span class="px-2 py-1 bg-teal-500 text-white rounded-md">{{ $role }}</span>
                                        @endforeach
                                    </td>
                                    <td class="border py-2 text-center">
                                        @foreach ($user->getPermissionNames() as $permission )
                                            <span class="px-2 py-1 bg-purple-500 text-white rounded-md">{{ $permission }}</span>
                                        @endforeach
                                    </td>
                                    <td class="border py-2 text-center">
                                        <div class="flex justify-center ">
                                            <a href="{{ route('user.edit', $user) }}"
                                                class="text-xl px-2"><i class="fa fa-edit text-green-600"></i></a>

                                            <form action="{{ route('user.delete', $user) }}" method="POST"
                                                onsubmit="return confirm('Do you want to delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xl px-2"><i
                                                        class="fa fa-trash text-red-600"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                @empty
                                    <td colspan="5" class="text-red-700 text-center">No Users Found!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
