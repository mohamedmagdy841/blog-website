<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        try {
            $data = $request->validated();
            Comment::create($data);
            return back()->with('comment-status', 'Your comment was published successfully!');
        } catch (\Exception $e) {
            Log::error('Comment submission failed', ['error' => $e->getMessage()]);

            return back()->with('comment-error', 'There was an issue publishing your comment. Please try again later.');
        }
    }
}
