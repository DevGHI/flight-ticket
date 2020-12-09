<?php

namespace App\Http\Resources;

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
            'price' => '4000'
        ];
    }
}
