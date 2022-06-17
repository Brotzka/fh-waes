<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CourseCreateRequest;
use App\Http\Requests\Course\CourseDeleteRequest;
use App\Http\Requests\Course\CourseListRequest;
use App\Http\Requests\Course\CourseUpdateRequest;
use App\Http\Requests\Course\ShowCourseRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function create(CourseCreateRequest $request){

        $user = $request->user();
        $request->merge(['teacher_id'=> $user->id]);

        $course = Course::create($request->all());

        return response()->json([
            "succes"=>true,
            "message"=>"Course created",
            "course"=> $course
        ], Response::HTTP_CREATED);
    }

    public function list(CourseListRequest $request){

        $courses = Course::where('teacher_id', $request->user()->id)->get();
        return response()->json([
            "success" => true,
            "data" => $courses
        ]);
    }

    public function show(ShowCourseRequest $request,$courseId){

        $course = Course::findOrFail($courseId);
        return response() -> json([
            "succes" => true,
            "course" => $course
    ]);
    }

    public function delete(CourseDeleteRequest $request, $courseId):JsonResponse{

        $course = Course::findOrFail($courseId);
        $course->delete();

        return response() -> json([
            "succes" => true,
            "course" => "Course deleted"
        ]);}

    public function update(CourseUpdateRequest $request, $courseId):JsonResponse{

        Course::where('id', $courseId)
        ->update($request->all());

        $course = Course::findOrFail($courseId);

        return response()-> json([
            "success"=>true,
            "message"=>"Course updated",
            "course"=>$course
        ]);

    }
}


