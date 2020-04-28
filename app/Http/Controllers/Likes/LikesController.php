<?php

namespace App\Http\Controllers\Likes;

use App\Http\Controllers\Controller;
use App\Model\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Reply $reply
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Reply $reply,Request $request)
    {
        $reply->like()->create([
            'user_id' => auth()->id(),
//            'user_id' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reply $reply
     * @return void
     */
    public function destroy(Reply $reply)
    {
        try {
//            $reply->like()->where('user_id', 1)->first()->delete();
            $reply->like()->where('user_id',auth()->id())->first()->delete();
        } catch (\Exception $e) {

            return $e->getMessage();
        }
//        $reply->like()->where('user_id',\auth()->id())->first()->delete();
    }
}
