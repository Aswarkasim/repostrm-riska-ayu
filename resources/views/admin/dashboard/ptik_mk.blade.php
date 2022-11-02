@for ($i = 1; $i <= 8; $i++)
    

<div class="accordion border-dash mt-4" id="accordionExample">

    <div class="card-header" id="headingOne">
    <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne{{ $i }}" aria-expanded="true" aria-controls="collapseOne{{ $i }}">
            <h6><b>Matakuliah Semester {{ $i }}</b></h6>
        </button>
    </h2>
    </div>

    <div id="collapseOne{{ $i }}" class="collapse {{ $i == 1 ? 'show' : '' }}" aria-labelledby="headingOne" data-parent="#accordionExample">

        <div class="p-4 mt-3 " style="">
           
            <table class="table">
                <tr>
                    <th>Kode Matakuliah</th>
                    <th>Nama Matakuliah</th>
                    <th>Bahan Ajar</th>
                    <th>CPL</th>
                    <th>RPS</th>
                    <th>Action</th>
                </tr>
                @foreach ($ptik_mk as $item)
                @if ($item->semester == $i)
                    @php
                        $bajar = \App\Models\Bajar::whereMatakuliahId($item->id)->get()->count();
                        $cpl = \App\Models\Cpl::whereMatakuliahId($item->id)->get()->count();
                    @endphp
                <tr>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{!! $bajar >= 1 ? '<small class="p-2 bade bg-success"><i class="fas fa-check"></i> Ada</small>' : '<small class="p-2 bade bg-danger"><i class="fas fa-times"></i> Belum Ada</small>' !!}</td>
                    <td>{!! $cpl >= 1 ? '<small class="p-2 bade bg-success"><i class="fas fa-check"></i> Ada</small>' : '<small class="p-2 bade bg-danger"><i class="fas fa-times"></i> Belum Ada</small>' !!}</td>
                    <td>{!! $item->rps != null ? '<small class="p-2 bade bg-success"><i class="fas fa-check"></i> Ada</small>' : '<small class="p-2 bade bg-danger"><i class="fas fa-times"></i> Belum Ada</small>' !!}</td>
                    <td>@include('admin.dashboard.detail_mk')</td>
                </tr>
                @endif

                

                @endforeach
            </table>
        </div>

    </div>

</div>

@endfor




