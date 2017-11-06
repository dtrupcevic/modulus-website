<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::with('class', 'specialization', 'user')
            ->orderByRaw('handled_by_user IS NULL DESC, created_at DESC')
            ->get();

        return response()->json($applications);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function accept(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $application->is_approved = 1;

        $application->save();

        return response()->json($application);
    }

    public function deny(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $application->is_approved = 0;

        $application->save();

        return response()->json($application);
    }

    public function assign(Request $request, $id)
    {
        $application = Application::findOrFail($id);

        $application->handled_by_user = Auth::user()->id;

        $application->save();

        return response()->json($application);
    }
}
