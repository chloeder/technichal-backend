<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //  Login Views
  public function loginView()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    // Validate Request Inputs
    $credentials = $request->validate([
      'username' => 'required',
      'password' => 'required'
    ], [
      'username.required' => 'Username is required',
      'password.required' => 'Password is required'
    ]);

    // Attempt to Authenticate User
    if (auth()->attempt($credentials)) {
      if (auth()->user()->role === 'admin') {
        // Check if the user is an admin and redirect to the dashboard
        toastr()->success('Welcome' . auth()->user()->name);
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
      } else {
        // Redirect to the home page if the user is not an admin
        $request->session()->regenerate();
        toastr()->success('Welcome' . auth()->user()->name);
        return redirect()->intended('/');
      }
    }

    // Redirect back to the login page if the authentication fails
    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
      'password' => 'Password is incorrect'
    ]);
  }

  // Register Views
  public function registerView()
  {
    return view('auth.register');
  }

  public function register(Request $request)
  {
    // Validate Request Inputs
    $credentials = $request->validate([
      'name' => 'required',
      'username' => 'required|unique:users,username',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|min:6',
      'password_confirmation' => 'required|same:password'
    ], [
      'name.required' => 'Name is required',
      'username.required' => 'Username is required',
      'username.unique' => 'Username is already taken',
      'email.required' => 'Email is required',
      'email.email' => 'Email is invalid',
      'email.unique' => 'Email is already taken',
      'password.required' => 'Password is required',
      'password.min' => 'Password must be at least 6 characters',
      'password_confirmation.required' => 'Password confirmation is required',
      'password_confirmation.same' => 'Passwords do not match'
    ]);

    // Create a new user
    $user = User::create([
      'name' => $credentials['name'],
      'username' => $credentials['username'],
      'email' => $credentials['email'],
      'password' => bcrypt($credentials['password'])
    ]);

    // Authenticate the user
    auth()->login($user);

    if (auth()->user()->role === 'admin') {
      // Check if the user is an admin and redirect to the dashboard
      toastr()->success('Welcome' . auth()->user()->name);
      return redirect('/dashboard');
    } else {
      // Redirect to the home page if the user is not an admin
      toastr()->success('Welcome' . auth()->user()->name);
      return redirect('/');
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    toastr()->success('You have been logged out');
    return redirect('/login');
  }
}
