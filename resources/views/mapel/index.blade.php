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
					<!-- <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Export Excel</a>
					<a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export PDF</a> -->
					@if(auth()->user()->role == 'superAdmin')
					<button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
					@endif	
				</div>
					
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="datatable">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Nama</th>
								<th>Semester</th>
                                <th>Guru</th>
								<!-- <th>AKSI</th> -->
							</tr>
						</thead>
						<tbody>
                        
					
						@foreach($mapel as $m)
										<tr>
											<td>{{$m->kode}}</td>
											<td>{{$m->nama}}</td>
											<td>{{$m->semester}}</td>
                                            <td>{{$m->guru['nama']}}</td>
											<!-- <td>
												<button class="btn btn-warning">Edit</button>				
											</td> -->
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
			      <form action="/mapel/create" 	method="POST" enctype="multipart/form-data">
			      	{{csrf_field()}}
				 <form>

				  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Kode</label>
				  <input name="kode" type="text" class="form-control" placeholder="Ketikan alamat anda" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
				  </div>
                  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Nama Mapel</label>
				  <input name="nama" type="text" class="form-control" placeholder="Ketikan alamat anda" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
				  </div>
                  <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Semester</label>
                    <select name="semester" select class="form-control" id="exampleFormControlSelect1">
                        
                        <option value="ganjil">Ganjil</option>
                        <option value="genap">Genap</option>
				  </select>
				  @if($errors->has('jenis_kelamin'))
				    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
				    @endif
				  </div>
                  <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                    <label for="exampleFormControlSelect1">Pengajar</label>
                    <select name="guru_id" select class="form-control" id="exampleFormControlSelect1">
                        @foreach($guru as $g)
                        <option value="{{$g->id}}">{{$g->nama}}</option>
                        @endforeach
				  </select>
				  @if($errors->has('jenis_kelamin'))
				    	<span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
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