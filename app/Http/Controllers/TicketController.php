<?php

namespace App\Http\Controllers;


use App\Http\Resources\TicketCollection;
use App\Http\Resources\TicketResource;

use App\Models\City;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Airline;
use App\Models\TicketPrice;
use Illuminate\Http\Request;
use Throwable;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::all();

        // dd($tickets);
        foreach ($tickets as $data){
            $data['current_price']=1000;
        }
        return view('admin.ticket.detail',compact('tickets'));
    }

    public function api_tickets()
    {
        $tickets=Ticket::all();

       $data=TicketResource::collection($tickets);
        return [
            'data'=>$data
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::orderBy('name')->get();
        $airlines=Airline::orderBy('name')->get();
        return view('admin.ticket.create-ticket')->with([
            'cities'=>$cities,
            'airlines'=>$airlines
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ticket = Ticket::all();
        $cities=City::orderBy('name')->get();
        $airlines=Airline::orderBy('name')->get();
        //  dd($ticket);
        return view('admin.ticket.detail')->with([
            'ticket'=>$ticket,
            'cities'=> $cities,
            'airlines'=> $airlines
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket_price=TicketPrice::all();
        $cities=City::findorFail($id);
     
        $airlines=Airline::orderBy('name')->get();
         return view('admin.ticket.edit-ticket')->with([
            'ticket'=>$ticket,
            'cities'=> $cities,
            'airlines'=> $airlines,
            'ticket_price'=> $ticket_price
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

        $ticket=Ticket::findOrFail($id)->update($arr>all());

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

         notify()->success('Ticket Update Successful');

      return redirect()->route('ticket-create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //try {
            Order::where('ticket_id',$id)->delete();
            TicketPrice::where('ticket_id',$id)->delete();
            Ticket::findOrFail($id)->delete();

             return redirect()->route('tickets.index')
                               ->with('success','Ticket deleted successfully');
       // }catch (Throwable $e){
       //     return redirect()->route('tickets.index')
        //                       ->with('error','Something was wrong! ');
        //}

        // return [
        //     'status'=>'Success',
        //     'message'=>'Successfull Deleted',
        //     'data'=>$data
        // ];
    }
}
