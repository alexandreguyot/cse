@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    Edition de la catégorie {{ $category->title }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('category.edit', [$category])
        </div>
    </div>
</div>
@endsection
