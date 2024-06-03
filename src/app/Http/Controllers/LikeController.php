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
    //public function store(Request $request){
        // 認証済みユーザーを取得
        //$user = Auth::user();

        //if ($user) {
            // Userのid取得
            //$user_id = Auth::id();
            //$shop = Shop::find($request->shop_id);

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

    public function store($shopId)
    {
        //is_like()メソッドを使って、すでにお気に入り登録しているかを確認した後、お気に入り登録をする(重複させない)
        $user = Auth::user();
        if(!$user->is_like($shopId))
        {
            $user->like_shops()->attach($shopId);
        }
        return back();
    }

    public function destroy($shopId)
    {
        //is_like()メソッドを使ってすでに登録済みかを確認し、もししていたら登録を解除する
        $user = Auth::user();
        if($user->is_like($shopId))
        {
            $user->like_shops()->detach($shopId);
        }
        return back();
    }
}
