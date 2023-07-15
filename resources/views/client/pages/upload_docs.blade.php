<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/assets/css/adminlte.min.css')}}">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Document Request {{$client->name}} - <i><b>{{date('d-m-Y')}}</b></i></h3>
              </div>
              @include("_all_errors")
              @if(count($questions))
              <form method="post" enctype="multipart/form-data" id="form_submit">
                @csrf
                <div class="card-body">
                  <?php $i=0; ?>
                  @foreach($questions as $quest)
                  <div class="form-group">
                     <label>{{$quest->question}}?</label>
                     @if($quest->question_type == "file")
                      <div class="custom-file">
                        <input type="file" class="custom-file-input question_{{$i}}" name="question_{{$quest->id}}" required id="selectImage">
                        <label class="custom-file-label" for="customFile" >Choose file</label>
                        </div>
                        <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;" width="200px" height="200px"/>
      
                        <a href='javascript:void(0)' id="delete" style="display:none;" class="btn btn-danger">Delete</a>
                     @else
                     
                     <textarea class="form-control question_{{$i}}" placeholder="Enter your comments" required name="question_{{$quest->id}}"></textarea>
                     @endif
                  </div>
                  <?php $i++; ?>
                  @endforeach
                 
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="add_answer">Submit</button>
                </div>
              </form>
              @else
              <center><p>No new question from admin</p></center>
              @endif
            </div>
            
          </div>

          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Previous Submission</h3>
              </div>
              @if(count($answers))
              @foreach($answers as $answer)
              <div class="card-body">
                <span>{{$answer->question->question}}?- <b>Created On - {{date('d-m-Y', strtotime($answer->question->created_at))}}</b></span>
                <p><b>Answer Submitted on - {{date('d-m-Y', strtotime($answer->created_at))}}</b></p>
                @if($answer->question->question_type == "file")<p>
                    <a href='{{url("download-file/$answer->id")}}'><img src="{{url('public/assets/img/file.png')}}" width="50px" height="50px"></a>
                </p>@endif
                @if($answer->question->question_type != "file") <p>{{$answer->answer}}</p> @endif
                
             </div>
             <hr/>
             @endforeach
             @endif
            
             
              
            </div>
            

            
          </div>
          
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
<script src="{{url('public/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('public/assets/js/adminlte.min.js')}}"></script>
<script>
var base_url = "{{url('/')}}";

var total_questions = {{$questions->count()}};
$(document).ready(function(){
   
     
 
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            $('#delete').show();
            $('#download').show();

            const [file] = selectImage.files
            
            if (file) {
                if(file.type == "application/pdf"){
                  preview.src = base_url+"/public/assets/img/pdf.png";
                }
                else{
                   if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png" || file.type == "image/gif"){
                    preview.src = URL.createObjectURL(file)
                   }
                   else{
                    preview.src="";
                    preview.style.display = 'none';
                    $('#selectImage').val("");
                    $('#delete').hide();
                    $('#download').hide();
                    alert("File not supported");
                   }
                  
                }
                
            }
        }

        $('#delete').click(function(){
          
          preview = document.getElementById('preview');
          preview.src="";
          preview.style.display = 'none';
          $('#selectImage').val("");
          $('#delete').hide();
          $('#download').hide();
          e.preventDefault();
        });


        $('#download').click(function(){
          
          e.preventDefault();  //stop the browser from following
          window.location.href = document.getElementById('preview').src;
        });


        $('#add_answer').click(function(){
            for(var i=0;i<total_questions;i++){
               var check_input = $('.question_'+i).val();

               if(check_input == "" || check_input == null){
                   alert("Insert answer for question "+i);
                   return;
               }
            }

            $('#form_submit').submit();
        });
    
});
</script>
