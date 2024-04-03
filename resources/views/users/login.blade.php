@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            {{-- <h1>Looking for a job?</h1> --}}
            {{-- <h3>Please create an account</h3> --}}
            <img src="" width="580" class="img-fluid">
        </div>

        <div class="col-md-6 mt-5 mb-5">
            <div class="card" id="card" style="margin-top:50px;">
                <div class="card-header">Login</div>
                <form action="#" method="post" id="registrationForm">
                    <div class="card-body">

                        <form>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                          </form>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection