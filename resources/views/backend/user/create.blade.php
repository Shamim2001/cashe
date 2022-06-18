@extends('backend.layouts.master')

@section('title', 'IDA | Add New User')
@section('page', 'Add New User')

@section('content')
    <div class="bg-white mt-20">

        {{-- @if ($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif --}}

        <form class="py-10" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="flex justify-between ">
                <div class="px-10 flex-1">
                    <div class="flex justify-between items-center">
                        <label for="name" class="w-[35%] font-semibold ">Name</label>
                        <input id="name" type="text" class=" w-full border-0 bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="name" id="name" placeholder="Jhon Deo">
                    </div>
                    <div class="mx-48 mt-2">
                        @error('name')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="fatherName" class="w-[35%]">
                            <label for="fatherName" class="font-semibold ">Father's Name</label>
                        </label>
                        <input id="fatherName" type="text" class=" w-full border-0 bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="fatherName" id="fatherName" placeholder="Jhon Deo">
                    </div>
                    <div class="mx-48 mt-2">
                        @error('fatherName')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="nid" class="w-[35%] font-semibold ">NID</label>
                        <input id="nid" type="number" class=" w-full border-0 bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="nid" id="nid" placeholder="123456789123">
                    </div>
                    <div class="mx-48 mt-2">
                        @error('nid')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="email" class="w-[35%] font-semibold">Email</label>
                        <input id="email" type="text" class="w-full border-0  bg-gray-300 px-2 py-2 rounded-md focus:outline-none"
                            name="email" id="email" placeholder="jhon@deo.com">
                    </div>
                    <div class="mx-48 mt-2">
                        @error('email')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-6 flex justify-between items-center">
                        <label for="phone" class="w-[35%] font-semibold">Phone</label>
                        <input id="phone" type="text"
                            class="w-full border-0 bg-gray-300 px-2 py-2 rounded-md placeholder-shown:text-black focus:outline-none"
                            name="phone" id="phone" placeholder="0123456789">
                    </div>
                    <div class="mx-48 mt-2">
                        @error('phone')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <!-- image upload -->
                <div class="px-10">
                    <div class="flex justify-between">
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
                        <textarea name="address" id="address" class=" border-0 bg-gray-300 px-2 py-5 w-full rounded-md">Abc</textarea>
                    </div>
                    <div class="mx-48 mt-2">
                        @error('address')
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        @enderror
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
