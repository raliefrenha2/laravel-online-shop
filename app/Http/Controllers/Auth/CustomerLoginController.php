<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:customer');
	}

	public function showLoginForm()
	{
		return view('auth.customer-login');
	}


	public function login(Request $request)

	{
		// validate form data
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);
		// Attemp to log the user in
		// Auth::attempt($credentials, $remember);
		if(Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
			// if success, then redirect to their intended location
			return redirect()->intended(route('customer.dashboard'));
		}

		// if gagal
		return redirect()->back()->withInput($request->only('email', 'remember'));
		
 }
}
