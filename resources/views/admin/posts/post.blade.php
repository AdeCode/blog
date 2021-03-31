@extends('admin.layout.app')

@section('summer-head')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" />
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
@endsection
@section('formSelect')
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection
@section('main-content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Creator</h1>
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
            <h2 class="card-title justify-content-center">Create Post</h2>
          </div>
          @include('includes.messages')
          <!-- form start -->
          <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post title">
                  </div>
                  <div class="form-group">
                    <label for="subtitle">Post Sub Title</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Post subtitle">
                  </div>
                  <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-9">
                      <div class="form-group">
                        <label for="image">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image" name="image">Choose file</label>
                          </div>
                          <div class="input-group-append justify-content-right">
                            <span class="input-group-text">Upload</span>
                          </div>       
                        </div>                                                
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="d-flex justify-content-end">
                        <div class="form-check" style="margin-top: 27px;">
                          <input type="checkbox" class="form-check-input" value="1" id="status" name="status">                          
                          <label class="form-check-label" for="status">Publish</label>
                        </div>
                      </div>
                    </div>
                  </div>                                                   
                  <div class="form-group">
                    <label >Select Tags</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="tags[]">
                      @foreach ($tags as $tag )
                        <option value="{{$tag->id}}">{{$tag->name}}</option>                     
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label >Select Categories</label>
                    <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" name="categories[]">
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach                      
                    </select>
                  </div>
                 </div>                
                </div>  
                </div> 
            
            </div>
            <!-- /.card-body -->
            <div class="row">
              <div class="col-md-12">
                <div class="card card-outline card-info">
                  <div class="card-header">
                    <h2 class="card-title">
                      Post Body
                    </h2>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <textarea id="summernote" name="body" style="height: 400px;">
                      Place <em>some</em> <u>text</u> <strong>here</strong>
                    </textarea>
                  </div>
                  
                </div>
              </div>
            </div>
            
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    })
</script>
@endsection