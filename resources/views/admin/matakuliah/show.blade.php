<div class="row">
    <div class="col-md-12">
      <div class="p-3  card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <form action="/admin/matakuliah/upload/{{$matakuliah->id}}" enctype="multipart/form-data" method="POST">  
                        @method('PUT')
                      @csrf
                      
                      @if (session()->has('loginError'))      
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('loginError')}}
                               </div>
                      @endif

            
                      <div class="form-group">
                        <label for="">Cover</label>
                        <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror ">
                         @error('cover')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                         @enderror
                      </div>

                      <div class="form-group">
                        <label for="">RPS</label>
                        <input type="file" name="rps" class="form-control @error('rps') is-invalid @enderror ">
                         @error('rps')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                         @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Simpan</button>

                    </form>


                    @if (auth()->user()->role == 'admin')
                        

                    <form action="/admin/matakuliah/pengampuh/add" method="POST">  
                      @csrf
                                  <input type="hidden" name="matakuliah_id" value="{{ $matakuliah->id }}">
                      <div class="form-group">
                        <label for="">Dosen</label>
                        <select name="dosen_id" class="form-control @error('dosen_id') is-invalid @enderror" id="">
                          <option value="">-- Dosen --</option>
                          @foreach ($dosen as $item)
                              @php
                                  $pengampuh = \App\Models\Pengampuh::whereMatakuliahId($matakuliah->id)->whereDosenId($item->id)->first();
                              @endphp
                                  @if ($pengampuh == null)
                                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @endif
                          @endforeach
                        </select>
                         @error('dosen_id')
                            <div class="invalid-feedback">
                              {{$message}}
                            </div>
                         @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Tambah</button>

                    </form>
<br>
                    <table class="table">
                      <tr>
                        <td>Nama</td>
                        <td>Action</td>
                      </tr>
                      @foreach ($pmk as $p)                          
                      <tr>
                        <td>{{ $p->dosen->name }}</td>
                        <td><a href="/admin/matakuliah/pengampuh/delete/{{ $p->id }}"><i class="fas fa-times"></i></a></td>
                      </tr>
                      @endforeach

                    </table>

                    @endif

                    
                </div>

                <div class="col-md-6">
                    @if ($matakuliah->cover != null)
                    <img src="/{{ $matakuliah->cover }}" alt="">
                    @else
                    <p class="alert alert-info"><i class="fas fa-info"></i> Belum ada Cover</p>
                    @endif
                    
                    <br>

                    @if ($matakuliah->rps != null)
                    <a href="/admin/matakuliah/download?file={{ $matakuliah->rps }}"><b><i class="fas fa-"></i>Download RPS</b></a>
                    @else
                    <p class="alert alert-info"><i class="fas fa-info"></i> Belum ada RPS</p>
                    @endif
                </div>
            </div>
        </div>
      </div>
    </div>
</div>