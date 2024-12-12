<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LogApiResponse {
    use Dispatchable, Queueable, SerializesModels;

    public function handle() {
        // Send GET request to the API
        $response = Http::get('https://randomuser.me/api/');

        // Extract 'results' object and log it
        $results = $response->json('results');
        Log::info('API Results:', $results);
    }
}
