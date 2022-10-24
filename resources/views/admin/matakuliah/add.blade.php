<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/matakuliah/create'))
          <form action="/admin/matakuliah" method="POST">  
        @else
          <form action="/admin/matakuliah/{{$matakuliah->id}}" method="POST">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Kode Matakuliah</label>
            <input type="text" class="form-control  @error('kode') is-invalid @enderror"  name="kode"  value="{{isset($matakuliah) ? $matakuliah->kode : old('kode')}}" placeholder="Kode Matakuliah">
             @error('kode')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          <div class="form-group">
            <label for="">Nama Matakuliah</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($matakuliah) ? $matakuliah->name : old('name')}}" placeholder="Nama Matakuliah">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>


          

          {{-- <div class="form-group">
            <label for="">Dosen</label>
            <select name="dosen_id" class="form-control @error('dosen_id') is-invalid @enderror" id="">
              <option value="">-- Dosen --</option>
              @foreach ($dosen as $item)
                
                  <option value="{{ $item->id }}" {{ isset($matakuliah) ? $matakuliah->dosen_id == $item->id ? 'selected' : ''  : '' }}>{{ $item->name }}</option>
              @endforeach
            </select>
             @error('dosen_id')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div> --}}

          <div class="form-group">
            <label for="">Semester</label>
            <select name="semester" class="form-control @error('semester') is-invalid @enderror" id="">
              <option value="">-- Semester --</option>
              @for($i = 1; $i <= 8; $i++)
                  <option value="{{ $i }}" {{ isset($matakuliah) ? $matakuliah->semester == $i ? 'selected' : '' : '' }}>{{ $i }}</option>
              @endfor
            </select>
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
              if(isset($matakuliah)) {
                if($matakuliah->prodi == 'PTIK') {
                  echo 'selected';
                  }
              }else{
                if(old('prodi') == 'PTIK') {
                  echo 'selected';
                }
              } ?> >PTIK</option>
              <option value="TEKOM"
              <?php 
              if(isset($matakuliah)) {
                if($matakuliah->prodi == 'TEKOM') {
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





          <a href="/admin/matakuliah" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

