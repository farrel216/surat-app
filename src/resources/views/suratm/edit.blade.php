@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Edit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('suratm.index')}}">Surat Masuk</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <form class="row g-3" action="{{route('suratm.update', $suratm->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6 row mt-3">
                            <div class="col-md-6">
                                <label for="no" class="form-label">No Surat</label>
                                <input value="{{$suratm->no}}" type="text" class="form-control" id="no" name="no" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis" class="form-label">Jenis Surat</label>
                                <select class="form-select" aria-label="jenis" name="jenis" id="jenis">
                                    <option selected disabled>- Choose jenis -</option>
                                    @foreach ($jenissurat as $j)
                                        <option value="{{$j->id}}" {{ $suratm->jenis_id == $j->id ? 'selected' : '' }}>{{$j->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="pengirim" class="form-label">Pengirim</label>
                                <input value="{{$suratm->pengirim}}" type="text" class="form-control" id="pengirim" name="pengirim" required>
                            </div>
                            <div class="col-12">
                                <label for="ditujukan" class="form-label">Ditujukan</label>
                                <input value="{{$suratm->ditujukan}}" type="text" class="form-control" id="ditujukan" name="ditujukan" required>
                            </div>
                            <div class="col-12">
                                <label for="perihal" class="form-label">Perihal</label>
                                <input value="{{$suratm->perihal}}" type="text" class="form-control" id="perihal" name="perihal" required>
                            </div>
                            <div class="col-12">
                                <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                                <input value="{{$suratm->tgl_surat}}" type="date" class="form-control" id="tgl_surat" name="tgl_surat" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-12">
                                <label for="status" class="form-label">Status Disposisi</label>
                                <select class="form-select" aria-label="status" name="status" id="status">
                                    <option selected disabled>- Choose Status -</option>
                                    @if ($suratm->status == 'Belum disposisi')
                                        <option selected> Belum disposisi </option>
                                        <option> Sudah disposisi </option>
                                    @else
                                        <option> Belum disposisi </option>
                                        <option selected> Sudah disposisi </option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi">{{$suratm->deskripsi}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="file" class="form-label">File upload</label>
                                <input class="form-control" type="file" name="file" id="file">
                            </div>
                                <input type="text" value="{{Auth::user()->id}}" name="user" style="display: none;" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('suratm.index')}}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
