<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation ;
use App\Models\Table ;
use App\Http\Requests\ReservStoreRequest;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Enums\TableStatus;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index' , compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables = Table::where('status' , TableStatus::Available )->get();
        return view('admin.reservations.create' , compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservStoreRequest $request)
    {

        $table = Table::findOrFail($request->table_id);

        if( $request->guest_number > $table->guest_number)
        {
            return back()->with('warning' , 'Please choose the table base on guests.');
        }
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations() as $res) {
            if( $res->res_date->format('Y-m-d') == $request_date->format('Y-m-d')){
                return back()->with('warning' , 'This table is reserved  for this time');
            }
        }

        Reservation::create([
            'first_name' => $request->first_name , 
            'last_name' => $request->last_name , 
            'email' => $request->email  , 
            'tel_number' => $request->tel_number , 
            'guest_number' => $request->guest_number , 
            'res_date' => $request->res_date ,
            'table_id' => $request->table_id
        ]);

        return to_route('admin.reservations.index')->with('success' , 'Reservation');
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::where('status' , TableStatus::Available )->get();
        return view('admin.reservations.edit'  , compact('tables' , 'reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservStoreRequest $request, Reservation $reservation)
    {
        $table = Table::findOrFail($request->table_id);

        if( $request->guest_number > $table->guest_number)
        {
            return back()->with('warning' , 'Please choose the table base on guests.');
        }

        $reservation->update([
            'first_name' => $request->first_name , 
            'last_name' => $request->last_name , 
            'email' => $request->email  , 
            'tel_number' => $request->tel_number , 
            'guest_number' => $request->guest_number , 
            'res_date' => $request->res_date ,
            'table_id' => $request->table_id
        ]);

        return to_route('admin.reservations.index')->with('warning' , 'Reservation edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('danger' , 'Reservation deleted');
    }
}
