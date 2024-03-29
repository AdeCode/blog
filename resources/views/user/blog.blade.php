@extends('user.app')
@section('bg-img',asset('user/img/home-bg.jpg'))
@section('title','TechCrux Blog')
@section('sub-heading', 'Learn Together and Grow Together')

@section('main-content')
<!-- Main Content -->
<div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach ($posts as $post)
        <div class="post-preview">        
          <a href="{{ route('post',$post->slug) }}">
            <h2 class="post-title">
              {{$post->title}}
            </h2>
            <h3 class="post-subtitle">
              {{$post->subtitle}}
            </h3>
          </a>
          <p class="post-meta">Posted by
            <a href="#">Start Bootstrap</a>
            {{$post->created_at->diffForHumans()}}.
            <small>0</small>
            <a href=""><i class="fas fa-thumbs-up"></i></a>
          </p>
        </div>
        <hr>
        @endforeach     
        <!-- Pager -->
       
       <div class="d-flex justify-content-center">
         {!! $posts->links() !!}
        </div> 
      </div>
    </div>
  </div>

  <hr>
@endsection
 