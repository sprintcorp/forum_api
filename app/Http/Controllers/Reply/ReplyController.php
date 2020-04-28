<?php

namespace App\Http\Controllers\Reply;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReplyResource;
use App\Model\Question;
use App\Model\Reply;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Question $question
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Question $question,Request $request)
    {
        $data = $request->all();
        $data['question_id'] = $question->id;
        $reply = $question->replies()->create($data);
        return response([$reply],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @param \App\Model\Reply $reply
     * @return void
     */
    public function show(Question $question,Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Question $question
     * @param \App\Model\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question, Reply $reply)
    {
        $data = $request->all();
        $data['question_id'] = $question->id;
        $reply = $reply->update($data);
        return response([$reply],Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @param \App\Model\Reply $reply
     * @return void
     */
    public function destroy(Question $question,Reply $reply)
    {
        try {
            $reply->delete();
            return response("Deleted",201);
        } catch (\Exception $e) {
            return response($e->getMessage());
        }
    }
}
