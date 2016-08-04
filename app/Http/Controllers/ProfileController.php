<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Registration;
use App\Course;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function inscripcion($course)
	{
		$course = Course::findOrFail($course);
		return view('profile.inscripcion', compact('course'));
	}

	
	public function inscribir(Request $request, $course)
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
        $registration->user_id = Auth::user()->id;

		$registration->save();

		return redirect()->route('misinscripciones')->with('message', 'Inscripción exitosa.');
	}
	
	public function misinscripciones()
	{
		
		$registrations = Auth::user()->registrations()->get();
		return view('profile.misinscripciones', compact('registrations'));
	}

}
