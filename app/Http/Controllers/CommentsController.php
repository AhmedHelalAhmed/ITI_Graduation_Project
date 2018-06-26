<?php

namespace App\Http\Controllers;
use App\Article;
use App\Notifications\CommentArticle;
use App\User;
use risul\LaravelLikeComment\Controllers\CommentController;
use risul\LaravelLikeComment\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;


class CommentsController extends CommentController
{

    public function add(Request $request){

    	$userId = Auth::user()->id;
    	$parent = $request->parent;
    	$commentBody = $request->comment;
    	$itemId = $request->item_id;

        $user = self::getUser($userId);
        $userPic = $user['avatar'];
        if($userPic == 'gravatar'){
            $userPic = '/storage/images/avatars/'.Auth::user()->avatar;
        }

	    $comment = new Comment;
	    $comment->user_id = $userId;
	    $comment->parent_id = $parent;
	    $comment->item_id = $itemId;
	    $comment->comment = $commentBody;
        //Start for notification
        Article::find($itemId)->user->notify(new CommentArticle($itemId));
        //End for notification
	    $comment->save();

	    $id = $comment->id;
    	return response()->json(['flag' => 1, 'id' => $id, 'comment' => $commentBody, 'item_id' => $itemId, 'userName' => $user['name'], 'userPic' => $userPic]);

    }



    public static function getComments($itemId){
        $comments = Comment::where('item_id', $itemId)->orderBy('parent_id', 'asc')->get();

        foreach ($comments as $comment){
            $userId = $comment->user_id;
            $user = self::getUser($userId);
            $comment->name = $user['name'];
            $comment->email = $user['email'];
            $comment->url = $user['url'];
            $comment->avatar = User::find($userId)->avatar;

        }

        return $comments;
    }

}
