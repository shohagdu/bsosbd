<?php

namespace App\Http\Controllers;

use App\Mail\ExampleMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Test Email',
            'message' => 'This is a test email sent from Laravel using cPanel.'
        ];

        Mail::to('omarshohag93@gmail.com')->send(new ExampleMail($details));

        return 'Email sent successfully!';
    }
}
