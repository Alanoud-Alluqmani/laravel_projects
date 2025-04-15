<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; //To capture user input
use Illuminate\Support\Facades\Auth;
use Session; //For tracking loggedin users
use App\Models\User;
use Hash; //To hash the passwords
class AuthController extends Controller
{
    //Show login page
    public function index()
    {
        return view('auth.login');
    }  

    //Show registration page
    public function registration()
    {
        return view('auth.registration');
    }

    //Handles login functions: validation and authentication 
    public function postLogin(Request $request)
    {
        //validation: ensure that the user filled the email and password fields
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        //authentication: retrieve only the email and password fields from the request data
        //then attempt to log the user in using the provided credentials.
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
        return redirect("login");

    }

    //Handles registration functions: validation and create user record 
    public function postRegistration(Request $request)
    {  
        //validation: ensure that the user filled the email, password, and name fields
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/[0-9]/|regex:/[a-zA-Z]/|regex:/[\W]/',
        ]);
        //Retrieve all validated input data from the request
        $data = $request->all();
        //Create user record using create() method
        $check = $this->create($data);
        return redirect("dashboard");
    }

    //Verify if the user is authenticated by using Auth::check()
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    //Create user record and hashing the password 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    
    // Log out using Auth::logout()
    public function logout() {
        // Clear the session data using Session::flush() to remove all stored session information
        Session::flush();
        Auth::logout();
          return Redirect('login');
}

}
