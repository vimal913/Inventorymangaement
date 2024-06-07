<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class userController extends Controller
{
    public function register()
    {
        return view('user.register');
    }

    public function registerStore(Request $request)
    {
        $validator = $this->validate($request, [

            'firstname' => ['required'],
            'lastname' => ['required'],
            'dob' => ['required'],
            'mail' => ['required', 'regex:/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,3})$/i', 'unique:users'],
            'mobile' => ['required', 'numeric', 'digits:10'],
            'address' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'pincode' => ['required', 'numeric'],
            'username' => ['required'],
            'password' => ['required', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/'],
        ],
            [
                'firstname.required' => 'Please enter your firstname',
                'lastname.required' => 'Please enter your lastname',
                'dob.required' => 'Please enter your dob',
                'mail.required' => 'Please enter your mail',
                'mail.regex' => 'Invalid mail address',
                'mail.unique' => 'This mail already registered ',
                'mobile.required' => 'Please enter your mobile number',
                'mobile.digits' => 'Mobile number must be 10 digits',
                'mobile.numeric' => 'A mobile number must be digits.',
                'address.required' => 'Please enter your address',
                'state.required' => 'Please enter your state',
                'city.required' => 'Please enter your city',
                'pincode.required' => 'Please enter your pincode',
                'pincode.numeric' => 'Pincode must be in numeric',
                'password.required' => 'Enter your password',
                'password.regex' => 'Password require uppercase,lowercase,symbols & digits',
                'c_password.required' => 'Please enter the confirm password',
                'c_password.same' => 'Confirm password must be same as password',
                'accept.required' => 'Please accept the term and condition',
            ]
        );
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        Session::flash('message', "You have Registered Successfully");
        return redirect('/user/login');

    }
    public function login()
    {
        return view('user.login');
    }

    public function loginStore(Request $request)
    {
        $validator = $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => 'required',

        ],
            [

                'email.required' => 'Please enter your email',
                'email.email' => 'Invalid email address',
                'password.required' => 'Enter your password',
            ]
        );
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Auth::attempt(['username' => $request->email, 'password' => $request->password])) {
                $userdetail = Auth::user();
                return redirect('/user/home', compact('userdetail'));
            } else {
                Session::flash('error', "Invalid User");
                return redirect('/user/login');
            }
        } else {
            Session::flash('error', "No account for this username");
            return redirect('/user/login');
        }
    }
    public function changepassword(){
        return view('user.changepassword');
    }

    public function changepasswordStore(Request $request)
    {

        $validator = $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => ['required', 'email'],
            'c_password' => 'required|same:new_password',
        ], [
            'current_password.required' => 'Please enter current password',
            'new_password.required' => 'Please enter new password',
            'new_password.email' => 'Password must contains uppercase,lowercase,symbols & digits',
            'c_password.required' => 'Please enter confirm password',
            'c_password.same' => 'Please give confirm password same as new password',
        ]);
        $auth = Auth::user();

        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return $this->sendError('error', ['error' => 'Current Password is Invalid', 'co_name' => 'current_password'], 401);
        }

        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            return $this->sendError('error', ['error' => 'New Password cannot be same as your current password.', 'co_name' => 'new_password'], 403);

        }

        $user = User::find($auth->id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        $user = Auth::user();
        $user->session_id = null;
        $user->save();
        Auth::logout();
        Session::flash('message', "Password Changed Successfully.");
        return redirect('/user/login');

    }
    public function profile(){
        return view('user.profile');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->session_id = null;
        $user->save();
        Auth::logout();
        Session::flash('message', "Account logout Successfully.");
        return redirect('/user/login');
    }
}
