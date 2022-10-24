<div class="card">
<div class="card-body">
  <a href="/admin/matakuliah/create" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah</a>

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
<table id="example1" class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Kode</th>
      <th>Nama Matakuliah</th>
      <th>Dosen Pengampuh</th>
      <th>Prodi</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($matakuliah as $row)
        
    <tr>
      <td width="50px">{{$loop->iteration}}</td>
      <td>{{$row->kode}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->dosen->name}}</td>
      <td>{{$row->prodi}}</td>
      <td>
        <a href="/admin/bajar/{{ $row->id }}" class="btn btn-primary btn-sm">Lihat Bahan ajar</a>
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


