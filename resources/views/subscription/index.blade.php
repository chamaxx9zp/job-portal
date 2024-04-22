@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        {{-- @if(Session::has('message'))
            <div class="alert alert-warning">{{Session::get('message')}}</div>
        @endif --}}

        <div class="row">
            <div class="col-md-4 mb-3 mb-sm-0">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title">Weekly - $20</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('pay.weekly')}}" class="btn btn-primary">Pay Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="card-title">Monthly - $80</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('pay.monthly')}}" class="btn btn-primary">Pay Now</a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                  <div class="card-body text-center">
                    <h5 class="card-title">Yearly - $200</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{route('pay.yearly')}}" class="btn btn-primary">Pay Now</a>
                  </div>
                </div>
              </div>
          </div>
    </div>
</div>

@endsection