<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;

class LikeController extends Controller
{
    //public function store(Request $request)
    //{
        //$user = Auth::user();
        //$shop = Shop::find($request->shop_id);
        //$existingLike = '';

        //if(Like::where('user_id', $user->id)->where('shop_id', $shop->id)->exists())
        //{
            //$existingLike = Like::where('user_id', $user->id)->where('shop_id', $shop->id)->first();

            //if(!$existingLike)
            //{
                //$like = new Like([
                    //'user_id' => $user->input('id'),
                    //'shop_id' => $request->input('shop_id'),
                //]);
                
                //$like->save();
            //}
        //}
        
        //return back();
    //}

    //public function destroy(Request $request)
    //{
        //$user = Auth::user();
        //$shop = Shop::find($request->shop_id);
        //$like = Like::where('user_id', $user->id)->where('shop_id', $shop->id)->get();

        //$like->delete();
        
        //return back();
    //}
}
