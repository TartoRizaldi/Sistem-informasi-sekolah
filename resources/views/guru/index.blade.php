@extends('layouts.master')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Data Guru </h3>
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
								<th>Nama</th>
								<th>Telepon</th>
								<th>Alamat</th>
								<th>AKSI</th>
							</tr>
						</thead>
						
                        <tbody>
						@foreach($guru as $s)
										<tr>
											<td>{{$s->nama}}</td>
											<td>{{$s->telepon}}</td>
											<td>{{$s->alamat}}</td>
											<td>
												<a class="btn btn-danger" href="/guru/{{$s->id}}/delete">Hapus</a>				
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
			      <form action="/guru/create" 	method="POST" enctype="multipart/form-data">
			      	{{csrf_field()}}
				 <form>

				  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Nama</label>
				  <input name="nama" type="text" class="form-control" placeholder="Ketikan nama anda" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
				  </div>
                  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Telepon</label>
				  <input name="telepon" type="text" class="form-control" placeholder="Ketikan telepon anda" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
				  </div>
                  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Alamat</label>
				  <input name="alamat" type="text" class="form-control" placeholder="Ketikan alamat anda" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
				  </div>
                  <div class="form-group">
				  <label for="exampleFormControlTextarea1">Email</label>
				  <input name="email" type="text" class="form-control" placeholder="Ketikan email anda" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
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