@extends('base.base2')

@section('title')
    {{ $title }}
@endsection

@section('content')

@if(session('success'))
    <div id="success-alert" class="fixed mx-auto mt-4 w-1/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md" role="alert">
        <div class="flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('success-alert').style.display='none'" class="text-green-700 hover:text-green-900 font-bold ml-4">
                &times;
            </button>
        </div>
    </div>
@endif

<a href="{{ route('course.create') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Insert Course</a>
<div class="container my-4 mx-auto grid grid-cols-1 lg:grid-cols-3 gap-4">
    @foreach ($courses as $course)
        <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
            <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">{{ $course['course_name'] }} ({{ $course['curriculum_year'] }}) - {{ $course['course_code'] }}</h3>
            <h3 class="text-slate-900 dark:text-white text-sm font-light tracking-tight">{{ $course['course_name_en'] }}</h3>
            <h3 class="text-slate-900 dark:text-white text-sm font-light tracking-tight">Unit: {{ $course->unit->unit_name }}</h3>
            <hr>
            <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Enim accusantium repellat dolorem minima sint quae temporibus quo obcaecati sunt sit. Veniam, doloribus nam earum consectetur qui autem repellendus totam at?
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="/course/view/{{ $course['id'] }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Show Details</a>
                <a href="{{ route('course.edit', $course->id)  }}" class="rounded-md bg-indigo-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
                @if ($course->students->count()==0)
                <form action="{{ route('course.delete', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');" style="display: inline;">
                    @csrf
                    @method('delete')
                    
                    <button type="submit" class="rounded-md bg-red-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-200">
                        Delete
                    </button>
                </form>
                @else
                    <button disabled class="rounded-md bg-gray-400 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-200">Delete</button>
                @endif
            </div>
        </div>  
    @endforeach
</div>  
@endsection

