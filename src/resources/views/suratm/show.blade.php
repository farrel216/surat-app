@extends('layouts.main')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="my-4">Detail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('suratm.index')}}">Surat Masuk</a></li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <div class="mt-5">
                            <div class="card mb-2">
                                <div class="card-body text-center">
                                    <i class="fa-solid fa-file text-primary fa-6x"></i>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <a href="{{ route('suratm.download', $suratm->berkas) }}">{{$suratm->berkas}} <i class="fa-solid fa-print"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <table class="table table-borderless">
                            <tr>
                                <td class="text-end col-md-4 fw-bold fs-5"># Detail Surat Masuk</td>
                                <td class="fs-5 col-md-8 fw-bold">{{$suratm->no}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Tanggal surat</td>
                                <td><i class="fa-solid fa-calendar-days text-warning"></i> {{$suratm->tgl_surat}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Jenis surat</td>
                                <td>{{$suratm->jenis_surat->name}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Perihal</td>
                                <td>{{$suratm->perihal}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Pengirim</td>
                                <td>{{$suratm->pengirim}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Ditujukan</td>
                                <td>{{$suratm->ditujukan}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Disposisi</td>
                                <td>{{$suratm->status}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Deskripsi</td>
                                <td>{{$suratm->deskripsi}}</td>
                            </tr>
                            <tr>
                                <td class="text-end text-secondary">Created by</td>
                                <td>{{$suratm->user->name}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
