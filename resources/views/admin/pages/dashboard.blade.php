@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{url('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{url('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        
            @include('_all_errors')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Clients</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                       <td colspan='5'></td>
                       <td colspan='2'><a href="{{url('/admin/new-link')}}"  class="btn btn-block btn-success btn-xs">Create New Link</a></td>

                    </tr>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Latest Request</th>
                    <th>Latest Submission</th>
                    <th>Date Created</th>
                    <th>Link</th>


                  </tr>
                  </thead>
                  <tbody>
                  <?php $i= 1; ?>
                  @foreach($clients as $client)
                  <tr>
                      <td>{{$i}}</td>
                      <td><a href='{{url("admin/document-request/$client->id")}}'>{{$client->name}}</a></td>
                      <td>{{$client->email}}</td>

                      <td>
                         @if($client::latestRequest($client->id))
                         {{date('d-m-Y H:i a', strtotime($client::latestRequest($client->id)))}}
                        @else
                         --
                         @endif
                      </td>
                      <td>
                      @if($client::latestSubmission($client->id))
                         {{date('d-m-Y H:i a', strtotime($client::latestSubmission($client->id)))}}
                        @else
                         --
                         @endif
                      </td>
                      <td>{{$client->created_at}}</td>
                      <td>
                        <select class="change_link" id="{{$client->permalink->permalink}}">
                            <option value=''>--</option>
                            <option value='1'>Copy Link</option>
                            <option value='0'>Delete</option>

                        </select>
                        <!-- <div class='row'>
                        <div class="col-md-6">
                           <button type="button" class="btn btn-block btn-success btn-xs copy" attr-link="{{$client->permalink->permalink}}">Copy Link</button>
                        </div>
                        <div class="col-md-6">
                          <button type="button" class="btn btn-block btn-danger btn-xs">Delete</button>
                        </div>
                        </div> -->

                      </td>


                    </tr>
                    <?php $i++; ?>
                    @endforeach
                    
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    
@endsection
@section('scripts')
<script src="{{url('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('public/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{url('public/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{url('public/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('public/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>




<script>
  $(function () {
    var base_url = "{{url('')}}";
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


    function copyToClipboard(text) {

    var textArea = document.createElement( "textarea" );
    textArea.value = text;
    document.body.appendChild( textArea );       
    textArea.select();

    try {
      var successful = document.execCommand( 'copy' );
      var msg = successful ? 'successful' : 'unsuccessful';
      console.log('Copying text command was ' + msg);
    } catch (err) {
      console.log('Oops, unable to copy',err);
    }    
    document.body.removeChild( textArea );
    }




     



    $('.change_link').change(function(){
      var link  = $(this).attr("id");
      var type = $(this).val();

      if(type == 1){
        copyToClipboard(base_url+"/client/"+link);
        $(document).Toasts('create', {
          class: 'bg-success',
          title: 'Done',
          autohide: true,
          delay: 1000,
          body: 'Link copied to clipboard'
         });
        return;
      }
      else{

      }
    });
  });
</script>
@endsection