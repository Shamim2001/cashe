@extends('backend.layouts.master')

@section('title', 'IDA | CashIn')
@section('page', 'CASH IN')

@section('content')
    <div class=" mt-10 py-10 flex items-center justify-between">
        <p class="text-lg font-medium">{{ count($cashins) }} deposits found</p>
        <div class="">
            <a href="#" class="btn btn_primary">Requests</a>
            <a href="#" class="btn btn_secondary">Add New</a>
        </div>
    </div>
    <!-- table -->
    <table class="w-full border-collaps bg-white ">
        <thead>
            <tr>
                <th class="border py-2 text-center px-2">#</th>
                <th class="border py-2 text-center px-2">Depositor</th>
                <th class="border py-2 text-center px-2">Amount</th>
                <th class="border py-2 text-center px-2">Transaction ID</th>
                <th class="border py-2 text-center px-2">Date</th>
                <th class="border py-2 text-center px-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cashins as $cash)
                <tr>
                    <td class="border py-2 text-center px-2">{{ $cash->id }}</td>
                    <td class="border py-2 text-center px-2">{{ $cash->user->name }}</td>
                    <td class="border py-2 text-center px-2">{{ $cash->amount }}</td>
                    <td class="border py-2 text-center px-2">{{ $cash->transaction_id }}</td>
                    <td class="border py-2 text-center px-2 flex items-center justify-between">
                        {{ $cash->created_at->format('d M, Y') }}
                        <small class="">{{ $cash->created_at->diffForHumans() }}</small>
                    </td>
                    <td class="border text-center px-2">
                        <div class="border-2 border-red-500 rounded-md inline-block px-2 py-1">
                            <form action="{{ route('cashin.delete', $cash->id) }}" method="POST"
                                onsubmit="confirm('Do You Want To Delete!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fa fa-trash text-red-500 "></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                @empty
                    <td class="text-center" colspan="6">No Cash In Record Found!</td>
                </tr>
            @endforelse
        </tbody>

    </table>
    <div class="mt-6">
        {{ $cashins->links() }}
    </div>

@endsection
