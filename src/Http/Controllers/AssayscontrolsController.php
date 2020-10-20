<?php
 
namespace duncanrmorris\assays\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use App\User;

use duncanrmorris\assays\App\assayscontrols;


class AssayscontrolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $users, assayscontrols $assayscontrols, $id)
    {
        //

        return view('assays::controls.list',[
            'users' => $users->get(),
            'check' => $assayscontrols->where('user_id',$id)->count(),
            'controls' => $assayscontrols->where('user_id',$id)->get(),
            ]);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(assayscontrols $assayscontrols, $id)
    {
        //
        assayscontrols::create([
            'user_id' => $id,
            'assay_admin' => 'on',
        ]);

        return back()->withStatus(__('Access Levels successfully updated.'));
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
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function show(assayscontrols $assayscontrols, User $user, $id)
    {
        //
        return view('assays::controls.view',[
            'count' => $assayscontrols->where('user_id',$id)->count(),
            'controls' => $assayscontrols->where('user_id',$id)->get(),
            'user' => $user->where('id',$id)->get()
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function edit(assayscontrols $assayscontrols, User $user, $id)
    {
        //
        return view('assays::controls.edit',[
            'count' => $assayscontrols->where('user_id',$id)->count(),
            'controls' => $assayscontrols->where('user_id',$id)->get(),
            'user' => $user->where('id',$id)->get()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assayscontrols $assayscontrols, $id)
    {
        //

        assayscontrols::where('id',$id)
        ->update([
        'assay_admin' => $request['admin'],
        'assay_view' => $request['view'],
        'assay_add' => $request['new'],
        'assay_edit' => $request['edit'],
        'assay_del' => $request['del'],
        ]);
        return back()->withStatus(__('Access Levels successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\backupcontrols  $backupcontrols
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $backupcontrols)
    {
        //
    }
}
