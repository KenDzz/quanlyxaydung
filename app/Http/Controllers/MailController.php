<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendMailJob;

class MailController extends Controller
{
    public function sendMail($name,$mail,$desc) {
        if (!filter_var(trim($mail), FILTER_VALIDATE_EMAIL)) {
            return response()->json('Invalid email address', 422);
        }

        $dataMail = new \stdClass();
        $dataMail->name = $name;
        $dataMail->email = trim($mail);
        $dataMail->desc = $desc;
        //send mail queue
        SendMailJob::dispatch($dataMail);
    }
}
