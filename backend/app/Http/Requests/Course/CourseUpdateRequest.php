<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;

class CourseUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $userId = $this->user()->id;
        $courseId = $this->route()->parameter('courseId');

        $course = Course::findOrFail($courseId);
        return $course->teacher_id == $userId;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ['sometimes','required', 'string'],
            "description" => ['sometimes','required', 'String'],
            "start_date" => ['sometimes','required', 'date'],
            "end_date" => ['sometimes','required', 'date']
        ];
    }
}
