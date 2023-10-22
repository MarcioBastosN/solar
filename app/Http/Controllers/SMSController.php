<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

use function Laravel\Prompts\text;

class SMSController
{

    private $phone, $text;

    public function __construct(string $phone, string $text)
    {
        $this->phone = $phone;
        $this->text = $text;
    }

    public function sendSMS()
    {
        $twilioSid = config('app.twilio_sid');
        $twilioToken = config('app.twilio_auth_token');
        $twilioPhoneNumber = config('app.twilio_phone_number');

        $twilio = new Client($twilioSid, $twilioToken);

        $message = $twilio->messages
            ->create(
                $this->phone, // to
                array(
                    "from" => "whatsapp:+14155238886",
                    "body" => $this->text
                )
            );

        print($message->sid);


        // return "SMS sent successfully! ";
    }

    public function getPhone()
    {
        return "whatsapp:+55" . $this->phone;
    }
}
