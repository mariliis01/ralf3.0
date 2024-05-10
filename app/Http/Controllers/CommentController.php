<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Admin;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'comment' => 'required',
        ]);
        // Create comment
        Comment::create([
            'user_id' => auth()->id(),
            'chirp_id' => $request->chirp_id,
            'comment' => $request->comment,
        ]);
        return back()->with('success', 'Comment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $comment = Comment::findOrFail($id);
    if (auth()->user()->id === $comment->user_id || auth()->user()->is_admin) {
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
    abort(403, 'You do not have permission to delete this comment.');
}

}
