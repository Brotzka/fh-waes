<?php

namespace App\Http\Controllers;

use App\Http\Requests\Course\CourseCreateRequest;
use App\Http\Requests\Course\CourseDeleteRequest;
use App\Http\Requests\Course\CourseListRequest;
use App\Http\Requests\Course\CourseShowRequest;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    /**
     * Create a new Course
     *
     * @param CourseCreateRequest $request
     * @return JsonResponse
     */
    public function create(CourseCreateRequest $request): JsonResponse
    {
        $user = $request->user();
        $request->merge(['teacher_id' => $user->id]);

        $course = Course::create($request->all());

        return response()->json([
            "success" => true,
            "message" => "Course created",
            "course" => $course
        ], Response::HTTP_CREATED);
    }

    /**
     * List all courses
     *
     * @param CourseListRequest $request
     * @return JsonResponse
     */
    public function list(CourseListRequest $request): JsonResponse
    {
        $courses = $request->user()->courses;
        return response()->json([
            "success" => true,
            "data" => $courses
        ]);
    }

    /**
     * Get a single Course
     *
     * @param CourseShowRequest $request
     * @param [type] $courseId
     * @return JsonResponse
     */
    public function show(CourseShowRequest $request, $courseId): JsonResponse
    {
        $course = Course::findOrFail($courseId);
        return response()->json([
            "success" => true,
            "course" => $course
        ]);
    }

    /**
     * Delete a specific course
     *
     * @param CourseDeleteRequest $request
     * @param [type] $courseId
     * @return JsonResponse
     */
    public function delete(CourseDeleteRequest $request, $courseId): JsonResponse
    {
        $course = Course::findOrFail($courseId);
        $course->delete();

        return response()->json([
            "success" => true,
            "message" => "Course deleted."
        ]);
    }
}
