<?php

namespace App\Http\Livewire;

use Livewire\Component;



class Counter extends Component
{

    public $arr=[
        'name'=>''
    ];

    public $number=0;

    public function increase($count)
    {
        $this->number+=$count;
    }

    
    public function render()
    {
        return view('livewire.counter')
        ->extends('layouts.master')
        ->section('content');;
    }
}
