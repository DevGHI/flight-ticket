<?php

namespace App\Http\Resources;

use App\Models\TicketPrice;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $airline=$this->airline;
        $airline['logo']=env('APP_URL').'storage/'.$airline['logo'];
        return [
            'id' => $this->id,
            'start_city' => $this->startcity->name,
            'end_city' => $this->endcity->name,
            'airline' => $airline,
            'destination_time' => $this->destination_time,
            'arrival_time' => $this->arrival_time,
            'price' => $this->getCurrentPrice()
        ];
    }


    private function getCurrentPrice(){
        // $arr= $this->ticket_price;
        $now = date('Y-m-d');
        $ticket_price=TicketPrice::where('ticket_id',$this->id)->orderBy('duration')->get();
        $current_price=0;
        if ($now<=$ticket_price[0]['duration']){
            if ($ticket_price[0]['amount']>0){
                 $current_price=$ticket_price[0]['price'];
            }
            else{
                $current_price=$this->increseLevel($ticket_price,0);
            }
        }
        else if ($now<=$ticket_price[1]['duration']){
            if ($ticket_price[1]['amount']>0){
                 $current_price=$ticket_price[1]['price'];
            }
            else{
                 $current_price=$this->increseLevel($ticket_price,1);
            }
        }
        else if ($now<=$ticket_price[2]['duration']){
            if ($ticket_price[2]['amount']>0){
                 $current_price=$ticket_price[2]['price'];
            }
            else{
                $current_price=$this->decreaseLevel($ticket_price,2);
            }
        }
//        $data=TicketPrice::where('ticket_id',$this->id)->where('duration','>=',$now)->get();
        // $prices=$this->ticket_price::where('duration','<=',$now)->get();
        return $current_price;
    }

    private function increseLevel($ticket_price,$current_level){
        $price=0;
        if ($ticket_price[$current_level+1]['amount']>0){
            $price=$ticket_price[$current_level+1]['price'];
        }
        else{
            if ($current_level+1>=2){//decres
                $price=$this->decreaseLevel($ticket_price,$current_level);
            }else{
                $price=$this->increseLevel($ticket_price,$current_level+1);
            }
        }
        return $price;
    }


    private function decreaseLevel($ticket_price,$current_level){
        $price=0;
        if ($ticket_price[$current_level-1]['amount']>0){
            $price=$ticket_price[$current_level-1]['price'];
        }
        else{
            $price=$this->decreaseLevel($ticket_price,$current_level-1);
        }
        return $price;
    }




}
