<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubscriberController extends Controller
{
    public function store(Request $request){
        try {

            $data = $request->validate([
                'email'=>'required|email|unique:subscribers,email'
            ]);

            Subscriber::create($data);

            return back()->with('subscribe-status', 'Subscribed successfully!');
        } catch (\Exception $e){

            Log::error('Subscriber creation failed', ['error' => $e->getMessage()]);

            return back()->with('subscribe-error', 'There was an issue subscribing. Please try again later.');
        }

    }
}
