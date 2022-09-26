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
        $building = DB::table('buildings_map')
            ->where('plot_id', $request->plot_id)
            ->where('code', $request->type)
            ->where('type', $request->building);

        $building->update(['level' => 0]);

//      dd($building->get());

        $main_building = [];
        $add_buildings = [];
        $all_buildings = BuildingMap::where('plot_id', $request->plot_id)
            ->get()->toArray();

        foreach ($all_buildings as $record) {
            if ($record['type'] == 'Main') {
                $main_building['id'] = $record['id'];
                $main_building['type'] = $record['code'];
                $main_building['level'] = $record['level'];
                $main_building['params']['volume'] = $record['volume'];
                $main_building['params']['storage'] = $record['storage'];
                $main_building['params']['speed'] = $record['speed'];
            } else {
                $add_buildings[] = [
                    'id' => $record['id'],
                    'type' => $record['code'],
                    'level' => $record['level'],
                ];
            }
        }
        if (empty($main_building)) {
            $main_building['id'] = $record['id'];
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
                    'id'=> 0,
                    'type' => 1,
                    'level' => 0,
                ];
                $add_buildings[2] = [
                    'id'=> 0,
                    'type' => 2,
                    'level' => 0,
                ];
                $add_buildings[3] = [
                    'id'=> 0,
                    'type' => 3,
                    'level' => 0,
                ];
            case 1:
                $add_buildings[2] = [
                    'id'=> 0,
                    'type' => 2,
                    'level' => 0,
                ];
                $add_buildings[3] = [
                    'id'=> 0,
                    'type' => 3,
                    'level' => 0,
                ];
            case 2:
                $add_buildings[3] = [
                    'id'=> 0,
                    'type' => 3,
                    'level' => 0,
                ];
        }
        return new JsonResource(['MainBuilding' => $main_building, 'AdditionalBuilding' => $add_buildings]);
    }

    public function build(Request $request)
    {
//BUILDING ADDON
        if ($request->building_id !=0) {
            if ($request->building_type > 10) {
                BuildingMap::find($request->building_id)->update([
                    'name' => Building::where('code', $request->building_type)->value('name'),
                    'code' => $request->building_type,
                    'type' => Building::where('code', $request->building_type)->value('type')
                ]);
            }
        } else {
            BuildingMap::create([
                'plot_id' => $request->plot_id,
                'level' => 1,
                'name' => Building::where('code', $request->building_type)->value('name'),
                'code' => $request->building_type,
                'type' => Building::where('code', $request->building_type)->value('type')
            ]);
        }
//BUILDING MAIN
        if ($request->building_id !=0) {
            if ($request->building_type < 4) {
                BuildingMap::find($request->building_id)->update([
                    'level' => 1,
                    'storage' => 1,
                    'volume' => 1,
                    'speed' => 1,
                    'name' => Building::where('code', $request->building_type)->value('name'),
                    'code' => $request->building_type,
                    'type' => Building::where('code', $request->building_type)->value('type'),
                    'parent_code' => BuildingMap::where('type', 'Main')->value('code'),
                ]);
            }
        } else {
            BuildingMap::create([
                'level' => 1,
                'storage' => 1,
                'volume' => 1,
                'speed' => 1,
                'plot_id' => $request->plot_id,
                'name' => Building::where('code', $request->building_type)->value('name'),
                'code' => $request->building_type,
                'type' => Building::where('code', $request->building_type)->value('type'),
                'parent_code' => BuildingMap::where('type', 'Main')->value('code'),
            ]);
        }

//        //check what do we build main or add
//        if ($request->building_type > 10) {
//            $additional_building = DB::table('buildings_map')
//                ->where('plot_id', $request->plot_id)
//                ->where('type', '=', 'Infrastructure');
//
////        dd($additional_building->get());
//
//        //check if we building new or update existing with level = 0
//            if ($additional_building->count() < 3) {
//                $additional_building->insert([
//                    'plot_id' => $request->plot_id,
//                    'level' => 1,
//                    'name' => Building::where('code', $request->building_type)->value('name'),
//                    'code' => $request->building_type,
//                    'type' => Building::where('code', $request->building_type)->value('type'),
//                    'parent_code' => BuildingMap::where('type','Main')->value('code'),
//                ]);
//            } else {
//                BuildingMap::where('id',$request->building_id)->update([
//                    'level' => 1,
//                    'name' => Building::where('code', $request->building_type)->value('name'),
//                    'code' => $request->building_type,
//                    'type' => Building::where('code', $request->building_type)->value('type')
//                ]);
//            }
//        }
//
//        //same for main building
//        if ($request->building_type < 10) {
//        $main_building = DB::table('buildings_map')
//            ->where('plot_id', $request->plot_id)
//            ->where('type', '=', 'Main');
//
//        //        dd($main_building->exists());
//
//            if (!$main_building->exists()) {
//                $main_building->insert([
//                    'plot_id' => $request->plot_id,
//                    'level' => 1,
//                    'storage' => 1,
//                    'volume' => 1,
//                    'speed' => 1,
//                    'name' => Building::where('code', $request->building_type)->value('name'),
//                    'code' => $request->building_type,
//                    'type' => Building::where('code', $request->building_type)->value('type')
//                ]);
//            } else {
//                $main_building->update([
//                    'level' => 1,
//                    'storage' => 1,
//                    'volume' => 1,
//                    'speed' => 1,
//                    'name' => Building::where('code', $request->building_type)->value('name'),
//                    'code' => $request->building_type,
//                    'type' => Building::where('code', $request->building_type)->value('type')
//                ]);
//

//        $additional_buildings_for_update_type = DB::table('buildings_map as bm')
//        ->where('bm.plot_id', $request->plot_id)
//        ->where('b.type', '=', 'Infrastructure');

//        ->update([

//            'building_id' => $request->building_type == 1 && $i == 1 ? 15
//                : ($request->building_type == 1 && $i == 2 ? 16
//                    : ($request->building_type == 1 && $i == 3 ? 17 : ''))

//        ]);

//            dd($additional_buildings_for_update_type);
//
//                switch ($request->building_type) {
//                    case 1:
//                        foreach ($additional_buildings_for_update_type as $ab) {
//                            for ($i=4; $i<=6; $i++) {
//                            dd($ab);
//                            $ab
//                                ->update(['id' => 15]);
//                            }
//
//                        break;
//                    case 2:
//                        foreach ($additional_buildings_for_update_type as $ab) {
//                            for ($i=7; $i<=9; $i++) {
//                                $ab->update([
//                                    'bm.id' => $i
//                                ]);
//                            }
//                        }
//                        break;
//                    case 3:
//                        foreach ($additional_buildings_for_update_type as $ab) {
//                            for ($i=10; $i<=12; $i++) {
//                                $ab->update([
//                                    'bm.id' => $i
//                                ]);
//                            }
//                        }
//                        break;

//                }

        $main_building = [];
        $additional_buildings = [];
        $all_buildings = BuildingMap::where('plot_id', $request->plot_id)
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
