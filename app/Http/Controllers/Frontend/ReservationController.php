<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservations;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use function Pest\Laravel\get;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
public function StepOne(Request $request)
{
    $Reservation=$request->session()->get('reservation');
     $min_date=Carbon::today();
     $max_date=Carbon::now()->addWeek();
    return view ('reservations.step-one',compact('Reservation','min_date','max_date'));


}
public function StoreOne(Request $request)
{
    $validated = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'tel_number' => 'required',
        'email' => 'required|email',
        'res_data' => ['required', new DateBetween,new TimeBetween],
        'gust_number' => 'required',
    ]);

}
}
