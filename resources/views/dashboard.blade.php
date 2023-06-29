@extends('layouts.app')

@section('title','Dashboard')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 300px;">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="float-left mt-2">Contact</span>
                        <a class="nav-link float-right mb-2" href="{{ route('contacts.index') }}">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </h5>
                </div>
            </div>
        </div>        
    </div>

@endsection
