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

    public function destroy(Request $request)
    {
        $building = DB::table('buildings_map as bm')
            ->where('bm.plot_id', $request->plot_id)
            ->join('buildings as b', 'bm.building_id', 'b.id')
            ->where('b.code', $request->type)
            ->where('b.type', $request->building);

        $building->update(['bm.level' => 0]);

//      dd($building->get());

        $main_building = [];
        $add_buildings = [];
        $all_buildings = BuildingMap::select('type', 'name', 'buildings_map.level as level', 'code', 'volume', 'storage', 'speed')
            ->where('plot_id', $request->plot_id)
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

    public function build(Request $request)
    {
        if ($request->building_type > 10) {
            $additional_building = DB::table('buildings_map as bm')
                ->where('bm.plot_id', $request->plot_id)
                ->join('buildings as b', 'bm.building_id', '=', 'b.id')
                ->where('b.code', '=', $request->building_type);

//        dd($additional_building->get());

            if (!$additional_building->exists()) {
                $additional_building->insert([
                    'building_id' => Building::where('code', $request->building_type)->where('level', 1)->value('id'),
                    'plot_id' => $request->plot_id,
                    'level' => 1,
                ]);
            } else {
                $additional_building->update([
                    'building_id' => Building::where('code', $request->building_type)->where('level', 1)->value('id'),
                    'plot_id' => $request->plot_id,
                    'level' => 1,
                ]);
            }
        }


        if ($request->building_type < 10) {
        $main_building = DB::table('buildings_map as bm')
            ->where('bm.plot_id', $request->plot_id)
            ->join('buildings as b', 'bm.building_id', '=', 'b.id')
            ->where('b.type', '=', 'Main');

//        dd($main_building->exists());

            if (!$main_building->exists()) {
                $main_building->insert([
                    'building_id' => Building::where('code', $request->building_type)->where('level', 1)->value('id'),
                    'plot_id' => $request->plot_id,
                    'level' => 1,
                    'storage' => 1,
                    'volume' => 1,
                    'speed' => 1,
                ]);
            } else {
                $main_building->update([
                    'building_id' => Building::where('code', $request->building_type)->where('level', 1)->value('id'),
                    'plot_id' => $request->plot_id,
                    'level' => 1,
                    'storage' => 1,
                    'volume' => 1,
                    'speed' => 1,
                ]);
            }
        }

        $main_building = [];
        $additional_buildings = [];
        $all_buildings = BuildingMap::select('type', 'name', 'buildings_map.level as level', 'code', 'volume', 'storage', 'speed')
            ->where('plot_id', $request->plot_id)
            ->join('buildings', 'buildings_map.building_id', '=', 'buildings.id')
            ->orderBy('code')
            ->get()->toArray();
//        dd($all_buildings);
        foreach ($all_buildings as &$record) {
            if ($record['type'] == 'Main') {
                $main_building['type'] = $record['code'];
                $main_building['level'] = $record['level'];
                $main_building['params']['volume'] = $record['volume'];
                $main_building['params']['storage'] = $record['storage'];
                $main_building['params']['speed'] = $record['speed'];
            } else {
                $record['type'] = isset($main_building['type']) ?
                    intval(substr_replace(strval($record['code']), $main_building['type'], 0, 1))
                    : 11;
                $additional_buildings[] = [
                    'type' => isset($main_building['type']) ?
                        intval(substr_replace(strval($record['code']), $main_building['type'], 0, 1))
                        : 11,
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
        $additional_buildings_count = count($additional_buildings);
        switch ($additional_buildings_count) {
            case 0:
                $additional_buildings[1] = [
                    'type' => $main_building['type'] . '1',
                    'level' => 0,
                ];
                $additional_buildings[2] = [
                    'type' => $main_building['type'] . '2',
                    'level' => 0,
                ];
                $additional_buildings[3] = [
                    'type' => $main_building['type'] . '3',
                    'level' => 0,
                ];
            case 1:
                $additional_buildings[2] = [
                    'type' => $main_building['type'] . '2',
                    'level' => 0,
                ];
                $additional_buildings[3] = [
                    'type' => $main_building['type'] . '3',
                    'level' => 0,
                ];
            case 2:
                $additional_buildings[3] = [
                    'type' => $main_building['type'] . '3',
                    'level' => 0,
                ];
        }
        return new JsonResource(['MainBuilding' => $main_building, 'AdditionalBuilding' => $additional_buildings]);

    }

    public function upgrade_building(Request $request)
    {

        $buildings = DB::table('buildings_map as bm')
            ->where('bm.plot_id', $request->plot_id)
            ->join('buildings as b', 'bm.building_id', 'b.id')
            ->where('b.code', $request->type)
            ->where('b.type', $request->building)
            ->update(['bm.level' => DB::raw("bm.level +1")]);

        $main_building = [];
        $additional_buildings = [];
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
                $additional_buildings[] = [
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
        $additional_buildings_count = count($additional_buildings);
        switch ($additional_buildings_count) {
            case 0:
                $additional_buildings[1] = [
                    'type' => 1,
                    'level' => 0,
                ];
                $additional_buildings[2] = [
                    'type' => 2,
                    'level' => 0,
                ];
                $additional_buildings[3] = [
                    'type' => 3,
                    'level' => 0,
                ];
            case 1:
                $additional_buildings[2] = [
                    'type' => 2,
                    'level' => 0,
                ];
                $additional_buildings[3] = [
                    'type' => 3,
                    'level' => 0,
                ];
            case 2:
                $additional_buildings[3] = [
                    'type' => 3,
                    'level' => 0,
                ];
        }

        return new JsonResource(['MainBuilding' => $main_building, 'AdditionalBuilding' => $additional_buildings]);
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
}
