<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

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
		if ($request->get('text_comment') != null) {
			$request->validate([
				'text_comment' => 'required|string|max:255'
			]);
			$comment = new Comment();
			$comment->text = $request->get('text_comment');
			$comment->post_id = $request->get('post_id');
			$comment->user_id = $request->user()->id;

			$comment->save();
//            dd($comment->id);

//            $comm = Comment::with('user')->get();

            $comm = DB::table('comments')->where('id', $comment->id)->first();

            /* $com = ' <div class="me-2">
                    <img
                     src = " 'if (!is_null($comment->user->image)) {
                                    ' asset('/uploads/avatar/'.$comment->user->image) '
                                }
                                    else { ' asset('/uploads/person.png') ' } ' "
                    width="40"
                    height="40"
                    alt=""
                    class = "rounded-circle">
                </div>
                <div class = "my-auto">
                    <p class = "my-auto">
                        ' $comment['text'] '
                    </p>
                </div> '; */
			//$com = '<p></p>';
			//dd(json_decode($com));
			return response()->json(['success'=>$comm]);


		} else {
			return 'error';
			//return response()->json(['error'=>'error msg']);
			//return response()->json(['error']);
		}


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
