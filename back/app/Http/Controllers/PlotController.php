<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Http\Resources\PlotResource;
use App\Http\Resources\UserResource;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlotController extends Controller
{

    /**
     *
     */
    public function buy(Request $request)
    {
        $plot = Plot::find($request->plot_id);
        $user = User::find($request->user_id);

        $user->update([
            'crystals'=>$user->crystals - $plot->price,
        ]);
        $plot->update([
            'user_id'=> $request->user_id,
        ]);

        return response([$user, $plot], 200);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new JsonResource(Plot::all());
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
     * @param  \App\Http\Requests\StorePlotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plot  $plot
     * @return JsonResource
     */
    public function show_by_coord(Request $request)
    {
        $plot_by_coord = Plot::where(['latitude'=>$request->lat, 'longitude'=>$request->long])->get();
        return new JsonResource($plot_by_coord);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function edit(Plot $plot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlotRequest  $request
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlotRequest $request, Plot $plot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plot  $plot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plot $plot)
    {
        //
    }
}
