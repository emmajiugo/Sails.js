<?php

namespace App\Http\Controllers\Webhook;

use App\Traits\SchoolBase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class FlutterwaveWebhookProcessor extends Controller
{
    use SchoolBase;
    /**
     * Entry point to our webhook handler
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        $this->validateFlutterwaveWebhook($request);
        // Log::info($request->header("verif-hash"));
    }

    /**
     * @return void
     */
    public function validateFlutterwaveWebhook(Request $request)
    {
        try {
            // retrieve the signature sent in the reques header's.
            $signature = ($request->header("verif-hash") !== null) ? $request->header("verif-hash") : '';

            /* It is a good idea to log all events received. Add code *
            * here to log the signature and body to db or file       */

            if (!$signature) {
                // only a post with Flutterwave signature header gets our attention
                exit();
            }

            // Store the same signature on your server as an env variable and check against what was sent in the headers
            $local_signature = env('FLUTTERWAVE_VERIF_HASH');

            // confirm the event's signature
            if( $signature !== $local_signature ){
                // silently forget this ever happened
                exit();
            }

            http_response_code(200);

            if ($request->status == 'successful') {
                // Log::info(($request->txRef.' '.$request->flwRef));
                $this->updateInvoice($request->txRef, $request->flwRef);
            }
            exit();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
