@extends('backend.layouts.master')

@section('title', 'IDA | Loan')
@section('page', 'Add New Loan')

@section('content')
    <div class="bg-white mt-20">

        @if ($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif

        <form class="py-10" action="{{ route('loan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex justify-between ">
                <div class="px-10 flex-1">
                    <!-- radio btn  -->
                    <div class="flex items-center justify-start" id="clientType">
                        <p class="w-[26%] capitalize text-gray-700 text-base font-semibold">client type</p>

                        <input type="radio" name="clientType" id="newClient" class="mr-2 cursor-pointer" value="new"
                            {{ old('clientType') == 'new' ? 'checked' : '' }}>
                        <label for="newClient" class="text-sm mr-5  font-medium capitalize">New Client</label>

                        <input type="radio" name="clientType" id="oldClient" class="mr-2 cursor-pointer" value="old"
                            {{ old('clientType') == 'old' ? 'checked' : '' }}>
                        <label for="oldClient" class="text-sm mr-5 font-medium capitalize">Old Client</label>

                        <input type="radio" name="clientType" id="member" class="mr-2 cursor-pointer" value="member"
                            {{ old('clientType') == 'member' ? 'checked' : '' }}>
                        <label for="member" class="text-sm mr-5 font-medium capitalize">Member</label>
                    </div>

                    <div class="mt-6 flex justify-between items-center" id="clientName">
                        <label for="name" class="w-[35%] font-semibold ">Name</label>
                        <input type="text" class=" w-full border-0 bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="name" id="name" placeholder="Jhon Deo">
                    </div>

                    <div class="mt-6 flex items-center justify-between" id="memberInput">
                        <label for="clientname" class="w-[35%]">
                            <label for="clientname" class="font-semibold ">Member</label>
                        </label>
                        <select name="clientname" id="clientname" class="w-full border-0 bg-gray-300 px-2 py-2 rounded-md">
                            <option value="">Select Type</option>
                            <option value="">Select Type</option>
                            <option value="">Select Type</option>
                        </select>
                    </div>
                    <div class="mt-6 flex items-center justify-between" id="clientSelect">
                        <label for="clientname" class="w-[35%]">
                            <label for="clientname" class="font-semibold ">Client Name</label>
                        </label>
                        <select name="clientname" id="clientname" class="w-full border-0 bg-gray-300 px-2 py-2 rounded-md">
                            <option value="">Select Client</option>
                        </select>
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="fatherName" class="w-[35%]">
                            <label for="fatherName" class="font-semibold ">Father's Name</label>
                        </label>
                        <input type="text" class=" w-full border-0 bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="fatherName" id="fatherName" placeholder="Jhon Deo">
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="nid" class="w-[35%] font-semibold ">NID</label>
                        <input type="number" class=" w-full border-0 bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="nid" id="nid" placeholder="123456789123">
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="email" class="w-[35%] font-semibold">Email</label>
                        <input type="text" class="w-full border-0  bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="email" id="email" placeholder="jhon@deo.com">
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="phone" class="w-[35%] font-semibold">Phone</label>
                        <input type="text"
                            class="w-full border-0 bg-gray-300 px-2 py-2 rounded-md placeholder-shown:text-black focus:outline-none"
                            name="phone" id="phone" placeholder="0123456789">
                    </div>

                </div>
                <!-- image upload -->
                <div class="px-10">
                    <div class="flex mt-12 justify-between">
                        <div class=" flex flex-col">
                            <div class="pb-6">
                                <img id="previewImg" class="w-48 max-h-56"
                                    src="{{ asset('backend/assets/images/users.png') }}" alt="image">
                            </div>

                            <label for="thumbnail" class="rounded-md bg-sky-600 text-white text-sm text-center py-2">Upload
                                Image</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="hidden border-0"
                                onchange="previewFile(this)">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between ">
                <div class="flex-1 px-10">
                    <div class="mt-6 flex justify-between items-baseline">
                        <label for="address" class="w-[23%] font-semibold">Address</label>
                        <textarea name="address" id="address" class=" border-0 bg-gray-300 px-2 py-5 w-full rounded-md">abc</textarea>
                    </div>


                    <div class="mt-6 flex items-center">
                        <label for="business" class="w-[181px] font-semibold">Business Type</label>
                        <select name="business" id="business" class="w-64 border-0 bg-gray-300 py-2 rounded-md">
                            <option value="">Select Type</option>
                            <option value="Cow Business">Cow Business</option>
                            <option value="Marrage">Marrage</option>
                            <option value="Devorse">Devorse</option>
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <div class="mt-6 flex items-center ">
                            <label for="loanAmount" class="w-[182px] font-semibold">Loan Amount</label>
                            <input type="number" name="loanAmount" id="loanAmount"
                                class="w-64 border-0 bg-gray-300 py-2 rounded-md focus:outline-none">
                        </div>
                        <div class="mt-6 flex items-center ">
                            <label for="loanDate" class="w-[182px] font-semibold">loan Date</label>
                            <input type="date" name="loanDate" id="loanDate"
                                class="w-64 border-0 bg-gray-300 py-2 rounded-md focus:outline-none">
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="mt-6 flex items-center ">
                            <label for="returnAmount" class="w-[182px] font-semibold">Return Amount</label>
                            <input type="number" name="returnAmount" id="returnAmount"
                                class="w-64 border-0 bg-gray-300 py-2 rounded-md focus:outline-none">
                        </div>
                        <div class="mt-6 flex items-center ">
                            <label for="returnDate" class="w-[182px] font-semibold">Return Date</label>
                            <input type="date" name="returnDate" id="returnDate"
                                class="w-64 border-0 bg-gray-300 py-2 rounded-md focus:outline-none">
                        </div>
                    </div>
                </div>
            </div>

            <!-- btn -->
            <div class="mt-14 pb-40">
                <div class="ml-auto flex items-center justify-center">
                    <button type="button" class="btn btn_primary" id="formClear">
                        Clear
                    </button>
                    <button type="submit" class="btn bg-blue-500">Save</button>
                </div>
            </div>
        </form>
    </div>

@endsection
