@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Daftar Kartu Keluarga</div>
                <div class="card-body">
                    <table class="table table-responsive-sm table-bordered">
                        <thead>
                        <tr>
                            <th>Nomor KK</th>
                            <th>Nagari</th>
                            <th>Jorong</th>
                            <th>Total Anggota</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($keluarga as $kartu)
                                <tr>
                                    <td>{{ $kartu->no }}</td>
                                    <td>{{ $kartu->jorong->nagari->nama }}</td>
                                    <td>{{ $kartu->jorong->nama }}</td>
                                    <td>{{ $kartu->penduduks_count }}</td>
                                    <td>{{ $kartu->tanggal_pencatatan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('keluarga.show', [$kartu->id]) }}" class="btn btn-sm btn-info" type="button">
                                                <i class="fas fa fa-info"></i></a>

                                            <a href="{{ route('keluarga.destroy', [$kartu->id]) }}" class="btn btn-sm btn-danger" type="button">
                                                <i class="fas fa fa-trash-alt"></i></a>

                                            <a href="{{ route('keluarga.edit', [$kartu->id]) }}" class="btn btn-sm btn-success" type="button">
                                                <i class="fas fa fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $keluarga->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
