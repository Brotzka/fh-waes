<?php

namespace App\Http\Requests\Course;
use App\Models\Course;

use Illuminate\Foundation\Http\FormRequest;

class ShowCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $userID = $this->user()->id;
        $courseID = $this->route()->parameter('courseId');

        $course = Course::findOrFail($courseID);
    

        return $userID === $course->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
