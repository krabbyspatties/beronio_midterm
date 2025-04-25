<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:500',
        ]);

        $response = Http::post('https://hook.eu2.make.com/bfi2eub0gltlh7u6abayeo8v4yi36nbg', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
        ]);

        return response()->json([
            'message' => $response->successful()
                ? 'Thank you for your feedback!'
                : 'Failed to submit feedback',
            'success' => $response->successful()
        ], $response->status());
    }
    public function message()
    {
        return view('contact', );
    }

}