@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Surat Masuk</li>
        </ol>
        <a href="{{route('suratm.create')}}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Create</a>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Jenis Surat</th>
                            <th>Pengirim</th>
                            <th>Disposisi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratm as $s)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$s->no}}</td>
                            <td>{{$s->tgl_surat}}</td>
                            <td>{{$s->jenis_surat->name}}</td>
                            <td>{{$s->pengirim}}</td>
                            <td>{{$s->status}}</td>
                            <td>
                                <form action="{{route('suratm.destroy', $s->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div class="d-flex align-items-center">
                                        <a type="button" class="btn btn-success" href="{{route('suratm.show', $s->id)}}" style="margin-right: 4px;"><i class="fa-solid fa-folder-open"></i></a>
                                        <button style="margin-right: 4px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="showModal('{{$s->no}}', '{{$s->id}}')">
                                            <i class="fa-solid fa-file-pen"></i>
                                        </button>
                                        <a type="button" class="btn btn-warning" href="{{route('suratm.edit', $s->id)}}" style="margin-right: 4px;"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('suratm.disposisi', 1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header" >
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Disposisi surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="deskripsi" id="no" class="form-label"></label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Keterangan disposisi" required></textarea>
                        <input type="hidden" id="id" name="id" value="">
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</main>
<script>
    function showModal(no ,id) {
        document.getElementById('no').innerText = 'No. Surat : ' + no;
        document.getElementById('id').value = id;
    }
</script>
{{-- <script>
    function showPopup(popupId, no, perihal, tanggal, jenis, desc, pengirim, ditujukan, berkas, status) {
        // Mendapatkan elemen popup
        var popup = document.getElementById(popupId);

        // Menetapkan nilai ke dalam elemen popup
        document.getElementById('no').innerText = no;
        document.getElementById('perihal').innerText = perihal;
        document.getElementById('tanggal').innerText = tanggal;
        document.getElementById('jenis').innerText = jenis;
        document.getElementById('desc').innerText = desc;
        document.getElementById('pengirim').innerText = pengirim;
        document.getElementById('ditujukan').innerText = ditujukan;
        document.getElementById('berkas').innerText = berkas;
        document.getElementById('status').innerText = status;
    }
</script> --}}
@endsection
