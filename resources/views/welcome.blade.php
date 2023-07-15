<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background: gray; color:#f1f7fa; font-weight:bold;">
                    Document Upload System
                @if($errors->any())
                    <p style="font-color:red">{!! implode('', $errors->all('<div>:message</div>')) !!}</p>
                @endif
                 <div class="card-body">                    
                    <form class="w-px-500 p-3 p-md-3" action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Did you upload thw Nov bank statements?</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" name="image" @error('image') is-invalid @enderror id="selectImage">
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <img id="preview" src="#" alt="your image" class="mt-3" style="display:none;" width="200px" height="200px"/>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">When did you start self employment?</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="self_employment_start"  @error('self_employment_start') is-invalid @enderror></textarea>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Is there anything yiu want to tell us ?</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" name="tell_anything"  @error('tell_anything') is-invalid @enderror></textarea>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-success btn-block">Submit</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
