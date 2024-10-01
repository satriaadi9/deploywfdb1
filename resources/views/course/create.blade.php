@extends('base.base2')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container my-4 mx-auto">
    <form action="{{ route('course.insert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="border-b border-gray-200 pb-3">
            <h2 class="text-base font-semibold text-gray-700">Input New Course</h2>
            
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    <label for="course_code" class="block text-sm font-medium leading-6 text-gray-900">Course Code</label>
                    <div class="mt-2">
                        <input type="text" name="course_code" id="course_code" maxlength="6" value="{{ old('course_code') }}" class="@error('course_code') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('course_code')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="curriculum_year" class="block text-sm font-medium leading-6 text-gray-900">Curriculum Year</label>
                    <div class="mt-2">
                        <input type="number" name="curriculum_year" id="curriculum_year" min="2020" max="2050" value="2024" step="1" class="@error('curriculum_year') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('curriculum_year')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="course_name" class="block text-sm font-medium leading-6 text-gray-900">Course Name</label>
                    <div class="mt-2">
                        <input type="text" name="course_name" id="course_name" value="{{ old('course_name') }}" class="@error('course_name') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('course_name')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="course_name_en" class="block text-sm font-medium leading-6 text-gray-900">Course Name (English ver.)</label>
                    <div class="mt-2">
                        <input type="text" name="course_name_en" id="course_name_en"  value="{{ old('course_name_en') }}" class="@error('course_name_en') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                        @error('course_name_en')
                            <div class="border border-red-500 text-red-500 text-xs italic ">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="sm:col-span-3">
                    <label for="unit_id" class="block text-sm font-medium leading-6 text-gray-900">Unit</label>
                    <div class="mt-2">
                        <select id="unit_id" name="unit_id" class="@error('course_name_en') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="" selected disabled>Select a Unit</option>
                            @foreach ($units as $unit)
                                <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                            @endforeach
                        </select>
                        @error('unit_id')
                            <div class="border border-red-500 text-red-500 text-xs italic mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/courses" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</div>  
@endsection

