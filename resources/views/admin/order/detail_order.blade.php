@extends('layouts.admin.master')

@section('css')

@endsection

@section('content')

<div>
    <div class="card">
        <div class="card-header">
            <h5>Order List</h5>
            <div style="float: right">
                {{-- <button class="btn btn-info btn-round" data-toggle="modal" data-target="#create_modalBox">Create</button> --}}
            </div>
        </div>
        <div class="card-block">
            @if (session('message'))
                 <div class="alert alert-success">
                    {{ session('message') }}
                  </div>
            @endif
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <!-- <th>#</th> -->
                            <th>User</th>
                             <th>Ticket</th>
                            <th>Unit_Price</th>
                            <th>Total_Price</th>
                            <th>QTY</th>
                            <th>Status</th>
                            <th>Action</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                          <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name}}</td>
                            <td>{{ $order->ticket->startcity->name}}</td>
                            <td>{{ $order->unit_price }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->qty }}</td>
                            <!-- <td>{{$order->status == false ? 'confirm':'pending' }}</td> -->
                            <td>
                              <!-- <form action="order/confirm/{{ $order->id }}" method="POST">
                                @csrf
                                 <button type="submit" class="btn btn-success" >
                                  {{ $order->status == true ? 'confirm':'pending' }}
                                </button>
                              </form> -->
                              <a  href="{{ route('order-destroy',$order->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>









      {{-- edit Modal --}}
      <div wire:ignore.self class="modal fade" id="edit_modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="updateCity()" >
              <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" wire:model.lazy="name" class="form-control" id="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>








      {{-- create Modal --}}
      <div wire:ignore.self class="modal fade" id="create_modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="insertCity()" >
              <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" wire:model.lazy="name" class="form-control" id="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>
          </div>
        </div>
      </div>










      <script>
         Livewire.on('done',  (type,msg) =>{
               $('#edit_modalBox').modal('hide');
               $('#create_modalBox').modal('hide');
              type=="success"?toastr.success(msg, 'Success!'):toastr.error(msg, 'Fail!')

          });
        </script>




</div>






@endsection

@section('js')

@endsection
