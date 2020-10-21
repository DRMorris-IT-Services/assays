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

        $assay_id = Str::random(60);
        $barcode = $request['barcode'];

        if($barcode == ""){
            $barcode = rand();
        }else{
            $barcode == $request['barcode'];
        }

        assays::create([
            'assay_id' => $assay_id,
            'assay_name' => $request['name'],
            'assay_barcode' => $barcode,
            'assay_lot_no' => $request['assay_lot_no'],
            'assay_manufactured_date' => $request['manufactured_date'],
            'assay_status' => "Pending Approval",
        ]);

        return back()->withStatus(__('Assay Successfully Created.'));
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
    public function update(Request $request, assays $assays, $id)
    {
        //

        assays::where('assay_id', $id)
        ->update([
            'assay_name' => $request['name'],
            'assay_barcode' => $request['barcode'],
            'assay_lot_no' => $request['assay_lot_no'],
            'assay_manufactured_date' => $request['manufactured_date'],
            'assay_status' => $request['status'],
        ]);

        return back()->withStatus(__('Assay Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\assays  $assays
     * @return \Illuminate\Http\Response
     */
    public function destroy(assays $assays, $id)
    {
        //

        assays::where('assay_id', $id)
        ->delete();

        return back()->withDelete(__('Assay Successfully Deleted.'));
    }
}
