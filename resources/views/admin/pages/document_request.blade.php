@extends('layouts.app')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content')
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Document Request For - {{$client->name}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                 <div class="card-body">
                  <div id='add_new_section_box'></div>
                 </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <center>
                      
                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Add New Section</button>
                       <button type="button" class="btn btn-success" id="save_btn">Save</button>
                  </center>
                </div>
              </form>
            </div>
            <!-- /.card -->

            

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-8">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Previous Submission</h3>
              </div>
              <div class="card-body">
                
                @if($questions)
                   <?php $i=1;?>
                   @foreach($questions as $question)
                     @if($question->status == 1)
                     <?php $answer_id = $question->ans->id; ?>
                     @endif
                     {{$i}}.{{$question->question}}? - <b>{{strtoupper($question->question_type)}}</b> - @if($question->status == 1) <span class="badge bg-success">Answered</span> @else <span class="badge bg-danger">Not Answered</span>@endif - <i>{{date('d-m-Y H:i a', strtotime($question->created_at))}}</i>
                     @if($question->status == 1)
                      @if($question->question_type == "file")
                        <br/><a href='{{url("download-file/$answer_id")}}'><img title="Click To Download File" src="{{url('public/assets/img/file.png')}}" width="50px" height="50px"></a>
                      @else
                        <p><b>Client's Response</b> - {{$question->ans->answer}}</p>
                      @endif
                     @endif
                     <hr/><br/>
                    <?php $i++; ?>
                   @endforeach
                @endif  
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Select Question Type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p><button class="select_question" id="file">FILE</button></p>
              <p><button class="select_question" id="question">Question/Answer</button></p>
            </div>
            
          </div>
        </div>
      </div>
      
@endsection
@section('scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var base_url = "{{url('/')}}";
var client_id = {{$client->id}};
$(document).ready(function(){
    $('#save_btn').hide();
    var question_count = 0;

    $('.select_question').click(function(){
      question_count++;
       var type = $(this).attr("id");
       var htm ='';
       if(type == "file"){
          htm = '<div class="form-group"><label>Enter question '+question_count+' - Type FILE</label><input type="text" class="form-control form-control-border input_question"  placeholder="Enter question here" id="question_type_'+question_count+'" attr-type="file"></div>';
       }
       else{
          htm = '<div class="form-group"><label>Enter question '+question_count+' - Type Question/Answer</label><textarea class="form-control form-control-border input_question" id="question_type_'+question_count+'"  placeholder="Enter question here" attr-type="textarea"></textarea></div>';
       }

       $('#add_new_section_box').append(htm);
       if($('#save_btn').is(":hidden")){
        $('#save_btn').show();
       }
       $('#modal-default').modal('hide');
    });

    $('.show_question_1').hide();
    $('#text_box_question_1').show();

    $('.question').focus(function(){
        $(this).val("");
    });
  $('.question').keyup(function(){
    var id = $(this).attr("id");
    var typed = $("#"+id).val();
    $('#readonly_'+id).val(typed);
  });

   $('.type_question').click(function(){
       var question = $(this).attr("id");
       var type = $(this).attr("attr-type");


       $('.show_'+question).hide();

       if(type == "textbox"){
        $('#text_box_'+question).show();
       }
       else if(type == "textarea")
       {
        $('#text_area_'+question).show();
       }else{
        $('#file_'+question).show();
       }
       

   });

   $('#save_btn').click(function(){
       

       $('.input_question').each(function(i, item) {
           var question_type = $(item).attr("attr-type");
           var question = $(item).val();

           $.post(base_url+"/admin/save-document-request", {question_type:question_type,question:question,client_id:client_id},function(data, status){
              // alert("Data: " + data + "\nStatus: " + status);
              if(data == 1){
                $(document).Toasts('create', {
                  class: 'bg-success',
                  title: 'Done',
                  autohide: true,
                  delay: 1000,
                  body: 'Question has been saved'
                });
                window.location.reload();
              }
              else{
                $(document).Toasts('create', {
                  class: 'bg-danger',
                  title: 'Error',
                  autohide: true,
                  delay: 1000,
                  body: 'Something went wrong, reload the page and try again'
                });
              }
           });
     });
   });
});
</script>
@endsection