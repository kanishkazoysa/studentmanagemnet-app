<?php
// filepath: /c:/Users/User/Desktop/php/myproject/app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email|unique:kanishka,email',
            'password' => 'required|min:6',
            'address' => 'required',
            'address2' => 'nullable',
            'zip' => 'nullable',
        ]);

        // Create a new user
        $user = new User();
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->address = $request->input('address');
        $user->address2 = $request->input('address2');
        $user->zip = $request->input('zip');
        $user->save();

        return redirect()->back()->with('success', 'User registered successfully!');
    }

    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Pass the users to the view
        return view('allUsers', ['users' => $users]);
    }
}