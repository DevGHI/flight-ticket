<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\TicketPrice;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    function index(){
        $tickets=Ticket::all();
        // dd($tickets);
        foreach ($tickets as $data){
            $data['current_price']=1000;
        }
        return $tickets;
    }

    function store(Request $request){

        $request->validate([
            'start_city' => 'required',
            'end_city' => 'required',
            'airline_id' => 'required',
            'destination_time' => 'required',
            'arrival_time' => 'required',
            'ticket_price' => 'required',
            'ticket_level' => 'required',
            'ticket_amount' => 'required',
            'ticket_duration' => 'required',
        ]);

        $arr=$request->all();
        unset($arr['ticket_price']);
        unset($arr['ticket_level']);
        unset($arr['ticket_amount']);
        unset($arr['ticket_duration']);

        $ticket=Ticket::create($arr);

        $ticket_prices=$request->get('ticket_price');
        $ticket_levels=$request->get('ticket_level');
        $ticket_amounts=$request->get('ticket_amount');
        $ticket_durations=$request->get('ticket_duration');

        for ($i=0;$i<count($ticket_prices);$i++){
           TicketPrice::create([
               'ticket_id'=>$ticket->id,
               'price'=>$ticket_prices[$i],
               'level'=>$ticket_levels[$i],
               'amount'=>$ticket_amounts[$i],
               'duration'=>$ticket_durations[$i],
           ]);
        }


         notify()->success('Ticket Created Successful');

      return redirect()->route('ticket-create');
    //   return Redirect::to('tickets')->with('success','Ticket created successfully.');
    }
    public function show(){
         $ticket=Ticket::all();
        //  dd($tickets);
        return view('admin.ticket.detail')->with([
            'ticket'=>$ticket
        ]);
    }
   public function destroy($id)
    {
        Ticket::findOrFail($id)->delete();
        return redirect('ticket-show')->with('success','Ticket created successfully.');
    }
}
