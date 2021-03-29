<?php

namespace App\Traits;

use App\Chama;
use App\ChamaMember;
use Auth;
use AfricasTalking\SDK\AfricasTalking;

trait SMSTrait
{



    public function invitationText($phone_number, $message)
    {

        // Get user
        $userCheck = Auth::user();
        $username = env('AFRICAS_TALKING_USERNAME');
        $apiKey   = env('AFRICAS_TALKING_API_KEY');
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $phone_number,
            'message' => $message
        ]);

        print_r($result);

    }

    public function OOTPMessage($chama_id)
    {

        // Get user
        $userCheck = Auth::user();

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => '+2XXYYYOOO',
            'message' => 'Hello World!'
        ]);

        print_r($result);


    }

}
