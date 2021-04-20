<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Game;
use App\Location;
use App\Barcode;
use App\Player;



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
        $user_id = Player::insertGetId(['email'=>$request->email,'name'=>$request->name]);

        $user = Player::find($user_id);
        $location = Location::where('ref',$request->ref)->first();

        $cards = array('lantern-moon','lantern-present');
        
        $barcode = Barcode::where('barcodes.is_used','<>','1')
        ->leftJoin('rewards','rewards.id','=','barcodes.reward_id')
        ->where('rewards.location_id',$location->id)
        ->inRandomOrder()
        ->select('barcodes.*','rewards.title')
        ->count();

        if($barcode > 0)
        {
            $win_per = intval(setting('site.win_per'));
        }
        else{
            $win_per = 0;
        }
        


        return view('play',compact('user','location','cards','win_per'));


    }


    public function setGame(Request $request)
    {

        $barcode = Barcode::where('barcodes.is_used','<>','1')
                            ->leftJoin('rewards','rewards.id','=','barcodes.reward_id')
                            ->where('rewards.location_id',$request->location->id)
                            ->inRandomOrder()
                            ->select('barcodes.*','rewards.title')
                            ->first();
        

                        Game::insert(['location_id'=>$request->location->id,'player_id'=>$request->user->id,'barcode_id'=>$barcode->id]);
                        Barcode::where('id',$barcode->id)->update(['is_used','1']);
        
        return view('rewards',compact('barcode'));


    }

    public function sendResult(Request $request)
    {
        $barcode_id = 0;
        $barcode_code = ' ';
        $type="";
        $url="";
        $reward="";
        if($request->won == "true")
        {
            $barcode = Barcode::where('barcodes.is_used','<>','1')
                        ->leftJoin('rewards','rewards.id','=','barcodes.reward_id')
                        ->leftJoin('locations','locations.id','=','rewards.location_id')
                        ->where('rewards.location_id',$request->location)
                        ->inRandomOrder()
                        ->select('barcodes.*','rewards.title as title','locations.url','locations.type')
                        ->first();
              if(isset($barcode))
              {
                  $barcode_id = $barcode->id;
                  $barcode_code = $barcode->barcode;
                  Barcode::where('id',$barcode->id)->update(['is_used'=>'1']);
                  $type=$barcode->type;
                  $url=$barcode->url;
                  $reward=$barcode->title;
                  
              }          
        }
        Game::insert(['location_id'=>$request->location,'player_id'=>$request->user,'barcode_id'=>$barcode_id ]);
        


        return response(['barcode_code'=>$barcode_code,'url'=>$url,'type'=>$type,"reward"=>$reward]);
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
