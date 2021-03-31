@extends('user.app')
@section('title',$post->title)
@section('bg-img',Storage::disk('local')->url($post->image))
@section('sub-heading', $post->subtitle)

@section('main-content')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" 
src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v10.0&appId=293295588826068&autoLogAppEvents=1" 
nonce="gSf6UGp9"></script>
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <small>Created at {{$post->created_at->diffForHumans()}}</small>
          @foreach ($post->categories as $category)
            <a href="{{route('category',$category->slug)}}">
              <small class="float-right mr-2">
                {{$category->name}}
              </small>
            </a>           
          @endforeach

          {!! htmlspecialchars_decode($post->body) !!}

          {{--  Tag clouds --}}
          <h1>Tag Clouds</h1>
          @foreach ($post->tags as $tag)
            <a href="{{route('tag',$tag->slug)}}">
              <small class="mr-2" style="border-radius: 5px; border:1px solid gray;
              padding: 5px;">
                {{$tag->name}}
              </small>
            </a>           
          @endforeach
        </div>
        <div class="fb-comments" data-href="{{Request::url()}}" data-width="" data-numposts="10"></div>
      </div>
    </div>
  </article>

  <hr>
@endsection