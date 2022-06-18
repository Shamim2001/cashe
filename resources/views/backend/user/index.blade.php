@extends('backend.layouts.master')

@section('title', 'IDA | User')
@section('page', 'User')

@section('content')
    <div class=" mt-10 py-10 flex items-center justify-between">
        <p class="text-lg font-medium">{{ count($users) }} records found</p>
            <a href="{{ route('users.create') }}" class="btn btn_secondary">Add New</a>
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
                        <td class="py-2 text-center border">
                            <img src="{{ $user->image }}" alt="Image">
                        </td>
                        <td class="py-2 text-center border">{{ $user->name }}</td>
                        <td class="py-2 text-sm text-center border">{{ $user->email }}</td>
                        <td class="py-2 text-center border">{{ $user->fathername }}</td>
                        <td class="py-2 text-sm text-center border">{{ $user->address }}</td>
                        <td class="py-2 text-center border">{{ $user->phone }}</td>
                        <td class="py-2 px-1 text-center border">{{ $user->role }}</td>
                        <td class="py-2 text-center border  flex flex-col">
                            {{ $user->mail_sent }}
                            <a href="{{ route('users.sendEmail', $user) }}" class="bg-blue-500 border-2 w-full text-white text-sm px-3  rounded hover:bg-transparent hover:text-black  transition-all hover:duration-300 mr-2">Send
                                Email</a>
                        </td>
                        <td class="py-2 text-center border">{{ $user->status }}</td>

                        <td class="py-2 px-2 flex text-center border">
                            <a href="{{ route('users.edit', $user) }}" class="text-green-400 mx-3 border-2 border-green-400 p-1 rounded-md"><i
                                    class="fa fa-edit"></i></a>
                            <form action="{{ route('users.destroy', $user) }}" class="border-2 border-red-500 rounded-md p-1" method="POST"
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
