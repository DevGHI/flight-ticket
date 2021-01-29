<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\TicketPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $rawstatus = config('ticket.order_status');
        $status = array_flip($rawstatus);
        $orders = Order::all();
        // $orders = Order::whereIn('status',[1,2])->get();
        $tickets = TicketPrice::all();
        return view('admin.order.detail_order',compact('tickets','orders','status'));
    }


    public function store(Request $request){
        $request->validate([
            'ticket_id'=>'required|numeric',
            'unit_price'=>'required|numeric',
            'total_price'=>'required|numeric',
            'qty'=>'required|numeric'
        ]);
        $arr=$request->all();
        $arr['user_id']=Auth::id();
        $data=Order::create($arr);
        $ticket_price=TicketPrice::where('ticket_id',$request->ticket_id)->where('price',$request->unit_price)->first();
        $ticket_price->update([
            'amount'=>$ticket_price->amount-$request->qty
        ]);
        
        //Order Mail
        $details=[
            'title'=>'Dear Customer',
            'body'=>"Thank's, your flight ticket order successfull"
        ];
        Mail::to(Auth::user()->email)->send(new OrderMail($details));

        return [
            'status'=>'success',
            'message'=>'Order Successful',
            'data'=>$ticket_price->amount-$request->qty
        ];
    }
    public function destroy($id)
    {
        $delete = Order::findOrFail($id)->delete();
        return redirect('admin/orders')->with('message','Order Deleted SuccessFull');
    }

    public function confirm(Order $orders)
    {
        if($orders->status == false){
            $orders->status = true;
            $orders->update(['confirm'=>$orders->status]);
            return redirect('admin/orders')->with('message','Order Confirm SuccessFull');
        }else{
            $orders->status = false;
            $orders->update(['confirm'=>$orders->status]);
            return redirect('admin/orders')->with('message','Order Status Change SuccessFull');
        }
    }
}
