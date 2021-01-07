@extends('layouts.master')



@section('content')

{{-- <livewire:counter /> --}}

@livewire('post-component',['title'=>'Title 1','detail'=>'ected an abnormally high volume of traffic on our site. To let us know you’re a human and not a BOT, please pass the above security test. We’ll remember your response and won’t show you this security check again.','author'=>"YeYintKo"])
@livewire('post-component',['title'=>'Title 2','detail'=>'ected an abnormally high volume of traffic on our site. To let us know you’re a human and not a BOT, please pass the above security test. We’ll remember your response and won’t show you this security check again.','author'=>"YeYintKo"])
@livewire('post-component',['title'=>'Title 3','detail'=>'ected an abnormally high volume of traffic on our site. To let us know you’re a human and not a BOT, please pass the above security test. We’ll remember your response and won’t show you this security check again.','author'=>"YeYintKo"])
@livewire('post-component',['title'=>'Title 4','detail'=>'ected an abnormally high volume of traffic on our site. To let us know you’re a human and not a BOT, please pass the above security test. We’ll remember your response and won’t show you this security check again.','author'=>"YeYintKo"])

{{-- @if(app('request')->input('page')==1)
{{"start is ".'1'}}
@else 
{{"start is ".app('request')->input('page')}}
@endif --}}
@empty(app('request')->input('page'))
    {{"1"}}
@endempty

@endsection