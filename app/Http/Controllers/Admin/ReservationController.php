<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Http\Request;
use App\Models\reservation;
use App\Models\Table;
use Illuminate\Support\Facades\Storage;




class ReservationController extends Controller
{

    public function index()
    {
        $Reservations = reservation::all();
        return view('admin.reservations.index',compact('Reservations'));
    }


    public function create()
    {
        $tables = Table::all();
    return view('admin.reservations.create', compact('tables'));
    }


  public function store(ReservationStoreRequest $request)
{
    Reservation::create($request->validated());
    return to_route('admin.reservations.index');
}


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
           $tables = Table::all();
           $reservation = Reservation::findOrFail($id);
            return view('admin.reservations.edit', compact('reservation','tables'));

    }


  public function update(ReservationStoreRequest $request, $id)
    {
        // Find the reservation by id
        $reservation = Reservation::findOrFail($id);

        // Update the reservation with the new data
        $reservation->first_name = $request->input('first_name');
        $reservation->last_name = $request->input('last_name');
        $reservation->email = $request->input('email');
        $reservation->tel_number = $request->input('tel_number');
        $reservation->res_date = $request->input('res_date');
        $reservation->status = $request->input('status');
        $reservation->table_id = $request->input('table_id');

        // Save the updated reservation
        $reservation->save();

        // Redirect back to the reservation index with a success message
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully');
    }






    public function destroy(Reservation $reservation)
    {
    $reservation->delete();
    return to_route('admin.reservations.index');
    }
}