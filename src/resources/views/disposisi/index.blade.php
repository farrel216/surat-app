@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Disposisi Surat</li>
        </ol>
        <button style="margin-right: 4px;" type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-plus"></i> Create
        </button>
        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Jenis Surat</th>
                            <th>Perihal</th>
                            <th>Pengirim</th>
                            <th>Ditujukan</th>
                            <th>Keterangan Disposisi</th>
                            <th>Created by</th>
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
                            <td>{{$s->perihal}}</td>
                            <td>{{$s->pengirim}}</td>
                            <td>{{$s->ditujukan}}</td>
                            <td>{{$s->deskripsi}}</td>
                            <td>{{$s->user->name}}</td>
                            <td>
                                <a type="button" class="btn btn-primary" href="{{route('suratm.download', $s->berkas)}}" style="margin-right: 4px;"><i class="fa-solid fa-print"></i></a>
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
                <form action="{{route('disposisi.store', 1)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header" >
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Disposisi surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <label for="no" class="form-label">No Surat</label>
                            <select class="form-select" aria-label="no" name="id" id="no">
                                <option selected disabled>- Choose Surat -</option>
                                @foreach ($disposisi as $s)
                                    <option value="{{$s->id}}" >{{$s->no}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="deskripsi" id="no" class="form-label"></label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Keterangan disposisi" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</main>
@endsection
