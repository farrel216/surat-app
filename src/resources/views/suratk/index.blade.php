@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Surat Keluar</li>
        </ol>
        <a href="{{route('suratk.create')}}" class="btn btn-primary mb-2"><i class="fa-solid fa-plus"></i> Create</a>
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
                            <th>Ditujukan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suratk as $s)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$s->no}}</td>
                            <td>{{$s->tgl_surat}}</td>
                            <td>{{$s->jenis_surat->name}}</td>
                            <td>{{$s->pengirim}}</td>
                            <td>{{$s->ditujukan}}</td>
                            <td>
                                <form action="{{route('suratk.destroy', $s->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div class="d-flex align-items-center">
                                        <a type="button" class="btn btn-success" href="{{route('suratk.show', $s->id)}}" style="margin-right: 4px;"><i class="fa-solid fa-folder-open"></i></a>
                                        <a type="button" class="btn btn-warning" href="{{route('suratk.edit', $s->id)}}" style="margin-right: 8px;"><i class="fa-solid fa-pen-to-square"></i></a>
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
    </div>
</main>
@endsection
