<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Payment;
use App\Registration;
use Illuminate\Http\Request;

class PaymentController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index($registration)
	{
		$registration = Registration::findOrFail($registration);
		$payments = $registration->payments()->orderBy('fecha', 'desc');

		return view('payments.index', compact('payments', 'registration'));
	}
	
	public function pagos()
	{
		return view('payments.index');
	}

	public function api($registration) {
		
		if ($registration == 0) {
		    $payments = Payment::where('status', 0)->with('registration')->get();
		} else {
		    $registration = Registration::findOrFail($registration);
			$payments = $registration->payments()->get();
		}
		return $payments;
		
	}
	
	public function create()
	{
		return view('payments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$payment = new Payment();

		$payment->title = $request->input("title");
        $payment->body = $request->input("body");

		$payment->save();

		return redirect()->route('payments.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$payment = Payment::findOrFail($id);

		return view('payments.show', compact('payment'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$payment = Payment::findOrFail($id);

		return view('payments.edit', compact('payment'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$payment = Payment::findOrFail($id);

		$payment->title = $request->input("title");
        $payment->body = $request->input("body");

		$payment->save();

		return redirect()->route('payments.index')->with('message', 'Item updated successfully.');
	}

	public function status($id)
	{
		$payment = Payment::findOrFail($id);
		
		if ($payment->status) {
		    $payment->status = 0;
		} else {
		    $payment->status = 1;
		}

		$payment->save();

	}
	
	public function destroy($id)
	{
		$payment = Payment::findOrFail($id);
		$payment->delete();
	}

}
