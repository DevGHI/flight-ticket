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
                        <h4>City Table</h4>
                        {{-- <span>Advanced initialisation of DataTables</span> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- DOM/Jquery table start -->
            @livewire('admin.city-component')

        </div>
        <!-- Page-body start -->
    </div>
</div>

















@endsection

@section('js')

@endsection
