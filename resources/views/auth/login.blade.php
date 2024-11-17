@extends('base.base2')

@section('title')
    {{ $title }}
@endsection

@section('content')

@if(session('error'))
    <div id="error-alert" class="fixed mx-auto mt-4 w-1/3 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-md" role="alert">
        <div class="flex justify-between items-center">
            <span>{{ session('error') }}</span>
            <button onclick="document.getElementById('error-alert').style.display='none'" class="text-red-700 hover:text-red-900 font-bold ml-4">
                &times;
            </button>
        </div>
    </div>
@endif

<div class="container my-4 mx-auto">
    <form action="{{ route('login.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-b border-gray-200 pb-3">
            <h2 class="text-base font-semibold text-gray-700">Login Page</h2>
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('email')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                    </div>
                </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="" class="text-sm font-semibold leading-6 text-gray-900">Sign Up</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
            </div>
        </div>
    </form>
</div>  
@endsection

