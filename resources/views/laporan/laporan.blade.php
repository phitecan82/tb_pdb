@extends('layouts.master')

@section('laporan', 'active')

@section('halaman')
<li class="breadcrumb-item active">Laporan</li>
@endsection

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Penduduk Usia Produktif</h3>
				</div>
				<div class="panel-body">
					<table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Agama</th>
                            <th>Tempat Tinggal</th>
                            <th>Pekerjaan</th>
                            <th>Pendidikan</th>
                            <th>Umur</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($penduduk as $index => $item)
                        <tr>
                            <td>{{ $penduduk->firstItem() + $index }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->agama }}</td>
                            <td>{{ $item->nama_jorong }}, 
                                {{ $item->nama_nagari }}</td>
                            <td>{{ $item->nama_pekerjaan }}</td>
                            <td>{{ $item->nama_pendidikan }}</td>
                            <td>
                                {{\Carbon\Carbon::parse($item->tanggal_lahir)->age}} Tahun
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $penduduk->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
            </div> 
      </div>
    </div>
</div>
</div>
        
        
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Penduduk Pada Daerah Tertentu</h3>
				</div>
				<div class="panel-body">
                {!! Form::open(['method' => 'GET', 'url' => '/laporan/laporan/{id}', 'class' => 'form-inline', 'role' => 'select'])  !!}
                    <div class="form-group mx-sm-3 mb-2">
                {!! Form::select('nagari', $getNagari, null, ['class' => 'form-select']) !!}
                </div>
                <button class="btn btn-primary btn-s" type="submit">Submit</button>
                {!! Form::close() !!}
					<table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nagari</th>
                                <th>NIK</th>
                                <th>Agama</th>
                                <th>Nagari</th>
                                <th>Pekerjaan</th>
                                <th>Pendidikan</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pendudukNagari as $index => $item)
                            <tr>
                                <td>{{ $pendudukNagari->firstItem() + $index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{$item->nama_nagari}}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->agama }}</td>
                                <td> {{ $item->nama_nagari }}</td>
                                <td>{{ $item->nama_pekerjaan }}</td>
                                <td>{{ $item->nama_pendidikan }}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($item->tanggal_lahir)->age}} Tahun
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $pendudukNagari->appends(['nagari' => Request::get('nagari')])->render() !!} </div>
                </div>
                </div> 
        </div>
        </div>
        </div>

    <class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Penduduk Dengan Pendidikan SMP Ke Bawah</h3>
				</div>
				<div class="panel-body">
                {!! Form::open(['method' => 'GET', 'url' => '/laporan/laporan', 'class' => 'form-inline', 'role' => 'select'])  !!}
                <div class="form-group mx-sm-3 mb-2"> 
                {!! Form::select('nagariPendidikan', $getNagari, null, ['class' => 'form-select']) !!}
                </div>
                <button class="btn btn-primary btn-s" type="submit">Submit</button>
                {!! Form::close() !!}
                <h3>Jumlah Penduduk : {{count($pendudukNagariPendidikan)}}
                </h3>
        </div>
        <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>NIK</th>
                                <th>Agama</th>
                                <th>Nagari</th>
                                <th>Pekerjaan</th>
                                <th>Pendidikan</th>
                                <th>Umur</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pendudukNagariPendidikan as $index => $item)
                            <tr>
                                <td>{{ $pendudukNagariPendidikan->firstItem() + $index }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->nama_nagari }}</td>
                                <td>{{ $item->nama_pekerjaan }}</td>
                                <td>{{ $item->nama_pendidikan }}</td>
                                <td>
                                    {{\Carbon\Carbon::parse($item->tanggal_lahir)->age}} Tahun
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <div class="pagination-wrapper"> {!! $pendudukNagariPendidikan->appends(['nagariPendidikan' => Request::get('nagariPendidikan')])->render() !!} </div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection