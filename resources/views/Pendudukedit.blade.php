@extends('layouts.master')


@section('content')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Edit Data Penduduk</h3>
                    <br>
            <div class="card-body p-3">
            @if (Session::has('success'))
                    <div class="alert alert-success alert-block">
                    {{Session::get('success')}}
                </div>
                @endif
            <form action="{{ route('post.update')}}" method="post">
                    @csrf
                    <input id="id" name="id" value="{{$post->id}}" hidden>
                    <div class="form-group">
                        <label for="no">No KK</label>
                        <input type="text"  class="form-control" id="no" name="no" placeholder="No" value="{{$post->no}}">
                        <span class="text-danger" id="noError"></span>
                    </div>

                    </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jorong</label>
                        <select name ="jorong_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach ($jorong as $data)
                        <option value = "{{$data->id}}">{{$data->nama_jorong}}</option>
                        @endforeach
                        </select>
                        </div>

                    <div class="form-group" >
                            <label for="tanggal_pencatatan">tanggal_pencatatan</label>
                            <input type="date"  class="form-control" id="tanggal_pencatatan" name="tanggal_pencatatan" placeholder="tanggal pencatatan" value="{{$post->tanggal_pencatatan}}">
                            <span class="text-danger" id="tanggal_pencatatanError"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                        <a href="/" class="btn btn-warning waves-effect waves-light">back</a>
                    </div>

                </form>
            </div>
@endsection
