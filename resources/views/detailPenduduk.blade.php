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
                                    <label for="" class="col-form-label">{{ $penduduks->nik }}</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Tanggal Pencatatan</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $penduduks->tanggal_pencatatan }}</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Nagari</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $penduduks->nama_nagari }}</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">Jorong</label>
                                </div>

                                <div class="col-md-3">
                                    <label for="" class="col-form-label">{{ $penduduks->nama_jorong }}</label>
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
                                        <tr>
                                            <td>{{ $penduduks->nik }}</td>
                                            <td>{{ $penduduks->nama }}</td>
                                            <td>{{ $penduduks->tempat_lahir }}</td>
                                            <td>{{ $penduduks->tanggal_lahir }}</td>
                                            <td>{{ $penduduks->status_keluarga }}</td>
                                            <td>{{ $penduduks->status_pernikahan }}</td>
                                            <td>
                                            <a href="/keluarga/{{$penduduks->id}}/edit" class = "btn btn-warning btn-sm">Edit</a>
                                            <a href="/keluarga/{{$penduduks->id}}/delete" class = "btn btn-danger btn-sm" onclick = "return confirm('Yakin Mau Menghapus data ?')" >Delete</a>
                                            </td>
                                        </tr>
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
