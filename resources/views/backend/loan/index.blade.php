@extends('backend.layouts.master')

@section('title', 'IDA | Loan')
@section('page', 'Loan')

@section('content')
    <div class=" mt-10 py-10 flex items-center justify-between">
        <p class="text-lg font-medium">{{ count($loans) }} records found</p>
        <div class="">
            <a href="#" class="btn btn_primary">Requests</a>
            <a href="{{ route('loan.create') }}" class="btn btn_secondary">Add New</a>
        </div>
    </div>
    <!-- table -->
        <table class="table-collaps bg-white w-full">
            <thead>
                <tr>
                    <th class="text-base w-20 py-2 border border-gray-400">#</th>
                    <th class="text-base py-2 border border-gray-400">Name</th>
                    <th class="text-base py-2 border border-gray-400">Loan Amount</th>
                    <th class="text-base py-2 border border-gray-400">Loan Date</th>
                    <th class="text-base py-2 border border-gray-400">Return Amount</th>
                    <th class="text-base py-2 border border-gray-400">Return Date</th>
                    <th class="text-base py-2 border border-gray-400">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($loans as $loan)
                    <tr>
                        <td class="py-2 text-center border border-gray-400">{{ $loan->id }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $loan->user->name }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $loan->loan_amount }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $loan->created_at->format('d M, Y') }}
                        </td>
                        <td class="py-2 text-center border border-gray-400">{{ $loan->received_amount }}</td>
                        <td class="py-2 text-center border border-gray-400">{{ $loan->updated_at->format('d M, Y') }}
                        </td>
                        <td class="py-2 text-center border border-gray-400">
                            <div class="bg-red-500 inline-block px-2 py-1 rounded">
                                <form action="{{ route('loan.destroy', $loan->id) }}" method="POST"
                                    onsubmit="confirm('Do You Want To Delete!')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fa fa-trash text-white "></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    @empty
                        <td class="text-center" colspan="6">No loan Record Found!</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        <div class="mt-6">
            {{ $loans->links() }}
        </div>
@endsection
