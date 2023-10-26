<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

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

        // $sid    = "AC315d789ce66583d2c5f8f7bb65b48f1b";
        // $token  = "5d3adccfcc98e67b1a5bf1eb7ad13e28";
        // $twilio = new Client($sid, $token);

        print($this->phone . "<br>");
        print($this->text . "<br>");
        $message = $twilio->messages
            ->create(
                $this->phone, // to
                array(
                    "from" => $twilioPhoneNumber,
                    "body" => $this->text
                )
            );

        // $message = $twilio->messages
        //     ->create(
        //         "whatsapp:+559391753545", // to
        //         array(
        //             "from" => "whatsapp:+14155238886",
        //             "body" => "Teste"
        //         )
        //     );

        print($message->sid);


        // return "SMS sent successfully! ";
    }

    public function getPhone()
    {
        return "whatsapp:+55" . $this->phone;
    }
}
