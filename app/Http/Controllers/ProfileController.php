<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Course;
use App\Registration;
use App\Payment;
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
        $registration->nacimiento = $request->input("nacimiento");
        $registration->phone = $request->input("phone");
        $registration->consulta = $request->input("consulta");
        $registration->course_id = $course;
        $registration->user_id = Auth::user()->id;
        $registration->status = 0;

		$registration->save();
		
		$payment = new Payment();

        $payment->fecha = $request->input("fecha");
        $payment->banco = $request->input("banco");
        $payment->referencia = $request->input("referencia");
        $payment->monto = $request->input("monto");
        $payment->cedula = $request->input("cedula");
        $payment->registration_id = $registration->id;
        $payment->status = 0;
        

		$payment->save();

		return redirect()->route('misinscripciones')->with('message', 'Inscripción exitosa. Lo antes posible confirmaremos su pago');
	}
	
	public function misinscripciones()
	{
		
		$registrations = Auth::user()->registrations()->get();
		return view('profile.misinscripciones', compact('registrations'));
	}
	
	public function eliminarinscripcion($id)
	{
		$registration = Registration::findOrFail($id);
		$registration->delete();

		return redirect()->route('misinscripciones')->with('message', 'Inscripción eliminada.');
	}
	
	public function mispagos($registrations)
	{
		$registration = Registration::findOrFail($registrations);
		$payments = $registration->payments()->orderBy('fecha', 'desc')->get();
		return view('profile.mispagos', compact('payments', 'registration'));
	}
	
	public function pago($registration)
	{
		$registration = Registration::findOrFail($registration);
		return view('profile.pago', compact('registration'));
	}
	
	public function pagar(Request $request, $registration)
	{
		$payment = new Payment();

        $payment->fecha = $request->input("fecha");
        $payment->banco = $request->input("banco");
        $payment->referencia = $request->input("referencia");
        $payment->monto = $request->input("monto");
        $payment->cedula = $request->input("cedula");
        $payment->registration_id = $registration;

		$payment->save();

		return redirect()->route('mispagos', $registration)->with('message', 'Reporte de Pago exitoso.');
	}
	
	public function eliminarpago($id)
	{
		$payment = Payment::findOrFail($id);
		$registration = $payment->registration();
		$payment->delete();

		return redirect()->route('mispagos', $payment->registration_id)->with('message', 'Pago eliminado.');
	}

}
