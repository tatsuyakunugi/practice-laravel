<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use App\Models\Reservation;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        $keyword = $request->input('keyword');

        $areas = Area::all();
        $genres = Genre::all();

        $items = Shop::query();

        if(!empty($area_id))
        {
            $items->whereHas('area', function ($query) use ($area_id) {
                $query->where('id', $area_id);
            })->get();
        }

        if(!empty($genre_id))
        {
            $items->whereHas('genre', function ($query) use ($genre_id) {
                $query->where('id', $genre_id);
            })->get();
        }

        if(!empty($keyword))
        {
            $items->where('shop_name', 'like', '%' . $keyword . '%')
            ->orwhereHas('area', function ($query) use ($keyword) {
                $query->where('area_name', 'like', '%' . $keyword . '%');
            })
            ->orwhereHas('genre', function ($query) use ($keyword) {
                $query->where('genre_name', 'like', '%' . $keyword . '%');
            })->get();    
        }

        $shops = $items->get();

        return view('index', compact('shops', 'areas', 'genres', 'keyword'));
    }

    //public function store(Request $request){
        // 認証済みユーザーを取得
        //$user = Auth::user();
        //$shop = Shop::find($request->shop_id);

        //if ($user) {
            // Userのid取得
            //$user_id = Auth::id();

            // 既にいいねしているかチェック
            //$existingLike = Like::where('shop_id', $shop->id)
                //->where('user_id', $user_id)
                //->first();

            // 既にいいねしている場合は何もせず、そうでない場合は新しいいいねを作成する
            //if (!$existingLike) {
                //$like = new Like();
                //$like->user_id = $user_id;
                //$like->shop_id = $shop->id;
                //$like->save();
            //}
        //}
        //return back();
    //}

    //public function destroy(Request $request)
    //{
        //$user = Auth::user();
        //$shop = Shop::find($request->shop_id);
        //$like = Like::where('user_id', $user->id)->where('shop_id', $shop->id)->first();

        //$like->delete();
        
        //return back();
    //}

    public function detail($id)
    {
        $shop = Shop::find($id);

        return view('detail', compact('shop'));
    }

    //public function livewire()
    //{
        //$shop = Shop::find(1);

        //return view('livewire', compact('shop'));
    //}

    //public function done(Request $request)
    //{
        //$shop = Shop::find($request->input('shop_id'));
        //$date = $request->input('date');
        //$reservationDate = Carbon::parse($request->input('date'))->format('Y-m-d');
        //$time = $request->input('time');
        //$reservationTime = Carbon::createFromTimeString($request->input('time'))->format('H:i');
        //$reservationDateTime = Carbon::parse($reservationDate . '' . $reservationTime)->format('Y-m-d H:i');
        //$number_of_people = $request->input('number_of_people');

        //return view('done', compact('shop', 'reservationDateTime', 'number_of_people'));
    //}
}