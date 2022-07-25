<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceMapRequest;
use App\Http\Requests\UpdateResourceMapRequest;
use App\Models\ResourceMap;

class ResourceMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourceMap::get();
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
     * @param  \App\Http\Requests\StoreResourceMapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResourceMapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ResourceMap  $resourceMap
     * @return \Illuminate\Http\Response
     */
    public function show(ResourceMap $resourceMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResourceMap  $resourceMap
     * @return \Illuminate\Http\Response
     */
    public function edit(ResourceMap $resourceMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResourceMapRequest  $request
     * @param  \App\Models\ResourceMap  $resourceMap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResourceMapRequest $request, ResourceMap $resourceMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceMap  $resourceMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceMap $resourceMap)
    {
        //
    }
}
