<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function send()
    {
        $details = [
            'title'=>'Bill details',
            'body'=>'From rent care software',
        ];
        \Mail::to('pkmaru1993@gmail.com')->send(new \App\Mail\TestMail($details));
        echo "Email has been send bhyallaaaaaaaaa";
    }
}
