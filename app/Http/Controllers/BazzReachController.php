<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBazzReachRequest;
use App\Http\Requests\UpdateBazzReachRequest;
use Illuminate\Http\Request;
use App\Models\BazzReach;
use App\Http\api\TwitterApi;
use Illuminate\Support\Str;

class BazzReachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bazzreachs.index');
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
     * @param  \App\Http\Requests\StoreBazzReachRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBazzReachRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BazzReach  $bazzReach
     * @return \Illuminate\Http\Response
     */
    public function show(BazzReach $bazzReach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BazzReach  $bazzReach
     * @return \Illuminate\Http\Response
     */
    public function edit(BazzReach $bazzReach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBazzReachRequest  $request
     * @param  \App\Models\BazzReach  $bazzReach
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBazzReachRequest $request, BazzReach $bazzReach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BazzReach  $bazzReach
     * @return \Illuminate\Http\Response
     */
    public function destroy(BazzReach $bazzReach)
    {
        //
    }


    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $searchWord = $request->input('search_word');
        $twitterApi = new TwitterApi();
        $totalTweets = $twitterApi->searchTweets($searchWord);
        $tweetResult = Str::limit($totalTweets, 300);
        
        $bazzReachs = BazzReach::orderBy('created_at', 'desc')->get();
        return view('bazzreachs.index', compact('searchWord', 'tweetResult', 'totalTweets','bazzReachs'));

    }
}
