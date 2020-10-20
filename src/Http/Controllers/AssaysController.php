<?php

namespace duncanrmorris\assays\Http\Controllers;

use Illuminate\Routing\Controller;

use duncanrmorris\assays\App\assays;
use duncanrmorris\assays\App\assayscontrols;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AssaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(assays $assays, assayscontrols $assayscontrols)
    {
        //

        return view('assays::index',[
            'assays' => $assays->paginate(15),
            'controls' => $assayscontrols->where('user_id',Auth::user()->id)->get(),
            'count' => $assayscontrols->count(),
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\assays  $assays
     * @return \Illuminate\Http\Response
     */
    public function show(assays $assays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\assays  $assays
     * @return \Illuminate\Http\Response
     */
    public function edit(assays $assays)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\assays  $assays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assays $assays)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\assays  $assays
     * @return \Illuminate\Http\Response
     */
    public function destroy(assays $assays)
    {
        //
    }
}
