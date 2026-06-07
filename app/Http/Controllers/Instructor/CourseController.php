<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instructor\StoreCourseRequest;
use App\Http\Requests\Instructor\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{
    
    /** GET /instructor/courses */
    use AuthorizesRequests;
    public function index()
    {
        $courses = Course::forInstructor(auth()->id())
            ->latest()
            ->paginate(10);

        return view('instructor.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('instructor.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create([
            'instructor_id' => auth()->id(),
            'title'         => $request->title,
            'description'   => $request->description,
            'status'        => $request->status,
        ]);

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Course created.');
    }

    public function show(Course $course)
    {
        $this->authorize('view', $course);

        $course->load('enrolments.student');

        return view('instructor.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $this->authorize('update', $course);

        return view('instructor.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->authorize('update', $course);

        $course->update($request->validated());

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        $course->delete();

        return redirect()
            ->route('instructor.courses.index')
            ->with('success', 'Course deleted.');
    }
}