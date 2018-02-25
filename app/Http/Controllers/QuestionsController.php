<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Question;
use App\Professional;
use App\User;

class QuestionsController extends Controller
{
    public function create(Request $request) {
        $q = new Question;
        $q->title = $request->title;
        $q->classroom_id = $request->classroom_id;
        $q->category_id = 1;
        $q->save();

        $classroom = $q->classroom;

        $subject = $request->subject;

        $profs = User::has('professional')->get();

        // foreach($profs as $prof) {
        //     $email = $prof->email;
        //     Mail::send('emails.accept', ['name' => $prof->name, 'question' => $q->title, 'questionLink' => '/app/video?name=' . $prof->name], function ($message) use ($email, $subject)
        //     {
        //         $message->from('gabe@nebularagency.com');
        //         $message->to($email);
        //         $message->subject($subject);       
        //     });
        // }
            $prof = User::where('email', 'gabe@nebularagency.com')->first();
            $email = $prof->email;
            Mail::send('emails.accept', ['name' => $prof->name, 'question' => $q->title, 'questionLink' => '/app/video?name=' . $prof->name], function ($message) use ($email, $subject)
            {
                $message->from('gabe@nebularagency.com');
                $message->to('gabe@nebularagency.com');
                $message->subject($subject);       
            });

        return 'ok';
    }
}
