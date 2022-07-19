
<style type="text/css">
	.data, .data th,.data td {
  border: 1px solid black;
}
</style>
<center><h1>REKAP NILAI RATA RATA SISWA</h1></center>
<table class="data" class="table" style="border:1px solid #ddd;margin: 0 auto;width: 100%;">
	<thead>
		<tr>
			<th>NIS</th>
			<th>NAMA LENGKAP</th>
			<th>JENIS KELAMIN</th>
			<th>AGAMA</th>
			<th>RATA-RATA NILAI</th>
		</tr>
	</thead>
	<tbody >
		@foreach($siswa as $s)
		<tr >
			<td>{{$s->NIS}}</td>
			<td>{{$s->nama_lengkap()}}</td>
			<td>{{$s->jenis_kelamin}}</td>
			<td>{{$s->agama}}</td>
			<td>{{$s->rataRataNilai()}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<br>
<br>
<br>
<div style="float: right;">
	<table border="0">
	
		<tr>
			<td width="50%">
				Dibuat di
			</td>
			<td>
				:
			</td>
			
		</tr>
		<tr>
			<td>
				Pada Tanggal
			</td>
			<td>
				:
			</td>
			
		</tr>
		<tr>
			<td colspan="2">
				<br>
                <br>
                <br>
			</td>
		</tr>
		<tr>
			<td colspan="2">
			(.................................................)
			</td>
		</tr>
</table>
</div>