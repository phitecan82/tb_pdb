@extends('layouts.master')
@section('content')


<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Penduduk</h3>
                    <div class="right">
                        <button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModalScrollable"></i></button>
                    </div>
				</div>
                @if (Session::has('success'))
                    <div class="alert alert-success alert-block">
                    {{Session::get('success')}}
                </div>
                @endif  
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
                            <th scope="col">Nomor KK</th>
                            <th scope="col">Kepala Keluarga</th>
                            <th scope="col">Negara</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Aksi</th>
                            </tr>
						</thead>
						<tbody>
                        @foreach($pdd as $pd)
                        <tr>
                            <td> {{$pd -> keluarga_id}}</td>
                            <td> {{$pd -> ayah}}</td>
                            <td> {{$pd -> kewarganegaraan->nama_kewarganegaraan}}</td>
                            <td> {{$pd -> nik}}</td>
                            
                            <td>

                            <a href="/detailPenduduk/{{ $pd->id }}" class="btn btn-primary btn-sm" type="button">Detail</a>
                            <a href="/edit/{{$pd->id}}" class = "btn btn-warning btn-sm">Edit</a>
                            <a href="/penduduk/delete/{{ $pd->id }}" class = "btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
						</tbody>
					</table>
                    {{ $pdd->links() }}
				</div>
			</div>         
                </div>
            </div> 
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">    
            <form  method = "POST" action="">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input name ="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">        
            </div>
            <div class="form-group">
                <label for="no">Keluarga</label>
                <input name ="id" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">        
            </div>

            <div class="form-group">
                <div class="form-group col-md-12">
                    <label for="jorong">Jorong</label>
                        <select class="form-control" id="jorong" name="jorong">
                            <option value="">Pilih jorong</option>
                        </select>
                </div>
            </div>
            
            
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Pencatatan</label>
                <input name ="tanggal_pencatatan" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama">        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
            </div>
        </div>
@stop

