<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Question;
use App\Professional;

class QuestionsController extends Controller
{
    public function create(Request $request) {
        $q = new Question;
        $q->title = $request->title;
        $q->classroom_id = $request->classroom_id;
        $q->save();

        $classroom = $q->classroom;
        $email = $classroom->email;

        $subject = $request->subject;

        $profEmails = Professional::get();

        foreach($profEmails as $email) {
            Mail::send('emails.accept', ['name' => $classroom->name, 'question' => $q->title, 'questionLink' => '/app/video'], function ($message) use ($email, $subject)
            {
                $message->from('gabe@nebularagency.com');
                $message->to($email);
                $message->subject($subject);       
            });
        }

        return 'ok';
    }
}
