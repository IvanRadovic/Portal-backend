<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ContactFormMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'messages' => 'required',
        ]);



        $name = $validatedData['name'];
        $surname = $validatedData['surname'];
        $email = $validatedData['email'];
        $messages = $validatedData['messages'];

        Mail::to('iradoviic@gmail.com')->send(new ContactFormMailable($name, $surname, $email, $messages));

        return response()->json(['message' => 'Email successfully sent']);
    }
}
