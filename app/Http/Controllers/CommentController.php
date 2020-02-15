<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Mail\CommentReceived;
use Mail;

class CommentController extends Controller
{
    public function store(CommentRequest $request, $teamId){//ovako koristimo injection i id vajdenje iz url
        $comment = new Comment;
        $comment->content = $request->content;
        $comment->user_id = auth()->id();//ovako vadimo user id
        $comment->team_id = $teamId;
        $comment->save();
        $team = Team::find($teamId);
        $mojMail = new CommentReceived();
        Mail::to($team)->send(new CommentReceived());//this is the mail sending part
        return redirect('/teams/' . $teamId);//ovako se vracamo na datu show stranu
    }

  
    
}
