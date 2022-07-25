<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerMapRequest;
use App\Http\Requests\UpdateWorkerMapRequest;
use App\Models\WorkerMap;

class WorkerMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WorkerMap::get();
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
     * @param  \App\Http\Requests\StoreWorkerMapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkerMapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkerMap  $workerMap
     * @return \Illuminate\Http\Response
     */
    public function show(WorkerMap $workerMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkerMap  $workerMap
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkerMap $workerMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkerMapRequest  $request
     * @param  \App\Models\WorkerMap  $workerMap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkerMapRequest $request, WorkerMap $workerMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkerMap  $workerMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkerMap $workerMap)
    {
        //
    }
}
