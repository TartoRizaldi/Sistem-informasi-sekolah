@extends('layouts.master')

@section('content')
<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Inputs</h3>
				</div>
				<div class="panel-body">
					 <form action="/siswa/{{$siswa->id}}/update" 	method="POST" enctype="multipart/form-data">
			      	{{csrf_field()}}
				 <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
				    <input name="nama_depan" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
				    <input name="nama_belakang" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
				  </div>

				  <div class="form-group">
				  <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
				  <select name="jenis_kelamin" select class="form-control" id="exampleFormControlSelect1" ">
				  <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
				  <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
				  </select>
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Agama</label>
				    <input name="agama" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
				  </div>

				  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Alamat</label>
				  <textarea name="alamat" textarea class="form-control" placeholder="Ketikan alamat anda" id="exampleFormControlTextarea1" rows="3">
				  {{$siswa->alamat}}
				  </textarea>
				  </div>

				  <div class="form-group">
					<label for="exampleFormControlSelect1">Pengajar</label>
                    <select name="kelas_id" select class="form-control" id="exampleFormControlSelect1">
                        @foreach($kelas as $g)
                        <option value="{{$g->id}}">{{$g->kelas}}</option>
                        @endforeach
				  </select>
				  </div>

				  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Avatar</label>
				  <input type="file" name="avatar" class="form-control">
				  
				  </div>
				  <button type="submit" class="btn btn-warning">UPDATE DATA</button>
			        </form>
				</div>
			</div>
					</div>
				</div>
			</div>
		</div>
</div>

@stop
@section('content1')

		<h1>Edit data siswa</h1>
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
		 	{{session('sukses')}}
		</div>
		@endif
		<div class="row">
			<div class="col-lg-12"> 
		 <form action="/siswa/{{$siswa->id}}/update" 	method="POST">
			      	{{csrf_field()}}
				 <form>
				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
				    <input name="nama_depan" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
				    <input name="nama_belakang" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
				  </div>

				  <div class="form-group">
				  <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
				  <select name="jenis_kelamin" select class="form-control" id="exampleFormControlSelect1" ">
				  <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
				  <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
				  </select>
				  </div>

				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Agama</label>
				    <input name="agama" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
				  </div>

				  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Alamat</label>
				  <textarea name="alamat" textarea class="form-control" placeholder="Ketikan alamat anda" id="exampleFormControlTextarea1" rows="3">
				  {{$siswa->alamat}}
				  </textarea>
				  </div>
				  <button type="submit" class="btn btn-warning">UPDATE DATA</button>
			        </form>
			    </div>
	</div>
@endsection
