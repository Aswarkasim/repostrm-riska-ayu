<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
    <i class="fas fa-eye"></i>
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Matakuliah</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-5">
          <div class="row">
            <div class="col-md-5">
                <img src="/{{ $item->cover }}" width="100%" alt="">
            </div>
            <div class="col-md-7">
                <h5>{{ $item->kode.' - '. $item->name}}</h5>
                <hr>
                <div>Data Lainnya</div>
                <ul>
                    <li>Prodi : {{ $item->prodi }}</li>
                    <li>Semester : {{ $item->semester  }}</li>
                </ul>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>