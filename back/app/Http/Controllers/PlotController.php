<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlotRequest;
use App\Http\Requests\UpdatePlotRequest;
use App\Http\Resources\PlotResource;
use App\Http\Resources\UserResource;
use App\Models\BuildingMap;
use App\Models\Plot;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PlotController extends Controller
{

    public function save(Request $request)
    {
        DB::table('user_init_data')->insert(values:[
            'plot_init_data'=>$request->init_data,
            'user_id'=>$request->user_id,
            'plot_id'=>$request->plot_id,
        ]);
        return response('done!');
    }

    public function initialize(Request $request)
    {
        $plot_data = DB::table('user_init_data')
            ->where('user_id',$request->user_id)
            ->where('plot_id',$request->plot_id)
            ->value('plot_init_data');
        return $plot_data;
    }

    public function buy(Request $request)
    {
        $plot = Plot::where('longitude', '=', $request->long)
            ->where('latitude', '=', $request->lat)->first();

        $plot->update([
            'user_id' => $request->user_id,
        ]);
        $user = User::where('id', $request->user_id)->first();

        $user->update([
            'crystals' => $user->crystals - $plot->price,
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
     * @param \App\Http\Requests\StorePlotRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlotRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Plot $plot
     * @return JsonResource
     */
    public function show_by_coord(Request $request)
    {
        $plot_by_coord = Plot::where(['latitude' => $request->lat, 'longitude' => $request->long])->get();
        return new JsonResource($plot_by_coord);
    }

    public function show(Plot $plot)
    {
        $main_building = [];
        $add_buildings = [];
        $all_buildings = BuildingMap::select('type', 'name', 'buildings_map.level as level', 'code', 'volume', 'storage', 'speed')
            ->where('plot_id', $plot->id)
            ->join('buildings', 'buildings_map.building_id', '=', 'buildings.id')
            ->get()->toArray();

        foreach ($all_buildings as $record) {
            if ($record['type'] == 'Main') {
                $main_building['type'] = $record['code'];
                $main_building['level'] = $record['level'];
                $main_building['params']['volume'] = $record['volume'];
                $main_building['params']['storage'] = $record['storage'];
                $main_building['params']['speed'] = $record['speed'];
            } else {
                $add_buildings[] = [
                    'type' => $record['code'],
                    'level' => $record['level'],
                ];
            }
        }
        if (empty($main_building)) {
            $main_building['type'] = 1;
            $main_building['level'] = 0;
            $main_building['params']['volume'] = 1;
            $main_building['params']['storage'] = 1;
            $main_building['params']['speed'] = 1;
        }
        $additional_buildings_count = count($add_buildings);
        switch ($additional_buildings_count) {
            case 0:
                $add_buildings[1] = [
                    'type' => 1,
                    'level' => 0,
                ];
                $add_buildings[2] = [
                    'type' => 2,
                    'level' => 0,
                ];
                $add_buildings[3] = [
                    'type' => 3,
                    'level' => 0,
                ];
            case 1:
                $add_buildings[2] = [
                    'type' => 2,
                    'level' => 0,
                ];
                $add_buildings[3] = [
                    'type' => 3,
                    'level' => 0,
                ];
            case 2:
                $add_buildings[3] = [
                    'type' => 3,
                    'level' => 0,
                ];
        }

        return new JsonResource(['MainBuilding' => $main_building, 'AdditionalBuilding' => $add_buildings]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Plot $plot
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Plot $plot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePlotRequest $request
     * @param \App\Models\Plot $plot
     * @return \Illuminate\Http\Response
     */
    public
    function update(UpdatePlotRequest $request, Plot $plot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Plot $plot
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Plot $plot)
    {
        //
    }
}
