<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus"></i> Tambah Bahan Ajar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan Ajar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/admin/bajar" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="modal-body">

          <input type="hidden" value="{{ $matakuliah->id }}" name="matakuliah_id">
          <input type="hidden" value="{{ $matakuliah->dosen_id }}" name="dosen_id">

          <div class="form-group">
            <label for="">Nama Bahan Ajar</label>
            <input type="text" class="form-control" required name="name" placeholder="Nama Bahan Ajar">
          </div>

          <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" class="form-control" required name="desc" placeholder="Deskripsi">
          </div>



          <div class="form-group">
            <label for="">File Bahan Ajar</label>
            <input type="file" name="file" class="form-control">
            <p>*Hanya menerima format pdf</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
    </div>
  </div>
</div>