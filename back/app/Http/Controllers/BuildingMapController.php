<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildingMapRequest;
use App\Http\Requests\UpdateBuildingMapRequest;
use App\Models\Building;
use App\Models\BuildingMap;
use App\Models\Plot;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class BuildingMapController extends Controller
{

    public function build(Request $request){
        BuildingMap::create([
            'building_id'=>Building::where('code', $request->building_type)->where('level',1)->value('id'),
            'plot_id'=>$request->plot_id,
            'level'=>1,
            'storage'=>1,
            'volume'=>1,
            'speed'=>1,
        ]);
        $main_building = [];
        $add_buildings = [];
        $all_buildings = BuildingMap::select('type', 'name', 'buildings_map.level as level', 'code', 'volume', 'storage', 'speed')
            ->where('plot_id', $request->plot_id)
            ->join('buildings', 'buildings_map.building_id', '=', 'buildings.id')
            ->get()->toArray();
//        dd($all_buildings);
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

    public function upgrade_building(Request $request)
    {

        $buildings = DB::table('buildings_map as bm')
            ->where('bm.plot_id', $request->plot_id)
            ->join('buildings as b', 'bm.building_id', 'b.id')
            ->where('b.code',$request->type)
            ->where('b.type', $request->building)
            ->update(['bm.level'=>DB::raw("bm.level +1")]);

        $main_building = [];
        $add_buildings = [];
        $all_buildings = BuildingMap::select('type', 'name', 'buildings_map.level as level', 'code', 'volume', 'storage', 'speed')
            ->where('plot_id', $request->plot_id)
            ->join('buildings', 'buildings_map.building_id', '=', 'buildings.id')
            ->get()->toArray();
//        dd($all_buildings);
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
     * @param \App\Http\Requests\StoreBuildingMapRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuildingMapRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BuildingMap $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function show(BuildingMap $buildingMap)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BuildingMap $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function edit(BuildingMap $buildingMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBuildingMapRequest $request
     * @param \App\Models\BuildingMap $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuildingMapRequest $request, BuildingMap $buildingMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BuildingMap $buildingMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuildingMap $buildingMap)
    {
        //
    }
}
