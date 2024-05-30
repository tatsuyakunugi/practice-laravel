<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

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
}