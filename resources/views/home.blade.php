@extends('user.app')
@section('bg-img',asset('user/img/contact-bg.jpg'))
@section('title','Welcome Home')

@section('main-content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <h2>Welcome, {{ Auth::user()->name }}</h2>
        </div>
      </div>
  </div>

  <hr>
@endsection
 












