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

        $profEmails = User::has('professional')->get()->pluck('email');

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
