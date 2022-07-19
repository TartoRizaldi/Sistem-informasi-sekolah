@extends('layouts.master')

@section('content')


	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Siswa </h3>
					<div class="right">
					<a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export Excel</a>
					<a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export PDF</a>
					@if(auth()->user()->role == 'superAdmin')
					<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
					@endif	
				</div>
					
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="datatable">
						<thead>
							<tr>
								<th>Kelas</th>
								<th>NIS</th>
								<th>NAMA DEPAN</th>
								<th>NAMA BELAKANG</th>
								<th>JENIS KELAMIN</th>
								<th>AGAMA</th>
								<th>ALAMAT</th>
								<th>RATA-RATA NILAI</th>
								<th>AKSI</th>
							</tr>
						</thead>
						 <tbody>
						@foreach($data_siswa as $s)
										<tr>
											<td>{{$s->kelas->kelas}}</td>
											<td>{{$s->NIS}}</td>
											<td>{{$s->nama_depan}}</td>
											<td>{{$s->nama_belakang}}</td>
											<td>{{$s->jenis_kelamin}}</td>
											<td>{{$s->agama}}</td>
											<td>{{$s->alamat}}</td>
											<td>{{$s->rataRataNilai()}}</td>
											<td>
												<a href="{{route('siswa.profile', $s->id)}}" class="btn btn-warning">Profile</a>				
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

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-body">
			      <form action="/siswa/create" 	method="POST" enctype="multipart/form-data">
			      	{{csrf_field()}}
				<div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
				    <input name="NIS" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" value="{{old('nama_depan')}}">
				  </div>
				  <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
				    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
				    <input name="nama_depan" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
				    @if($errors->has('nama_depan'))
				    	<span class="help-block">{{$errors->first('nama_depan ')}}</span>
				    @endif
				  </div>
				  <div class="form-group">
				    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
				    <input name="nama_belakang" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang"value="{{old('nama_belakang')}}">
				  </div>

				  <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
				    <label for="exampleInputEmail1" class="form-label">Email</label>
				    <input name="email" input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email"value="{{old('email')}}">
				    @if($errors->has('email'))
				    	<span class="help-block">{{$errors->first('email')}}</span>
				    @endif
				  </div>

				  <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
				  <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
				  <select name="jenis_kelamin" select class="form-control" id="exampleFormControlSelect1">
				  <option value="L"{{(old('jenis_kelamin') == 'L') ? ' selected' : ''}}>Laki-laki</option>
				  <option value="P"{{(old('jenis_kelamin') == 'P') ? ' selected' : ''}}>Perempuan</option>
				  </select>
				  @if($errors->has('jenis_kelamin'))
				    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
				    @endif
				  </div>

				  <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
				    <label for="exampleInputEmail1" class="form-label">Agama</label>
				    <input name="agama" input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Agama"value="{{old('agama')}}">
				    @if($errors->has('agama'))
				    	<span class="help-block">{{$errors->first('agama')}}</span>
				    @endif
				  </div>

				  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Alamat</label>
				  <textarea name="alamat" textarea class="form-control" placeholder="Ketikan alamat anda" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
				  </div>
				  <div class="form-group">
					<label for="exampleFormControlSelect1">Kelas</label>
                    <select name="guru_id" select class="form-control" id="exampleFormControlSelect1">
                        @foreach($kelas as $g)
                        <option value="{{$g->id}}">{{$g->kelas}}</option>
                        @endforeach
				  </select>
				  </div>
				  <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
				  <label for="exampleFormControlTextarea1">Avatar</label>
				  <input type="file" name="avatar" class="form-control">
				   @if($errors->has('avatar'))
				    	<span class="help-block">{{$errors->first('avatar')}}</span>
				    @endif
				  </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Submit</button>
			        </form>
			      </div>
			    </div>
			  </div>

@stop

@section('footer')
	<script>
		$(document).ready(function(){
			$('#datatable').DataTable();

			$('.delete').click(function(){
			var siswa_id = $(this).attr('siswa-id');
			swal({
			  title: "Yakin?",
			  text: "Data siswa akan dihapus, siswa dengan id : "+siswa_id + " ",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
				console.log(willDelete);
				  if (willDelete) {
				  	window.location = "/siswa/"+siswa_id+"/delete";
				    
				  }
			});
		});
	});
		
	</script>
@stop