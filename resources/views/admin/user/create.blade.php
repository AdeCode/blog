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
          <h1>Text Editors</h1>
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
            <h2 class="card-title">Create Admin</h2>
          </div>
          @include('includes.messages')
          <!-- form start -->
          <form action="{{route('user.store')}}" method="POST">
            @csrf
            <div class="card-body">
              <div class="row justify-content-center">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name" placeholder="Enter User Name">
                  </div>
                  <div class="form-group">
                    <label for="slug">Email</label>
                    <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="email">
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="phone number">
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" value="{{old('password')}}" name="password" placeholder="password">
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="status" value="1"
                          @if (old('status') == 1)
                            checked
                          @endif
                        >Status
                      </label>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="password">Assign Role</label>

                    <div class="row">
                      @foreach ($roles as $role)
                      <div class="col-md-4">
                        <div class="checkbox">
                          <label class="mr-2">
                            <input type="checkbox" value="{{$role->id}}" name="role[]">{{$role->name}}
                          </label>
                        </div>
                      </div>
                      @endforeach
                      
                    </div>                                       
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a type="button" href="{{route('user.index')}}" class="btn btn-warning">Back</a>
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