<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store(ReservationRequest $request)
    {
        $this->validate($request,[
            'date' => 'required',
            'time' => 'required',
            'number_of_people' => 'required',
        ]);

        Carbon::useMonthsOverflow(false);

        $now = Carbon::now();
        $user = Auth::user();
        $shop = Shop::find($request->input('shop_id'));
        $reservation_day = Carbon::parse($request->input('date') . '' . $request->input('time'));
        $number_of_people = $request->input('number_of_people');

        if($reservation_day->isPast())
        {
            return back()->with('error', '現在日時よりも前の予約は出来ません');
        }

        if(Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->where('reservation_day', $reservation_day)->exists())
        {
            $reservation = Reservation::where('user_id', $user->id)->where('shop_id', $shop->id)->where('reservation_day', $reservation_day)->first();
            
            if(($reservation->reservation_day) == $reservation_day)
            {
                return back()->with('error', '予約が重複しています');
            }
        }

        $reservation = new Reservation([
            'user_id' => $user->id,
            'shop_id' => $shop->id,
            'reservation_day' => $reservation_day,
            'number_of_people' => $number_of_people,
        ]);

        //保存
        $reservation->save();
        Session::put('message', 'ご予約ありがとうございました');
        return view('done');
    }

    public function destroy(Request $request)
    {
        Reservation::find($request->id)->delete();
        Session::put('message', '予約を取り消しました');
        return view('done');
    }
}
