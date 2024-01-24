@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Dashbaord
                </h6>
            </div>
        </div>
        @livewire('dashboard.index')

    </div>
</div>
@endsection
