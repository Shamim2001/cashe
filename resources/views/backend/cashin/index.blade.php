@include('backend.layouts.header')

<!-- content -->
<div class="pr-8 p-10 pt-20 bg-purple-200 mainContentArea">
    <div class=" mt-10 py-10 flex items-center justify-between">
        <p class="text-lg font-medium">50 users found</p>
        <div class="">
            <a href="#" class="btn btn_primary">Requests</a>
            <a href="#" class="btn btn_secondary">Add New</a>
        </div>
    </div>
    <!-- table -->
    <div class="w-full h-full">
        <table class="bg-white w-full h-full">
            <thead class="border-2 border-gray-400">
                <tr class="">
                    <th class="text-lg w-20 py-2 border-2 border-gray-400">#</th>
                    <th class="text-lg py-2 border-2 border-gray-400">Depositor</th>
                    <th class="text-lg py-2 border-2 border-gray-400">Amount</th>
                    <th class="text-lg py-2 border-2 border-gray-400">Transaction ID</th>
                    <th class="text-lg py-2 border-2 border-gray-400">Date</th>
                    <th class="text-lg py-2 border-2 border-gray-400">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cashins as $cashin)
                    <tr>
                        <td class="py-2 text-center border-2 border-gray-400">{{ $cashin->id }}</td>
                        <td class="py-2 text-center border-2 border-gray-400">{{ $cashin->user->name }}</td>
                        <td class="py-2 text-center border-2 border-gray-400">{{ $cashin->amount }}</td>
                        <td class="py-2 text-center border-2 border-gray-400">{{ $cashin->transaction_id }}</td>
                        <td class="py-2 text-center border-2 border-gray-400">{{ $cashin->created_at->format('d m, Y') }}</td>
                        <td class="py-2 text-center border-2 border-gray-400">btn</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div class="mt-6">
            {{ $cashins->links() }}
        </div>
    </div>

</div>



@include('backend.layouts.sidebar')
</div>
</div>

@include('backend.layouts.footer')
