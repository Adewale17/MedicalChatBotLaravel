<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenRouterChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $apiKey = env('OPENROUTER_API_KEY');
        $message = $request->input('content');

        $url = 'https://openrouter.ai/api/v1/chat/completions';

        $payload = [
            'model' => 'deepseek/deepseek-chat:free',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful medical assistant. Always respond in **no more than two concise sentences**.'
                ],
                [
                    'role' => 'user',
                    'content' => $message,
                ],
            ],
        ];


        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'HTTP-Referer' => 'http://localhost', // Replace with your domain
                'X-Title' => 'MedicalBot Chat',
            ])->post($url, $payload);

            if ($response->successful()) {
                return $response['choices'][0]['message']['content'];
            } else {
                return response("OpenRouter Error: " . $response->body(), 500);
            }
        } catch (\Exception $e) {
            return response("Connection Error: " . $e->getMessage(), 500);
        }
    }
}
