<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Location;
use App\Barcode;



class MainController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createUser(Request $request)
    {
        $user_id = User::insertGetId(['email'=>$request->email,'name'=>$request->name]);

        $user = User::find($user_id);
        $location = Location::where('ref',$request->ref)->first();

        return view('play',compact('user','location'));


    }


    public function setGame(Request $request)
    {

        $barcodes = Barcode::where('barcodes.is_used','<>','1')
                            ->leftJoin('rewards','rewards.id','=','barcodes.reward_id')
                            ->where('rewards.location_id',$request->location->id)
                            ->inRandomOrder()
                            ->limit(2)
                            ->select('barcodes.*','rewards.title')
                            ->get();
        
        foreach($barcodes as $barcode)
        {
            Game::insert(['location_id'=>$request->location->id,'player_id'=>$request->user->id,'barcode_id'=>$barcode->id]);
            Barcode::where('id',$barcode->id)->update(['is_used','1']);
        }                    
        
        
        
        return view('rewards',compact('barcodes'));


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
