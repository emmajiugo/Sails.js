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
            // retrieve the signature sent in the request header's.
            $signature = ($request->header("verif-hash") !== null) ? $request->header("verif-hash") : '';

            /* It is a good idea to log all events received. Add code *
            * here to log the signature and body to db or file */

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

            if ($request['event.type'] === 'Transfer') {

                $this->updateTransfer($request['data']['reference'],
                                        $request['data']['status'],
                                        $request['data']['complete_message']);

            } else {

                if ($request['data']['status'] == 'successful') {
                    // Log::info(($request->flwRef));
                    $this->updateInvoice($request['data']['tx_ref'], $request['data']['id']);
                }

            }

            exit();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
