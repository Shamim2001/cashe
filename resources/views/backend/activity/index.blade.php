@extends('backend.layouts.master')

@section('title', 'IDA | Activity')
@section('page', 'Activity')

@section('content')

    {{-- @forelse ($activities as $activity)
        <div class=" mt-20 px-2 py-2 flex items-center justify-between border border-gray-500 ">
            <p class="text-lg font-medium ">{{ $activity->name }}</p>
            <p class="text-lg font-medium ">{{ $activity->created_at->diffForHumans() }}</p>
        </div>
    @empty
        <p >No Activity Found!</p>
    @endforelse --}}

    <table class="mt-10 py-10 table-collaps bg-white w-full">
        <thead>
            <tr>
                <th class="text-base py-2 border border-gray-400">Name</th>
                <th class="text-base py-2 border border-gray-400">User</th>
                <th class="text-base py-2 border border-gray-400">TimeStamp</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($activities as $activity)
                <tr>
                    <td class="py-2 px-2 text-center border border-gray-400">{{ $activity->name }}</td>
                    <td class="py-2 px-2 text-center border border-gray-400">{{ $activity->user }}</td>
                    <td class="py-2 text-center border border-gray-400">{{ $activity->created_at->diffForHumans() }}</td>
                </tr>
            @empty
                <td colspan ='4' class="text-red-500 text-center text-lg">No Activity Found!</td>
            @endforelse

        </tbody>
    </table>
@endsection
