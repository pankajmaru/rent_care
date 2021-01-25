<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Http\Requests\StoreUsers;
use App\Bill;
use App\Admin;
use App\UserImage;
use App\AdminExpenses;
use App\Room;
use PDF;
use Mail;
use snappy;


class TestMail extends Mailable
{
    use Queueable, SerializesModels;

     public $bills = '';
    
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($bills)
    {
        $this->bills = $bills;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
   
    public function build()
    {
        $bills = $this->bills;
        return $this->subject('Bill Details from rent care department')->view('emails.send-mail',compact('bills'));
    }
}