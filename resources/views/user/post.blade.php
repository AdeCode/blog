@extends('user.app')
@section('title',$post->title)
@section('bg-img',asset('user/img/post-bg.jpg'))
@section('sub-heading', $post->subtitle)

@section('main-content')
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <small>Created at {{$post->created_at->diffForHumans()}}</small>
          @foreach ($post->categories as $category)
            <small class="float-right mr-2">
              {{$category->name}}
            </small>
          @endforeach

          {!! htmlspecialchars_decode($post->body) !!}

          {{--  Tag clouds --}}
          <h1>Tag Clouds</h1>
          @foreach ($post->tags as $tag)
            <small class="mr-2" style="border-radius: 5px; border:1px solid gray;
            padding: 5px;">
              {{$tag->name}}
            </small>
          @endforeach
        </div>
      </div>
    </div>
  </article>

  <hr>
@endsection