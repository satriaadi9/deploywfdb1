@extends('base.base2')

@section('title')
    {{ $title }}
@endsection

@section('content')
<div class="container my-4 mx-auto">
    <article>
        <h1 class="text-2xl font-bold">{{ $course['course_name'] }}</h1>
        <hr>
        <br>
        <p><span class="font-bold">Curriculum year:</span> {{ $course['curriculum_year'] }}</p>
        <p><span class="font-bold">Course Name (EN):</span> {{ $course['course_name_en'] }}</p>
        <p><span class="font-bold">Course Code:</span> {{ $course['course_code'] }}</p>
        <p><span class="font-bold">Course Unit:</span> {{ $course->unit->unit_name }}</p>
        <p><span class="font-bold">Students Enrolled:</span> {{ $studentCount }}</p>
        <p>Details: Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, sequi. Aliquid distinctio cupiditate eum quam illum accusamus soluta unde. Sint tempora hic voluptatem voluptates pariatur laboriosam modi officia rerum fugiat.</p>
        <br>
        <a href="/courses" class="underline text-slate-700">Back to All Courses</a>
    </article>
    <p><span class="font-bold">Students Enrolled:</span></p>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NRP</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Program</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @php
                $no = 1;
            @endphp
            @foreach ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $no++ }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->nrp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $student->unit->unit_name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>  
@endsection

