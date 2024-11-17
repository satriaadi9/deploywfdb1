<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

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

        //check authorization
        if(!Gate::allows('insert-course')){
            abort(403);
        }

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
        //check authorization
        if(!Gate::allows('update-course')){
            abort(403);
        }

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
        //check authorization
        if(!Gate::allows('delete-course')){
            abort(403);
        }
        $course->delete();
        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }

    public function api_get_courses(Request $request){

        //get all field on spesific course id
        //$data = Course::find($request->id);

        //spesific field
        $data = Course::select(['course_code','course_name'])->find($request->id);

        if(isset($data)){
            //jika data ditemukan
            return Response::json(['data'=>$data, 'message'=>'Course found'], 200);
        }
        //jika data tidak ditemukan
        return Response::json(['message'=>'Course not found'],404);
        //abort(404);
    }

    //function luar
    public function request_api_to_course(Request $request){
        $response = Http::withToken('1|uMULdyDknAIKL8bwBaQB7QXjmO7MfkljXHk56UED1f52a874')->get('http://wfd2.test/api/get/courses/'.$request->id);

        $data = $response->json();
        $status = $response->status();
        if(isset($data['data'])){
            return Response::json(['data'=>$data['data']],$status);
        }
        
        return Response::json(['message'=>$data['message']],$status);

    }

    public function api_get_token(Request $request){
        if(Auth::attempt(['email' => 'user@user.com', 'password' => 'user'])){
            $auth=Auth::user();
            $data['token']=$auth->createToken('auth_token')->plainTextToken;

            return Response::json(['data'=>$data],200);
        }

    }
}
