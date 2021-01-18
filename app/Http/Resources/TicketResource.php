<?php

namespace App\Http\Resources;

use App\Models\TicketPrice;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
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
            'price' => $this->getCurrentPrice(),
            'ticket_left'=>$this->get_ticket_left($this->id,$this->getCurrentPrice()),
        ];
    }

    private function get_ticket_left($ticket_id, $ticket_price){
        $data=TicketPrice::where('ticket_id',$ticket_id)->where('price',$ticket_price)->first();
        return $data->amount;
    }


    private function getCurrentPrice(){
        // $arr= $this->ticket_price;
        $now = date('Y-m-d');
        $ticket_price=TicketPrice::where('ticket_id',$this->id)->orderBy('duration')->get();
        $current_price=0;
        if ($now<=$ticket_price[0]['duration']){
           // dd('111');
            if ($ticket_price[0]['amount']>0){
                 $current_price=$ticket_price[0]['price'];
            }
            else{
                $current_price=$this->increseLevel($ticket_price,0);
            }
        }
        else if ($now<=$ticket_price[1]['duration']){
            if ($ticket_price[1]['amount']>0){
                self::$greatest_level=1;
                $current_price=$ticket_price[self::$greatest_level]['price'];
                // self::$greatest_level=1;
                // if($this->isOKDemand($ticket_price[self::$greatest_level])){
                //     $current_price=$ticket_price[self::$greatest_level]['price'];
                // }
                // else{
                //     $current_price=$this->decreaseLevel($ticket_price,1);
                // }
            }
            else{
                 $current_price=$this->increseLevel($ticket_price,1);
            }
        }
        else if ($now<=$ticket_price[2]['duration']){
            if ($ticket_price[2]['amount']>0){
                self::$greatest_level=2;
                if($this->isOKDemand($ticket_price[self::$greatest_level])){
                    $current_price=$ticket_price[self::$greatest_level]['price'];
                }
                else{
                    $current_price=$this->decreaseLevel($ticket_price,2);
                }
            }
            else{
                //stop
                //$current_price=$this->decreaseLevel($ticket_price,2);
            }
        }
//        $data=TicketPrice::where('ticket_id',$this->id)->where('duration','>=',$now)->get();
        // $prices=$this->ticket_price::where('duration','<=',$now)->get();
        return $current_price;
    }

    private static $greatest_level=0;
    private function increseLevel($ticket_price,$current_level){
        $price=0;
        if ($ticket_price[$current_level+1]['amount']>0){
            $price=$ticket_price[$current_level+1]['price'];
        }
        else{
            if ($current_level+1>=2){//decres
               // self::$greatest_level=$current_level+1;
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
            self::$greatest_level=$current_level-1;
            $price=$this->decreaseLevel($ticket_price,$current_level-1);
        }
        return $price;
    }

    private function isOKDemand($current_ticket_price){
        $current_date=Carbon::now();
        $expired_date=Carbon::parse($current_ticket_price['duration']);
        $remain_date=$expired_date->diffInDays($current_date);
        
        $boo=true;
        $half=$current_ticket_price['total']/2 >= $current_ticket_price['amount'];
        $time=$current_ticket_price['limit']*(2/3)>=$remain_date;
        if ($half && $time){
            $boo=true;
        }
        else{
            $boo=false;
        }
       // dd(self::$greatest_level);
        return $boo;
    }



}
