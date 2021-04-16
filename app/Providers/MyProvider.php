<?php

namespace App\Providers;

use App\Interfaces\CarrierInterface;
use App\Call;
use App\Contact;

class MyProvider implements CarrierInterface {


    public function dialContact(Contact $contact)
    {

    }

	public function makeCall() : Call 
    {
        return new Call;
    }

    public function sendMessage(string $number, string $message) : string
    {
        return "The message '{$message}' was sent to {$number}";
    }

}

?>