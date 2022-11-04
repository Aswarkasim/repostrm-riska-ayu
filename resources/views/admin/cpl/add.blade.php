<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('dosen/matakuliah/cpl/create'))
          <form action="/dosen/matakuliah/cpl" method="POST">  
        @else
          <form action="/dosen/matakuliah/cpl/{{$cpl->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf


          <input type="hidden" value="{{ isset($cpl) ? $cpl->matakuliah_id : $matakuliah_id }}" name="matakuliah_id">

          <div class="form-group">
            <label for="">CPL</label>
            <textarea type="text" class="form-control  @error('cpl') is-invalid @enderror" id="summernote-cpl"  name="cpl"  value="">{{isset($cpl) ? $cpl->cpl : old('cpl')}}</textarea>
             @error('cpl')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          <div class="form-group">
            <label for="">CPMK</label>
            <textarea type="text" class="form-control  @error('cpmk') is-invalid @enderror" id="summernote-cpmk"  name="cpmk"  value="">{{isset($cpl) ? $cpl->cpmk : old('cpmk')}}</textarea>
             @error('cpmk')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


        
          <a href="/dosen/matakuliah/cpl" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>


<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote-cpl').summernote()
    $('#summernote-cpmk').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>

