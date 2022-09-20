<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuctionRequest;
use App\Http\Requests\UpdateAuctionRequest;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use App\Models\Plot;
use App\Models\Resource;
use App\Models\User;
use App\Models\Item;

class AuctionController extends Controller
{

    public function show_lots($source)
    {
        switch ($source) {
            case 'items':
                return AuctionResource::collection(Auction::where('item_id', '<>', null)->get());
            case 'resources':
                return AuctionResource::collection(Auction::where('resource_id', '<>', null)->get());
            case 'plots':
                return AuctionResource::collection(Auction::where('plot_id', '<>', null)->get());
        }
    }

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

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreAuctionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuctionRequest $request)
    {
        if ($request->resource_id <> 0) {
            $resource = Resource::find($request->resource_id)->type;
            $user = User::find($request->user_id);
            $res_user = $resource . '_count';
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
        }
        if ($request->item_id <> 0) {
            Auction::create([
                'user_id' => $request->user_id,
                'plot_id' => $request->plot_id,
                'lot_price' => $request->lot_price,
                'lot_status' => 'Active',
            ]);
        }
        if ($request->plot_id <> 0) {
            Auction::create([
                'user_id' => $request->user_id,
                'item_id' => $request->item_id,
                'lot_price' => $request->lot_price,
                'lot_status' => 'Active',
            ]);
        }

        return response('New lot created!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Auction $auction
     * @return \Illuminate\Http\Response
     */
    public
    function show(Auction $auction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Auction $auction
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateAuctionRequest $request
     * @param \App\Models\Auction $auction
     * @return \Illuminate\Http\Response
     */
    public
    function update(UpdateAuctionRequest $request, Auction $auction)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Auction $auction
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Auction $auction)
    {
        //
    }

    public
    function buy(UpdateAuctionRequest $request)
    {
        $auction = Auction::find($request->auction_id);
        $buyer = User::find($request->user_id);
        $seller = User::find($auction->user_id);

        if ($buyer->dollars_count < $auction->lot_price) return response('You have no enough money! Work harder!', 210);

        if ($auction->resource_id <> 0) {
            $resource = Resource::find($auction->resource_id)->type;
            $res_string = $resource . '_count';
            $buyer->update([
                $res_string => $buyer->$res_string + $auction->res_quantity,
                'dollars_count' => $buyer->dollars_count - $auction->lot_price,
            ]);
            $seller->update([
                'dollars_count' => $seller->dollars_count + $auction->lot_price,
            ]);
            $auction->update([
                'status' => 'Sold',
            ]);
        }
        if ($auction->item_id <> 0) {
            $item = Item::find($request->item_id);
            $buyer->update([
                'dollars_count' => $buyer->dollars_count - $auction->lot_price,
            ]);
            $item->update([
                'user_id' => $buyer_id,
            ]);
            $seller->update([
                'dollars_count' => $seller->dollars_count + $auction->lot_price,
            ]);
            $auction->update([
                'status' => 'Sold',
            ]);
        }
        if ($auction->plot_id <> 0) {
            $plot = Plot::find($request->plot_id);
            $buyer->update([
                'dollars_count' => $buyer->dollars_count - $auction->lot_price,
            ]);
            $plot->update([
                'user_id' => $buyer_id,
            ]);
            $seller->update([
                'dollars_count' => $seller->dollars_count + $auction->lot_price,
            ]);
            $auction->update([
                'status' => 'Sold',
            ]);
        }

        return response('You bought this lot!');
    }

}
