<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/dashboard" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						@if(auth()->user()->role == 'admin' || 'superAdmin')
							<li><a href="/siswa" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li>
						@endif

						@if(auth()->user()->role == 'superAdmin')
						<li><a href="/guru" class=""><i class="lnr lnr-user"></i> <span>Guru</span></a></li>
						<li><a href="/mapel" class=""><i class="lnr lnr-user"></i> <span>Mapel</span></a></li>
						<li><a href="/kelas" class=""><i class="lnr lnr-user"></i> <span>Kelas</span></a></li>
						@endif
						<li><a href="/posts" class=""><i class="lnr lnr-pencil"></i> <span>Post</span></a></li>
					</ul>
				</nav>
			</div>
		</div>