<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Setting;
use Auth;

class VoteController extends Controller
{
    //
    public function vote(Request $request,$vote){
       $settings = Setting::where('option','guest_vote')->first();

       if($settings->value == 0){
           if(Auth::check()){
               /**
                * If User Already Voted Update If Not Create New Vote
                *
                */
                $isVoted = Vote::where('user_id',Auth::id())->where('post_id',$request->postID)->first();
                if($isVoted != null){
                    $isVoted->vote = $vote;
                    $isVoted->update();

                    return $vote;
                }
                else{
                    $vote = Vote::create([
                        'post_id' => $request->postID,
                        'user_id' => Auth::id(),
                        'auther_id' => $request->autherID,
                        'vote' => $vote
                    ]);
                    $vote->save();

                    return $vote;
                }
           }else{
               /**
                * If User Not Loged In And Guest Vote Enabled
                */
           }
       }
    }


}
