@extends('layouts.app')
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          @include('_all_errors')
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Create New Client Link</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form autocomplete="off" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control"  placeholder="Client Name" name="client_name">
                  </div>
                  <span style="color:red"><strong>{{ $errors->first('client_name') }}</strong></span>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control"  placeholder="Client Email" name="client_email">
                  </div>
                  <span style="color:red"><strong>{{ $errors->first('client_email') }}</strong></span>


                  
                  <div class="input-group mb-3">

                  <div class="input-group-prepend">
                  <button type="button" class="btn btn-danger">{{url('/')}}/client/</button>
                  </div>

                  <input type="text" class="form-control" value="{{$code}}" readonly name="client_link">
                   
                    </div>
                  
                 
                </div>
                <span style="color:red"><strong>{{ $errors->first('link') }}</strong></span>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create link</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection