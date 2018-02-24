<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Classroom;
use App\Professional;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/app';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        if($data['role'] == "class") {
            //make user and Classroom here
            return $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);


            
            $classRoom = new App\Classroom;
            $classRoom->school = $data['school'];
            $classRoom->city = $data['location'];
            $classRoom->user_id = $user->id;
            $classRoom->save();

        } else {

            return $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            foreach ($request->$jobs as $job) {
                $job = new App\Job;
                $job->name = $job->name;
            }

            $professional = new App\Professional;
            $professional->linked_in_id = $data['linkedIn'];
            $professional->bio = $data['about'];
            $professional->user_id = $user->id;
            $professional->industry = $data['industry'];
        }
    }
}
