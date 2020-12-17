<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.detail_order');
    }
    function store(Request $request){
        $request->validate([
            'ticket_id'=>'required|numeric',
            'unit_price'=>'required|numeric',
            'total_price'=>'required|numeric',
            'qty'=>'required|numeric'
        ]);
        $arr=$request->all();
        $arr['user_id']=Auth::id();
        $data=Order::create($arr);
        return [
            'status'=>'success',
            'message'=>'Order Successful',
            'data'=>$data
        ];
    }
}
