<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public function index()
    {
        $basic  = new \Vonage\Client\Credentials\Basic("cd46e9ab", "JwEcuJPXq4MIZMXR");
        $client = new \Vonage\Client($basic);
 
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("919426656568", BRAND_NAME, 'Laravel Done')
        );
        // $message = $client->message()->send([
        //     'to' => '918460888833',
        //     'from' => 'Nexmo',
        //     'text' => 'Laravel SMS testing'
        // ]);
 
        // dd('message send successfully');
        // $response = $client->sms()->send(
        //     new \Vonage\SMS\Message\SMS("919426656568", BRAND_NAME, 'Airtel')
        // );
        
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
       dd('message send successfully');
    }
}
