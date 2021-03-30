@extends('admin.layout.app')

@section('summer-head')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection
@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add Tag</h1>
        </div>
        
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-info">
          <div class="card-header">
            <h2 class="card-title">Tag</h2>
          </div>
         @include('includes.messages')
          <!-- form start -->
          <form action="{{route('tag.store')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Tag Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Post Tag">
                  </div>
                  <div class="form-group">
                    <label for="slug">Tag Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
                  </div>
                </div>
              </div>           
            </div>         
          </form>
        </div>
      </div>
     
    </div>   
    <!-- ./row -->
  </section>
  <!-- /.content -->
</div>

@endsection
@section('summerfoot')
<script>
  $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
@endsection