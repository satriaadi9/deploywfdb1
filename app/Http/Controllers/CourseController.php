<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Unit;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function show(Course $course){
        $course->load(['unit', 'students']); // Eager load unit, students

        $studentCount = $course->studentCount();
        return view('course', [
            'title' => 'Course Details',
            'course' => $course,
            'students' => $course->students,
            'studentCount' => $studentCount
        ]);
    }

    public function create(){
        $units = Unit::all()->where('is_active',1);
        return view('course.create', ['title' => 'Add Course', 'units'=>$units]);
    }

    public function insert(Request $request){
        //data validation
        $request->validate([
            'course_code'=>'required|unique:courses|size:6', //unique harus ada 1 parameter nama table
            'curriculum_year'=>'required',
            'course_name'=>'required|string|max:255',
            'course_name_en'=>'required|string|max:255',
            'unit_id'=>'required',
        ],[
            'course_code.required'=>'Course code wajib diisi',
            'course_code.unique'=>'Course code sudah pernah dipakai',
            'course_code.size'=>'Course code wajib 6 char',
            'curriculum_year.required'=>'Curriculum Year wajib diisi',
            'course_name.required'=>'Course name wajib diisi',
            'course_name.required'=>'Course name (en ver) wajib diisi',
            'unit_id.required'=>'Unit wajib dipilih',
        ]);

        //prepare a Course Object
        $course = new Course;

        $course->course_code = $request->course_code;
        $course->curriculum_year = $request->curriculum_year;
        $course->course_name = $request->course_name;
        $course->course_name_en = $request->course_name_en;
        $course->unit_id = $request->unit_id;

        //insert into database using SAVE method
        $course->save();

        return redirect('/courses')->with('success','Course berhasil di tambahkan');
    }

    public function edit(Course $course){
        $units = Unit::all()->where('is_active',1);
        return view('course.edit', ['title' => 'Edit Course', 'course'=>$course ,'units'=>$units]);
    }

    public function update(Request $request, Course $course){
        //data validation
        $request->validate([
            'course_code'=>'required|unique:courses,course_code,' . $course->id . '|size:6', //unique update ada param table, dan field miliknya sendiri
            'curriculum_year'=>'required',
            'course_name'=>'required|string|max:255',
            'course_name_en'=>'required|string|max:255',
            'unit_id'=>'required',
        ],[
            'course_code.required'=>'Course code wajib diisi',
            'course_code.unique'=>'Course code sudah pernah dipakai',
            'course_code.size'=>'Course code wajib 6 char',
            'curriculum_year.required'=>'Curriculum Year wajib diisi',
            'course_name.required'=>'Course name wajib diisi',
            'course_name.required'=>'Course name (en ver) wajib diisi',
            'unit_id.required'=>'Unit wajib dipilih',
        ]);

        //update a Course Object
        $course->update([
            'course_code' => $request->course_code,
            'curriculum_year' => $request->curriculum_year,
            'course_name' => $request->course_name,
            'course_name_en' => $request->course_name_en,
            'unit_id' => $request->unit_id,
        ]);


        return redirect()
            ->route('course.edit', $course->id)
            ->with('success', 'Course updated successfully!');
    }

    public function delete(Course $course){
        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }
}
