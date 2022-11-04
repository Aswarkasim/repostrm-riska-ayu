<div class="card">
<div class="card-body">
  {{-- <a href="/admin/matakuliah/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a> --}}

  @if (isset($matakuliah))
      
@include('admin.bajar.create_bajar')

@endif

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" placeholder="Cari..">
        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/matakuliah" class="btn btn-info btn-flat tombol-hapus"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>

  @if($errors->any())
  {!! implode('', $errors->all('<div class="text text-danger">:message</div>')) !!}
@endif


<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Bahan Ajar</th>
      <th>Matakuliah</th>
      <th>Semester</th>
      <th>Prodi</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($bajar as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td>{{$row->name}}</td>
      <td>{{ $row->matakuliah->name }}</td>
      <td>{{ $row->matakuliah->semester }}</td>
      <td>{{$row->matakuliah->prodi}}</td>
      <td>

        <div class="d-flex">

          <a href="/dosen/matakuliah/bajar/download?file={{ $row->file }}" class="btn btn-primary btn-sm mr-2"><i class="fas fa-download"></i> Unduh</a>
          
          {{-- @if (auth()->user()->role == 'admin')
              
          <form action="/dosen/bajar/{{$row->id}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
          </form>
          @endif --}}

          @if (Request::is('admin/bajar*'))
          <form action="/dosen/bajar/{{$row->id}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
          </form>
          @endif

          
        </div>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

  {{-- <div class="float-right">
    {{$bajar->links()}}
  </div> --}}
</div>
</div>
<!-- /.card-body -->


