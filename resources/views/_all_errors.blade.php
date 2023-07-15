



        
<div class="col-md-12">
<div class="card-body">
  

  @if(Session::has('custom_error'))
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    {{Session::get('custom_error')}}
  </div>
  @endif
  @if(Session::has('info'))
  <div class="alert alert-info alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-info"></i> Info!</h5>
    {{Session::get('info')}}
  </div>
  @endif
 <!--  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
    Warning alert preview. This alert is dismissable.
  </div>-->
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Done!</h5>
    {{Session::get('success')}}
  </div> 
  @endif
</div>

</div>
