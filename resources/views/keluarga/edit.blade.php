@extends('layouts.master')


@section('content')
            <div class="card-header">
                <h4 class="card-title">
                
                    Edit Kartu Keluarga
            
                </h4>
                <a href="/" style="color: red;">back</a>
            </div>

            <div class="card-body p-3">
            <form action="/update" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id" value="{{$kk->id}}">
                    <div class="form-group">
                        <label for="no">No KK</label>
                        <input type="text"  class="form-control" id="no" name="no" placeholder="No" value="{{$post->no}}">
                        <span class="text-danger" id="noError"></span>
                    </div>

                    </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jorong</label>
                        <select name ="jorong_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach($jorong as $k)
                        <option value = "{{$k->id}}">{{$k->nama_jorong}}</option>
                        @endforeach
                        </select>
                        </div>

                    <div class="form-group" >
                        <div class="form-group col-md-12">
                            <label for="tanggal_pencatatan">tanggal_pencatatan</label>
                            <input type="date"  class="form-control" id="tanggal_pencatatan" name="tanggal_pencatatan" placeholder="tanggal pencatatan" value="{{$post->tanggal_pencatatan}}">
                            <span class="text-danger" id="tanggal_pencatatanError"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                    </div>

                </form>
            </div>
@endsection
