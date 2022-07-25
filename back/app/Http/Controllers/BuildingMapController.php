<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingMapRequest;
use App\Http\Requests\UpdateBuildingMapRequest;
use App\Models\BuildingMap;

class BuildingMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BuildingMap::get();
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
     * @param  \App\Http\Requests\StoreBuildingMapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuildingMapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BuildingMap  $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function show(BuildingMap $buildingMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BuildingMap  $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function edit(BuildingMap $buildingMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBuildingMapRequest  $request
     * @param  \App\Models\BuildingMap  $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuildingMapRequest $request, BuildingMap $buildingMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuildingMap  $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuildingMap $buildingMap)
    {
        //
    }
}
