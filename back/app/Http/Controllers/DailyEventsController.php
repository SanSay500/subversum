<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDailyEventsRequest;
use App\Http\Requests\UpdateDailyEventsRequest;
use App\Models\DailyEvents;

class DailyEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return DailyEvents::all();
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
     * @param  \App\Http\Requests\StoreDailyEventsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyEventsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyEvents  $dailyEvents
     * @return \Illuminate\Http\Response
     */
    public function show(DailyEvents $dailyEvents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyEvents  $dailyEvents
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyEvents $dailyEvents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDailyEventsRequest  $request
     * @param  \App\Models\DailyEvents  $dailyEvents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyEventsRequest $request, DailyEvents $dailyEvents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyEvents  $dailyEvents
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyEvents $dailyEvents)
    {
        //
    }
}
