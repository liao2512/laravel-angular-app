<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		return view('categories.index');
	}
	
	public function api() {
 
		$categories = Category::with('courses')->get();
		return $categories;
	}
 
	public function create()
	{
		$categories = Category::all()->count() + 2;
		return view('categories.create', compact('categories'));
	}

	public function store(Request $request)
	{
		$category = new Category();

		$category->name = $request->input("name");
		$category->position = $request->input("position");
        $category->status = $request->input("status");
        
        $categories = Category::where('position', '>=', $category->position)->get();
        
        foreach ($categories as $moved_category)
		{
		    ++$moved_category->position;
		    $moved_category->save();
		}

		$category->save();

		return redirect()->route('categories.index')->with('message', 'Categoría creada.');
	}

	public function show($id)
	{
		$category = Category::findOrFail($id);

		return view('categories.show', compact('category'));
	}


	public function edit($id)
	{
		$category = Category::findOrFail($id);
		$categories = Category::all()->count() + 1;

		return view('categories.edit', compact('category', 'categories'));
	}

	public function update(Request $request, $id)
	{
		$category = Category::findOrFail($id);
		
		if ($category->position > $request->input("position")) {
			$categories = Category::whereBetween('position', [$request->input("position"), $category->position])->get();
		    foreach ($categories as $moved_category)
			{
			    ++$moved_category->position;
			    $moved_category->save();
			}
		} elseif ($category->position < $request->input("position")){
		    $categories = Category::whereBetween('position', [$category->position, $request->input("position")])->get();
		    foreach ($categories as $moved_category)
			{
			    --$moved_category->position;
			    $moved_category->save();
			}
		}

		$category->name = $request->input("name");
		$category->position = $request->input("position");
        $category->status = $request->input("status");

		$category->save();

		return redirect()->route('categories.index')->with('message', 'Categoría actualizada.');
	}

	public function status($id)
	{
		$category = Category::findOrFail($id);
		
		if ($category->status) {
		    $category->status = 0;
		} else {
		    $category->status = 1;
		}

		$category->save();

	}
	
	public function destroy($id)
	{
		$category = Category::findOrFail($id);
		$category->delete();
		
		$categories = Category::where('position', '>=', $category->position)->get();
        
        foreach ($categories as $moved_category)
		{
		    --$moved_category->position;
		    $moved_category->save();
		}

		return redirect()->route('categories.index')->with('message', 'Categoría eliminada.');
	}

}