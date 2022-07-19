@extends('layouts.master')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
				    <div class="panel-heading">
					<h3 class="panel-title">Data Kelas </h3>
					<div class="right">
					<!-- <a href="/siswa/exportexcel" class="btn btn-sm btn-primary">Tambah Kelas</a> -->
					<!-- <a href="/siswa/exportpdf" class="btn btn-sm btn-primary">Export PDF</a> -->
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
				</div>
					
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="datatable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Kelas</th>
								<th>Wali Kelas</th>
								<th>AKSI</th>
							</tr>
						</thead>
						
                        <tbody>
						@foreach($kelas as $k)
										<tr>
											<td>{{$k->id}}</td>
											<td>{{$k->kelas}}</td>
											<td>{{$k->guru->nama}}</td>
											<td>
												<form action="{{route('kelas.destroy', $k->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{ method_field('DELETE') }}
                                                    <button class="btn btn-danger" href="/kelas/{{$k->id}}/delete">Hapus</a>
                                                </form>
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
			      <form action="{{route('kelas.store')}}" 	method="POST" enctype="multipart/form-data">
			      	{{csrf_field()}}
                      {{-- {{}} --}}
				 <form>
                 <div class="form-group">
				  <label for="exampleFormControlTextarea1">Kelas</label>
				  <input name="kelas" type="text" class="form-control" placeholder="Kelas" id="exampleFormControlTextarea1" rows="3" required>{{old('alamat')}}</input>
				  </div>
				  <div class="form-group">
                  <label for="exampleFormControlSelect1">Wali Kelas</label>
                    <select name="guru_id" select class="form-control" id="exampleFormControlSelect1">
                        @foreach($guru as $g)
                        <option value="{{$g->id}}">{{$g->nama}}</option>
                        @endforeach
				  </select>
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
			$('#datatable').DataTable({
				
				serverside:true,
				ajax:"{{route('ajax.get.data.siswa')}}",
				columns:[
					{data:'nama_depan',name:'nama_depan'},
					{data:'nama_belakang',name:'nama_belakang'},
					{data:'jenis_kelamin',name:'jenis_kelamin'},
					{data:'agama',name:'agama'},
					{data:'alamat',name:'alamat'},
					{data:'rata2_nilai',name:'rata2_nilai'},
					{data:'aksi',name:'aksi'},
				]
			});

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