@extends('layouts.admin.master')

@section('css')

@endsection


@section('content')



<div class="page-wrapper">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <div class="d-inline">
                        <h4>Advanced DataTable</h4>
                        <span>Advanced initialisation of DataTables</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-1.htm"> <i class="feather icon-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Basic Initialization</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Advance Initialization</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- DOM/Jquery table start -->
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-header">
                   
                    <h5>Basic Form Inputs</h5>
                    <span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>


                    <div class="card-header-right">
                        <i class="icofont icofont-spinner-alt-5"></i>
                    </div>

                </div>
                <div class="card-block">
                    <h4 class="sub-title">Basic Inputs</h4>
                <form action="{{ route('ticket-update',$ticket->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Start City</label>
                            <div class="col-sm-10">
                                <select name="start_city" class="js-example-basic-multiple form-control">
                                    <option value="{{ $ticket->id }}">{{ $ticket->startcity->name }}</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">End City</label>
                            <div class="col-sm-10">
                                <select name="end_city" class="js-example-basic-multiple form-control">
                                 <option value="{{ $ticket->id }}">{{ $ticket->endcity->name }}</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Airline</label>
                            <div class="col-sm-10">
                                <select name="airline_id" class="js-example-basic-multiple form-control">
                                   <option value="{{ $ticket->id }}">{{ $ticket->airline->name  }}</option>
                                </select>
                            </div>
                        </div>

                            <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Distination Time</label>
                            <div class="col-sm-10">
                                <input value="{{ $ticket->destination_time }}" type="datetime-local" name="destination_time" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Arrival Time</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" value="{{ $ticket->arrival_time }}" name="arrival_time" class="form-control">
                            </div>
                        </div>
                        <div x-data="{loop:1}">
                            <template x-for="(item,index) in loop" :key="item">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Ticket Price</label>
                                        <div class="col-sm-10">
                                            <div class="form-group row">
                                                <div class="col-sm-11">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            @foreach ($ticket_price as $data)
                                                          
                                                                 <input type="number" name="ticket_price[]" class="form-control" placeholder="Price" value="{{ $data->price }}">
                                                           
                                                           
                                                            @endforeach
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <select name="ticket_level[]" id="" class="form-control">
                                                                  @foreach ($ticket_price as $data)
                                                                    <option value="{{ $data->id }}" {{ $data->id==$ticket->ticket_id ? 'selected' : '' }}>{{ $data->level }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                                @foreach ($ticket_price as $data)
                                                                <input type="number" value="{{ $data->amount }}" name="ticket_amount[]" class="form-control">
                                                              @endforeach
                                                        </div>

                                                        <div class="col-sm-3">
                                                            <input type="date" name="ticket_duration[]" class="form-control" placeholder="Duration">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                <div x-show="index==0">
                                                    <button type="button" class="btn btn-round btn-success" x-on:click="loop++">+</button>
                                                </div>
                                                <div x-show="index!=0">
                                                    <button type="button" class="btn btn-round btn-danger" x-on:click="loop--">-</button>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </template>
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary" style="float: right">
                         {{-- <a href="{{ route('ticket-show') }}" class="btn btn-warning">Details</a> --}}

                    </form>
                </div>
            </div>

        </div>
        <!-- Page-body start -->
    </div>
</div>

















@endsection

@section('js')

@endsection
