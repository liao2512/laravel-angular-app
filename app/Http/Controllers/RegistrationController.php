<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Registration;
use App\Course;
use Illuminate\Http\Request;

class RegistrationController extends Controller {
	
	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index($course)
	{
		$course = Course::findOrFail($course);
		$registrations = $course->registrations()->orderBy('apellidos', 'asc');
		
		return view('registrations.index', compact('registrations', 'course'));
	}
	
	public function api($course) {
 
		$course = Course::findOrFail($course);
		$registrations = $course->registrations()->with('payments')->with('user')->get();
		return $registrations;
	}

	public function create($course)
	{
		$course = Course::findOrFail($course);
		return view('registrations.create', compact('course'));
	}

	public function store(Request $request, $course)
	{
		$registration = new Registration();

		$registration->nombres = $request->input("nombres");
        $registration->apellidos = $request->input("apellidos");
        $registration->phone = $request->input("phone");
        $registration->fecha = $request->input("fecha");
        $registration->banco = $request->input("banco");
        $registration->referencia = $request->input("referencia");
        $registration->monto = $request->input("monto");
        $registration->comentarios = $request->input("comentarios");
        $registration->course_id = $course;

		$registration->save();

		return redirect()->route('courses.registrations.index', $course)->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$registration = Registration::findOrFail($id);

		return view('registrations.show', compact('registration'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($course, $id)
	{
		$registration = Registration::findOrFail($id);

		return view('registrations.edit', compact('registration'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $course, $id)
	{
		$registration = Registration::findOrFail($id);

		$registration->nombres = $request->input("nombres");
        $registration->apellidos = $request->input("apellidos");
        $registration->phone = $request->input("phone");
        $registration->nacimiento = $request->input("nacimiento");
        $registration->consulta = $request->input("consulta");
        
		$registration->save();

		return redirect()->route('courses.registrations.index', $course)->with('message', 'Inscripción editada exitosamente.');
	}

	public function status($id)
	{
		$registration = Registration::findOrFail($id);
		
		if ($registration->status) {
		    $registration->status = 0;
		} else {
		    $registration->status = 1;
		}

		$registration->save();

	}
	
	public function destroy($id)
	{
		$registration = Registration::findOrFail($id);
		$registration->delete();
	}

}
