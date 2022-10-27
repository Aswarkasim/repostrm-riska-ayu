<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/dosen/create'))
          <form action="/admin/dosen" method="POST">  
        @else
          <form action="/admin/dosen/{{$dosen->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($dosen) ? $dosen->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          <div class="form-group">
            <label for="">NIDN</label>
            <input type="text" class="form-control  @error('nidn') is-invalid @enderror"  name="nidn"  value="{{isset($dosen) ? $dosen->nidn : old('nidn')}}" placeholder="NIDN">
             @error('nidn')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Nohp</label>
            <input type="text" class="form-control  @error('nohp') is-invalid @enderror"  name="nohp"  value="{{isset($dosen) ? $dosen->nohp : old('nohp')}}" placeholder="Nohp">
             @error('nohp')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Prodi</label>
            <select name="prodi" class="form-control @error('prodi') is-invalid @enderror" id="">
              <option value="">-- PRODI --</option>
              <option value="PTIK"
              <?php 
              if(isset($dosen)) {
                if($dosen->prodi == 'PTIK') {
                  echo 'selected';
                  }
              }else{
                if(old('prodi') == 'PTIK') {
                  echo 'selected';
                }
              } ?> >PTIK</option>
              <option value="TEKOM"
              <?php 
              if(isset($dosen)) {
                if($dosen->prodi == 'TEKOM') {
                  echo 'selected';
                  }
              }else{
                if(old('prodi') == 'TEKOM') {
                  echo 'selected';
                }
              } ?>
              >TEKOM</option>
            </select>
             @error('prodi')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>





          <a href="/admin/dosen" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

