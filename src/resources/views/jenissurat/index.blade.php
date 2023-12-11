@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Data</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Jenis Surat</li>
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
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jenis as $j)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$j->name}}</td>
                            <td>
                                <form action="{{route('jenis.destroy', $j->id)}}" method="POST" onsubmit="return confirm('Anda yakin menghapus ini?');">
                                    <div class="d-flex align-items-center">
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
                <form action="{{route('jenis.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header" >
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create jenis surat</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label"></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama jenis surat" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</main>
@endsection
