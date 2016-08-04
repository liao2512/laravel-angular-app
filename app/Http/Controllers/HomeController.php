<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->orderBy('position', 'asc')->get();
		return view('home', compact('categories'));
    }
    
    public function cursos($category)
	{
		$category = Category::findOrFail($category);
		$courses = $category->courses()->where('status', 1)->orderBy('position', 'asc')->get();
		return view('cursos', compact('courses', 'category'));
	}
	
	public function curso($course)
	{
		$course = Course::findOrFail($course);
		return view('curso', compact('course'));
	}
}
