<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Professional;
use App\Classroom;
use App\Job;
use Auth;

class UserController extends Controller
{
    public function professional(Request $request) {
        $request->flash();
		$validator = Validator::make($request->all(),[
			'name' => 'required',
			'about' => 'required',
			'jobs' => 'required',
        ]);

        $jobs = $request->jobs;



		if ($validator->fails()) {
			return response()->json(['errors' => $validator->errors()]);
		} else {   
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            
            $user->save();

            $professional = new Professional;
            $professional->bio = $request->about;
            $professional->user_id = $user->id;
    
            $professional->save();

            // foreach ($jobs as $job) {
            //     $job = new Job;
            //     $job->name = $job->name;
            //     $job->save();
            // }
            $jobIds = Job::whereIn('name', $jobs)->get()->pluck('id');
            $professional->jobs()->attach($jobIds);
            return 'OK';
    }
}
public function classroom(Request $request) {
    $request->flash();
    $validator = Validator::make($request->all(),[
        'name' => 'required',
        'school' => 'required',
        'email' => 'required',
        'password' => 'required',
        'city' => 'nullable',
    ]);


    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    } else {    
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        $user->save();

        $classroom = new Classroom;
        $classroom->school = $request->school;
        $classroom->city = $request->city;
        $classroom->user_id = $user->id;

        $classroom->save();

        Auth::login($user);

        return 'OK';
    }
}

public function authenticate(Request $request) {

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    
        if(Auth::user()->has('professional')) {
            return 'BAD';
        } elseif(Auth::user()) {
            return 'OK';
        }
    }
}

}