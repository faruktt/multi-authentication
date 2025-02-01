<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
class CustomerController extends Controller
{
    public function customer(){
        return view('customer.singin');
    }
    public function login_page(){
        return view('customer.singup');
    }
    function customer_logout(){
        Auth::guard('customer')->logout();
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login_page');
    }
    function customer_store(Request $request){
        Customer::insert([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'created_at'=>carbon::now(),
        ]);
        return redirect()->back();

    }
    public function customer_login(Request $request)
    {
        // Check if a customer with the provided email exists
        if (Customer::where('email', $request->email)->exists()) {
            // Attempt to log the customer in using the provided credentials
            if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                // Redirect to the homepage on successful login
                return redirect('/');
            } else {
                // Redirect back if the password is incorrect
                return back()->with('error', 'Invalid password. Please try again.');
            }
        } else {
            // Redirect back if the email does not exist
            return back()->with('error', 'No account found with this email.');
        }
    }

}
