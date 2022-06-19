@extends('backend.layouts.master')

@section('title', 'IDA | Dashboard')
@section('page', 'Dashboard')

@section('content')
    <div class="mt-10 py-10 ">
        <!-- Card -->
        <div class="grid grid-cols-4 gap-5">
            <div class="bg-yellow-600 rounded-md">
                <a href="" class="flex px-10 py-10 flex-col items-center text-white">
                    <h2 class="font-semibold text-2xl mb-2">20,00,000</h2>
                    <p>Current Balance</p>
                </a>
            </div>
            <div class="bg-green-600 rounded-md">
                <a href="" class="flex px-10 py-10 flex-col items-center text-white">
                    <h2 class="font-semibold text-2xl mb-2">60,00,000</h2>
                    <p>Total Deposite</p>
                </a>
            </div>
            <div class="bg-teal-600 rounded-md">
                <a href="" class="flex px-10 py-10 flex-col items-center text-white">
                    <h2 class="font-semibold text-2xl mb-2">30,00,000</h2>
                    <p>Total Loan</p>
                </a>
            </div>
            <div class="bg-blue-500 rounded-md">
                <a href="" class="flex px-10 py-10 flex-col items-center text-white">
                    <h2 class="font-semibold text-2xl mb-2">500</h2>
                    <p>Users</p>
                </a>
            </div>
        </div>
        <!-- end card -->

        <!-- content -->
        <div class="flex py-10">
            <div class="flex-1 mr-4 ">
                <div class="bg-white rounded-md">
                    <img src="{{ asset('backend/assets/images/chart.png') }}" alt="">
                </div>
            </div>
            <!-- right content -->
            <div class="flex-1  ml-4">
                <h2 class="font-semibold text-2xl mb-3">Deposite</h2>
                <div class="bg-white rounded-md flex items-center justify-between p-5">
                    <div class="">
                        <h3 class="mb-2">500 tk Deposite by Jhon Deo</h3>
                        <span>
                            <a href="#" class="px-2 py-1 text-sm rounded-md bg-blue-500 ">Approve</a>
                            <a href="#" class="px-2 py-1 ml-2 text-sm rounded-md bg-red-500">Deny</a>
                        </span>
                    </div>
                    <div class="">
                        <p>15 minutes ago</p>
                    </div>
                </div>
                <div class="bg-white rounded-md flex items-center justify-between p-5">
                    <div class="">
                        <h3 class="mb-2">500 tk Deposite by Jhon Deo</h3>
                        <span>
                            <a href="#" class="px-2 py-1 text-sm rounded-md bg-blue-500 ">Approve</a>
                            <a href="#" class="px-2 py-1 ml-2 text-sm rounded-md bg-red-500">Deny</a>
                        </span>
                    </div>
                    <div class="">
                        <p>15 minutes ago</p>
                    </div>
                </div>
                <div class="bg-white rounded-md flex items-center justify-between p-5">
                    <div class="">
                        <h3 class="mb-2">500 tk Deposite by Jhon Deo</h3>
                        <span>
                            <a href="#" class="px-2 py-1 text-sm rounded-md bg-blue-500 ">Approve</a>
                            <a href="#" class="px-2 py-1 ml-2 text-sm rounded-md bg-red-500">Deny</a>
                        </span>
                    </div>
                    <div class="">
                        <p>15 minutes ago</p>
                    </div>
                </div>
                <div class="bg-white rounded-md flex items-center justify-between p-5">
                    <div class="">
                        <h3 class="mb-2">500 tk Deposite by Jhon Deo</h3>
                        <span>
                            <a href="#" class="px-2 py-1 text-sm rounded-md bg-blue-500 ">Approve</a>
                            <a href="#" class="px-2 py-1 ml-2 text-sm rounded-md bg-red-500">Deny</a>
                        </span>
                    </div>
                    <div class="">
                        <p>15 minutes ago</p>
                    </div>
                </div>
                <div class="bg-white rounded-md flex items-center justify-between p-5">
                    <div class="">
                        <h3 class="mb-2">500 tk Deposite by Jhon Deo</h3>
                        <span>
                            <a href="#" class="px-2 py-1 text-sm rounded-md bg-blue-500 ">Approve</a>
                            <a href="#" class="px-2 py-1 ml-2 text-sm rounded-md bg-red-500">Deny</a>
                        </span>
                    </div>
                    <div class="">
                        <p>15 minutes ago</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end content -->
    </div>
@endsection
