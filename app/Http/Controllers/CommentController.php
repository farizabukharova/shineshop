<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   public function store(Request $request){
     $validated = $request->validate([
          'content' => 'required',
          'app_id' => 'required|numeric'
       ]);
     Auth::user()->comments()->create($validated);
     return back()->with('message', __('messages.comment_add'));
   }

   public function destroy(Comment $comment){
       $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('error',__('messages.delete_add'));
   }

}
