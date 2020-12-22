@extends('layouts.master')
@section('content')


<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Kartu Keluarga</h3>
                    <div class="right">
                        <button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModalScrollable"></i></button>
                    </div>
				</div>
                @if (Session::has('post_create'))
                    <div class="alert alert-success alert-block">
                    {{Session::get('post_create')}}
                </div>
                @endif
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
                            <th scope="col">Nomor KK</th>
                            <th scope="col">Nagari</th>
                            <th scope="col">Jorong</th>
                            <th scope="col">Total Anggota</th>
                            <th scope="col">Tanggal Pencatatan</th>
                            <th scope="col">Aksi</th>
                            </tr>
						</thead>
						<tbody>
                        @foreach($keluarga as $kk)
                        <tr>
                            <td> {{$kk -> no}}</td>
                            <td> {{$kk -> jorong->nagari->nama_nagari}}</td>
                            <td> {{$kk -> jorong->nama_jorong}}</td>
                            <td> {{$kk -> penduduks_count}}</td>
                            <td> {{$kk -> tanggal_pencatatan}}</td>
                            <td>

                            <a href="{{ route('keluarga.show', [$kk->id]) }}" class="btn btn-primary btn-sm" type="button">Detail</a>
                            <a href="{{ route('keluarga.edit', [$kk->id]) }}" class = "btn btn-warning btn-sm">Edit</a>
                            <a href="/delete-post/{{$kk->id}}" class = "btn btn-danger btn-sm" onclick = "return confirm('Yakin Mau Menghapus data ?')" >Delete</a>
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
            <form  method = "POST" action="{{route('post.create')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input name ="id" type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">        
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">No KK</label>
                <input name ="no" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">        
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Jorong</label>
            <select name ="jorong_id" class="form-control" id="exampleFormControlSelect1">
            @foreach($jorong as $k)
            <option value = "{{$k->id}}">{{$k->nama_jorong}}</option>
            @endforeach
            </select>
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

