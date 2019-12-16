<?php

namespace App\Http\Controllers;

use App\Comment;
use Carbon\Carbon;
use App\Place;
use App\Schedule;
use App\ScheduleDate;
use App\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        
        $user = Auth::user();
        return view('Schedules.show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $place = Place::all();
        return view('Schedules/add', compact('place'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $tmpt = $request->nama;
        $plc = Place::where('nama', 'like', "%".$request->nama."%")->first();
        $tgl = Date::where('date', 'like', "%".$request->date."%")->first();
        if($tgl==true){
            $schdl=Schedule::create([
                'date_id'=>$tgl->id,
                'place_id'=>$plc->id,
                'user_id'=>auth()->id(),
                'day' => $request->day,
                'hourStart' => $request->hourStart,
                'hourEnd' => $request->hourEnd,
        ]);
        }else{

            Date::create([
                'date' => $request->date,
                'created_at' => $request->date
            ]);

            $tgl2 = Date::where('date', 'like', "%".$request->date."%")->first();
            $schdl=Schedule::create([
                'date_id'=>$tgl2->id,
                'place_id'=>$plc->id,
                'user_id'=>auth()->id(),
                'day' => $request->day,
                'hourStart' => $request->hourStart,
                'hourEnd' => $request->hourEnd,
        ]);
        }
        session()->flash('notif', 'Jadwal Berhasil ditambahkan');


        return redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = Date::all()->sortBy('date')->all();
        $user = Auth::user();
        return view('Schedules.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::all();
        $scdl = Schedule::find($id);
        return view('Schedules/editSchedule', compact('scdl', 'place'));   
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
        $plc = Place::where('nama', 'like', "%".$request->nama."%")
            ->first();
        $tgl = Date::where('date', 'like', "%".$request->date."%")->first();

        if($tgl==true){
        $place = Schedule::find($id);
        $place->day  = $request->day;
        $place->hourStart  = $request->hourStart;
        $place->hourEnd  = $request->hourEnd;
        $place->date_id = $tgl->id;
        $place->place_id = $plc->id;
        $place->user_id   = auth()->id();
        }else{
            Date::create([
                'date' => $request->date,
            ]);
            $tgl2 = Date::where('date', 'like', "%".$request->date."%")->first();
            $place = Schedule::find($id);
            $place->day  = $request->day;
            $place->hourStart  = $request->hourStart;
            $place->hourEnd  = $request->hourEnd;
            $place->date_id = $tgl2->id;
            $place->place_id = $plc->id;
            $place->user_id   = auth()->id();
        }
        $place->save();

        session()->flash('notif', 'Jadwal Berhasil diubah');

        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Schedule::find($id);
        $place->delete();

        return redirect()->route('schedules.index');    
    }

}
