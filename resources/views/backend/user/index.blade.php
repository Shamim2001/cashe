@extends('backend.layouts.master')

@section('title', 'IDA | User')
@section('page', 'User')

@section('content')
    <div class=" mt-10 py-10 flex items-center justify-between">
        <p class="text-lg font-medium">{{ count($users) }} records found</p>
        <div class="">
            <a href="#" class="btn btn_primary">Requests</a>
            <a href="{{ route('users.create') }}" class="btn btn_secondary">Add New</a>
        </div>
    </div>
    <!-- table -->
    <div class="bg-white border-gray-200">
        <table class="w-full border border-collapse">
            <thead>
                <tr>
                    <th class="border py-2 w-20">#</th>
                    <th class="border py-2">Name</th>
                    <th class="border py-2">Email</th>
                    <th class="border py-2">Father Name</th>
                    <th class="border py-2">Address</th>
                    <th class="border py-2">Phone</th>
                    <th class="border py-2">Role</th>
                    <th class="border py-2">Mail</th>
                    <th class="border py-2">Status</th>
                    <th class="border py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="py-2 text-center w-24 border">
                            <img src="{{ $user->image }}" alt="Image">
                        </td>
                        <td class="py-2 text-center border">{{ $user->name }}</td>
                        <td class="py-2 text-center border">{{ $user->email }}</td>
                        <td class="py-2 text-center border">{{ $user->fathername }}</td>
                        <td class="py-2 text-center border">{{ $user->address }}</td>
                        <td class="py-2 text-center border">{{ $user->phone }}</td>
                        <td class="py-2 text-center border">{{ $user->role }}</td>
                        <td class="py-2 text-center border  flex flex-col">
                            {{ $user->mail_sent }}
                            <a href="{{ route('users.sendEmail', $user) }}" class="bg-blue-500 border-2 w-full text-white text-sm px-3 py-0 rounded hover:bg-transparent hover:text-black  transition-all hover:duration-300 mr-2">Send
                                Email</a>
                        </td>
                        <td class="py-2 text-center border">{{ $user->status }}</td>

                        <td class="py-2 px-2 flex text-center border">
                            <a href="{{ route('users.edit', $user) }}" class="text-green-400 mx-3"><i
                                    class="fa fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST"
                                onsubmit="confirm('Do You Want To Delete!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa fa-trash text-red-500"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                    @empty
                        <td class="text-center" colspan="6">No User Record Found!</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>

@endsection

{{-- @include('backend.layouts.header')

<!-- content -->
<div class="pr-8 p-10 pt-10 bg-purple-200 mainContentArea">
    <div class=" mt-10 py-10 flex items-center justify-between">
        <p class="text-lg font-medium">{{ count($users) }} records found</p>
        <div class="">
            <a href="#" class="btn btn_primary">Requests</a>
            <a href="#" class="btn btn_secondary">Add New</a>
        </div>
    </div>
    <!-- table -->
    <div class="w-full h-full">
        <table class="bg-white w-full h-full">
            <thead>
                <tr>
                    <th class="text-base w-20 py-2 border border-gray-400">#</th>
                    <th class="text-base py-2 border border-gray-400">Name</th>
                    <th class="text-base py-2 border border-gray-400">Email</th>
                    <th class="text-base py-2 border border-gray-400">Phone</th>
                    <th class="text-base py-2 border border-gray-400">Deposite</th>
                    <th class="text-base py-2 border border-gray-400">Role</th>
                    <th class="text-base py-2 border border-gray-400">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="py-2 text-center border border-gray-400">{{ $user->id }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $user->name }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $user->email }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $user->phone }}
                        </td>
                        <td class="py-2 text-center border border-gray-400">{{ $user->role }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $user->status }}
                        </td>
                        <td class="py-2 text-center border border-gray-400">
                            <form action="{{ route('cashin') }}" method="POST"
                                onsubmit="confirm('Do You Want To Delete!')">
                                <button type="submit"><i class="fa fa-trash text-red-500"></i></button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                    @empty
                        <td class="text-center" colspan="6">No User Record Found!</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    </div>
</div>


@include('backend.layouts.sidebar')
</div>
</div>

@include('backend.layouts.footer') --}}
