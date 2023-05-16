<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // $tweetId=$request->route('tweetId');
        $tweetId=$request->tweetId;
        $tweet=Tweet::where('id',$tweetId)->firstOrFail();
        // if(is_null($tweet)){
        //     throw new NotFoundHttpException('Tweet not found');
        // }
        return view('tweet.update')->with('tweet',$tweet);
    }
}
