<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
     protected $guarded=[];


   public function airline()
    {
        return $this->belongsTo('App\Models\Airline');
    }


    public function startcity()
    {
        return $this->belongsTo('App\Models\City','start_city');
    }

    public function endcity()
    {
        return $this->belongsTo('App\Models\City','end_city');
    }

    public function ticket_price()
    {
        return $this->belongsTo('App\Model\TicketPrice','ticket_id');
    }

}
