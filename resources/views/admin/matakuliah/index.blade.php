<div class="card">
<div class="card-body">
  <a href="/admin/matakuliah/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>

  <div class="float-right">
    <form action="" method="get">
    <div class="input-group input-group-sm">
        <input type="text" name="cari" class="form-control" value="{{ request('cari') }}" placeholder="Cari..">

        <select name="semester" class="form-control" id="">
          <option value="">-- Semester --</option>
          @for($i = 1; $i <= 8; $i++)
              <option value="{{ $i }}" {{ $i == request('semester') ? 'selected' : '' }}>{{ $i }}</option>
          @endfor
        </select>


          <select name="prodi" class="form-control" id="">
            <option value="">-- PRODI --</option>
            <option value="PTIK" {{ request('prodi') == 'PTIK' ? 'selected' : '' }}>PTIK</option>
            <option value="TEKOM" {{ request('prodi') == 'TEKOM' ? 'selected' : '' }}>TEKOM</option>
          </select>

        <span class="input-group-append">
          <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
          <a href="/admin/matakuliah" class="btn btn-info btn-flat"><i class="fa fa-sync-alt"></i></a>
        </span>
      </div>
      </form>
  </div>
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama Matakuliah</th>
      {{-- <th>Dosen Pengampuh</th> --}}
      <th>Semester</th>
      <th>Prodi</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($matakuliah as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td>{{$row->kode}}</td>
      <td><a href="/admin/matakuliah/{{ $row->id }}"><b>{{$row->name}}</b></a></td>
      {{-- <td>{{$row->dosen->name}}</td> --}}
      <td>{{$row->semester}}</td>
      <td>{{$row->prodi}}</td>
      <td>
        <div class="btn-group">
          <a href="/admin/bajar/{{ $row->id }}" class="btn btn-primary btn-sm mx-1">Bahan ajar</a>
            <button type="button" class="btn btn-primary"><i class="fa fa-cogs"></i></button>
            <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="true">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu" role="menu" x-placement="bottom-start">
              <a class="dropdown-item" href="/admin/matakuliah/{{$row->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                <div class="dropdown-divider"></div>
                <form action="/admin/matakuliah/{{$row->id}}" method="post">
                  @method('delete')
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i> Hapus</button>
                </form>
            </div>
          </div>
      </td>
    </tr>

    @endforeach

  </tbody>
</table>

  <div class="float-right">
    {{$matakuliah->links()}}
  </div>
</div>
</div>
<!-- /.card-body -->


