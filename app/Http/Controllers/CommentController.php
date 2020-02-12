<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $teamId){//ovako koristimo injection i id vajdenje iz url
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->id();//ovako vadimo user id
        $comment->team_id = $teamId;
        $comment->save();
        return redirect('/teams/' . $teamId);//ovako se vracamo na datu show stranu
    }

  
    
}
