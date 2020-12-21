@extends('layouts.master')

@section('content')


<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel">
	                    <div class="panel-heading">
                            <h3 class="panel-title">Detail Daftar Kartu Keluarga</h3>
                            <br>
                            <br>
                                <div class="card">
                                    <div class="card-header"></div>
                                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Nomor Kartu Keluarga</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $keluarga->no }}</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Tanggal Pencatatan</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $keluarga->tanggal_pencatatan }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Nagari</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $keluarga->jorong->nagari->nama }}</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Jorong</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $keluarga->jorong->nama }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                <div class="col-lg-12">
                    <div class="panel">
	                    <div class="panel-heading">
                        <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                        <br>
                        <br>
                            <table class="table table-responsive-md table-bordered table-stripped">
                                <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Status</th>
                                    <th>Status Pernikahan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>

                                <tbody>
                                    @foreach($penduduks as $penduduk)
                                        <tr>
                                            <td>{{ $penduduk->nik }}</td>
                                            <td>{{ $penduduk->nama }}</td>
                                            <td>{{ $penduduk->tempat_lahir }}</td>
                                            <td>{{ $penduduk->tanggal_lahir }}</td>
                                            <td>{{ $penduduk->status_keluarga }}</td>
                                            <td>{{ $penduduk->status_pernikahan }}</td>
                                            <td>
                                            <a href="/keluarga/{{$penduduk->id}}/edit" class = "btn btn-warning btn-sm">Edit</a>
                                            <a href="/keluarga/{{$penduduk->id}}/delete" class = "btn btn-danger btn-sm" onclick = "return confirm('Yakin Mau Menghapus data ?')" >Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
