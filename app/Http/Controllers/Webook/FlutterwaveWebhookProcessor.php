<?php

namespace App\Http\Controllers\Webook;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlutterwaveWebhookProcessor extends Controller
{
    /**
     * Entry point to our webhook handler
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        $this->validateFlutterwaveWebhook(env(''), $request);
        Log::info($request->all());
    }

    /**
     * @return void
     */
    public function validateFlutterwaveWebhook($secret_hash, Request $request)
    {
        try {

            // Retrieve the request's body
            $body = @file_get_contents("php://input");

            // retrieve the signature sent in the reques header's.
            $signature = (isset($_SERVER['HTTP_VERIF_HASH']) ? $_SERVER['HTTP_VERIF_HASH'] : '');

            /* It is a good idea to log all events received. Add code *
            * here to log the signature and body to db or file       */

            if (!$signature) {
                // only a post with Flutterwave signature header gets our attention
                exit();
            }

            // Store the same signature on your server as an env variable and check against what was sent in the headers
            $local_signature = $secret_hash;

            // confirm the event's signature
            if( $signature !== $local_signature ){
            // silently forget this ever happened
            exit();
            }

            http_response_code(200); // PHP 5.4 or greater
            // parse event (which is json string) as object
            // Give value to your customer but don't give any output
            // Remember that this is a call from rave's servers and
            // Your customer is not seeing the response here at all
            $response = json_decode($body);
            if ($response->status == 'successful') {
                # code...
                // TIP: you may still verify the transaction
                        // before giving value.
            }
            exit();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
