<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public  function store(StoreContactRequest $request)
    {
        try {
            $data = $request->validated();
            Contact::create($data);
            return back()->with('contact-status', 'Your message was sent successfully!');
        } catch (\Exception $e) {
            Log::error('Contact submission failed', ['error' => $e->getMessage()]);

            return back()->with('contact-error', 'There was an issue sending your message. Please try again later.');
        }
    }
}
