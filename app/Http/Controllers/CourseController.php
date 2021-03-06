<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;

use App\Course;
use App\Category;
use Illuminate\Http\Request;

class CourseController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index($category)
	{
		$category = Category::findOrFail($category);
		$courses = $category->courses()->orderBy('position', 'asc')->get();
		
		return view('courses.index', compact('courses', 'category'));
	}

	public function api($category) {
 
		$category = Category::findOrFail($category);
		$courses = $category->courses()->with('registrations')->get();
		return Response::json($courses, 200, [], JSON_NUMERIC_CHECK);
	}
	
	public function create($categories)
	{
		$category = Category::findOrFail($categories);
		$courses = $category->courses()->count();
		return view('courses.create', compact('category', 'courses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request, $category)
	{
		$course = new Course();

		$course->name = $request->input("name");
        $course->description = $request->input("description");
        $course->places = $request->input("places");
        $course->position = $request->input("position");
        $course->category_id = $category;
        $course->status = $request->input("status");
        
        $courses = Course::where('position', '>=', $course->position)->get();
        
        foreach ($courses as $moved_course)
		{
		    ++$moved_course->position;
		    $moved_course->save();
		}

		$course->save();

		return redirect()->route('categories.courses.index', $category)->with('message', 'Curso creado.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($category, $id)
	{
		$course = Course::findOrFail($id);

		return view('courses.show', compact('course'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($category, $id)
	{
		$course = Course::findOrFail($id);
		$courses = Course::all()->count() + 1;

		return view('courses.edit', compact('course', 'courses'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $category, $id)
	{
		$course = Course::findOrFail($id);
		
		if ($course->position > $request->input("position")) {
			$courses = Course::whereBetween('position', [$request->input("position"), $course->position])->get();
		    foreach ($courses as $moved_course)
			{
			    ++$moved_course->position;
			    $moved_course->save();
			}
		} elseif ($course->position < $request->input("position")){
		    $courses = Course::whereBetween('position', [$course->position, $request->input("position")])->get();
		    foreach ($courses as $moved_course)
			{
			    --$moved_course->position;
			    $moved_course->save();
			}
		}

		$course->name = $request->input("name");
        $course->description = $request->input("description");
        $course->places = $request->input("places");
        $course->position = $request->input("position");
        $course->status = $request->input("status");

		$course->save();

		return redirect()->route('categories.courses.index', $category)->with('message', 'Curso actualizado.');
	}

	public function status($id)
	{
		$course = Course::findOrFail($id);
		
		if ($course->status) {
		    $course->status = 0;
		} else {
		    $course->status = 1;
		}

		$course->save();

	}
	
	public function destroy($id)
	{
		$course = Course::findOrFail($id);
		$course->delete();
		
		$courses = Course::where('position', '>=', $course->position)->get();
        
        foreach ($courses as $moved_course)
		{
		    --$moved_course->position;
		    $moved_course->save();
		}
	}

}
