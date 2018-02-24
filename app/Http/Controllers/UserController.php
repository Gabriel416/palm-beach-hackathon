<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function professional(Request $request) {
        return $request;
        $request->flash();
		$validator = Validator::make($request->all(),[
			'name' => 'required',
			'bio' => 'required',
			'categories' => 'required',
		]);


		if ($validator->fails()) {
			return response()->json(['errors' => $validator->errors()]);
		} else {   
            return 'professional';
			// check if we have this client/email in our DB already so that we don't create a duplicate
			// if (clients::where('email', $request->email)->exists()) {
			// 	$client = clients::where('email', $request->email)->first();
			// 	$client->update($request->all());
			// } else {
			// 	//make inserts into the database
			// }
    }
}
public function classroom(Request $request) {
    return $request;
    $request->flash();
    $validator = Validator::make($request->all(),[
        'name' => 'required',
        'school' => 'required',
        'city' => 'required',
    ]);


    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()]);
    } else {    
        $user = new App\User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();
    }
}

}