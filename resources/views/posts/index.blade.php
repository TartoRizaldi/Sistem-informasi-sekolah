@extends('layouts.master')

@section('content')
	<div class="main">
		<div class="main-content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Posts</h3>
					<div class="right">
					@if(auth()->user()->role == 'admin')
					<a href="{{route('posts.add')}}" class="btn btn-sm btn-primary">ADD new post</a>
					@endif
					</div>
					
				</div>
				<div class="panel-body">
					<table class="table table-hover" id="datatable">
						<thead>
							<tr>
								<th>ID</th>
								<th>TITLE</th>
								<th>USER</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $post)
						<tr>
							<td>{{$post->id}}</td>
							<td>{{$post->title}}</td>
							<td>{{$post->user->name}}</td>
							<td>
							<form action="{{route('post.delete',$post->id)}}" method="post">
							@method("delete")
							@csrf
							<a target="_blank" href="{{route('site.single.post',$post->slug)}}" class="btn btn-info btn-sm">View</a>
							@if(auth()->user()->role == 'admin')
							<!-- <a href="#" class="btn btn-warning btn-sm">Edit</a> -->
							
								<button class="btn btn-danger btn-sm delete">Delete</button>
							
							@endif
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

	

@stop
