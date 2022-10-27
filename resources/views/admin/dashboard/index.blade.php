  <h6>selamat Datang {{ auth()->user()->name }}</h6>
  <div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <label for="">PTIK</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $percent_ptik }}%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">{{ $percent_ptik }}%</div>
              </div>
              <br><br>
              <label for="">TEKOM</label>
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $percent_tekom }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $percent_tekom }}%</div>
              </div>
              <br>
              {{-- <h6>Jumlah Ketuntasan : 10%</h6> --}}
        </div>
    </div>
  </div>

  <h6 class="text-center">Matakuliah</h6>

 <div class="row">
    <div class="col-md-12">
        <div class="card p-4">
            <nav class="nav nav-pills nav-justified">
               {{-- <a class="nav-link" id="umum-tab" data-toggle="tab" data-target="#umum" type="button" role="tab" aria-controls="umum" aria-selected="true">UMUM</a> --}}
               <a class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">PTIK</a>
               <a class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">TEKOM</a>
            </nav>
              <div class="tab-content" id="myTabContent">
                {{-- <div class="tab-pane fade" id="umum" role="tabpanel" aria-labelledby="home-tab">UMUM</div> --}}
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  @include('admin.dashboard.ptik_mk')                 
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  @include('admin.dashboard.tekom_mk')                 
                </div>
              </div>
        </div>
    </div>
 </div>