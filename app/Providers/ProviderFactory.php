<?php

namespace App\Providers;

use App\Interfaces\CarrierInterface;
use App\Call;
use App\Contact;

class ProviderFactory {

    public $provider;

    function __construct(CarrierInterface $provider)
    {
        $this->provider = $provider;
    }

    public function dialContact(Contact $contact)
    {
        return $this->provider->dialContact($contact);
    }

	public function makeCall() : Call 
    {
        return $this->provider->makeCall();
    }

    public function sendMessage(string $number, string $message) : string
    {
        return  $this->provider->sendMessage($number, $message);
    }

}