<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuctionRequest;
use App\Http\Requests\UpdateAuctionRequest;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use App\Models\Resource;
use App\Models\User;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
       return AuctionResource::collection(Auction::all());
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

    public function store_plot(StoreAuctionRequest $request)
    {
        $user=User::find($request->user_id);

        Auction::create([
            'user_id' => $request->user_id,
            'plot_id' => $request->plot_id,
            'lot_price' => $request->lot_price,
            'lot_status' => 'Active',
        ]);
        return response ('New lot created!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuctionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuctionRequest $request)
    {
        $resource = Resource::find($request->resource_id)->type;
        $user=User::find($request->user_id);
        $res_user = $resource.'_count';

        $user->update([
            $res_user => $user->$res_user - $request->res_quantity,
        ]);

        Auction::create([
            'user_id' => $request->user_id,
            'resource_id' => $request->resource_id,
            'res_quantity' => $request->res_quantity,
            'lot_price' => $request->lot_price,
            'lot_status' => 'Active',
        ]);
        return response ('New lot created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuctionRequest  $request
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuctionRequest $request, Auction $auction)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }

    public function buy(UpdateAuctionRequest $request){


        $auction = Auction::find($request->auction_id);
        $resource = Resource::find($auction->resource_id)->type;
        $buyer = User::find($request->user_id);

        if ($buyer->dollars_count < $auction->lot_price) return response('You have no enough money! Work harder!', 210);

        $res_string = $resource.'_count';

        $buyer->update([
            $res_string => $buyer->$res_string + $auction->res_quantity,
            'dollars_count' => $buyer->dollars_count - $auction->lot_price,
        ]);

        $seller = User::find($auction->user_id);

        $seller->update([
           'dollars_count'=>$seller->dollars_count + $auction->lot_price,
        ]);

        $auction->update([
            'status' => 'Sold',
        ]);

        return response(['You bought this lot!', 'buyer' => $buyer]);
    }

}
