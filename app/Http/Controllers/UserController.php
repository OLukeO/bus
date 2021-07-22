<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        $bus = Bus::all();

        return view('bus.user', compact('bus'));
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('bus.Inquire');
    }

    public function store(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'goback' => 'required',
        ]);
        $id = $request->number; //公車號碼
        $id2 = $request->goback; //公車路程(去程:0 回程:1)
        $input = Http::get("http://e-traffic.taichung.gov.tw/DataAPI/api/BusRouteAPI/{$id}/{$id2}");
        //用Http::get方式去呼叫API得到資料存入變數input

        /*  $myString 代表站牌 ;
         */

        $inner = $input['Stops']; //將API回傳資料中的Dynamic陣列資料存入inner變數
            $myString = implode(',', array_column($inner, 'StopName')); //將inner陣列中多筆PlateNumb資料用逗號隔開，並將資料存入mySting變數
        //,號分隔方法參考網址:https://stackoverflow.com/questions/36134258/laravel-array-to-string-conversion/36134350

        // * 更新對應欄位
        $bus = new Bus([
            'number' => $request->get('number'),
            'goback' => $request->get('goback'),
            'stop' => $myString,
        ]);

        $bus->save();

        return redirect('/bus')->with('success', '資料已完成!');
    }

    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }

    public function delete($id)
    {
    }
}
