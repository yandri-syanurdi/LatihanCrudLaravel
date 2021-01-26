<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ URL::to('/dashboard') }}" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{ URL::to('/forum') }}" class=""><i class="lnr lnr-users"></i> <span>Forum</span></a></li>
						@if(auth()->user()->role == 'admin')
						<!-- <li><a href="{{ URL::to('/siswa') }}" class=""><i class="lnr lnr-user"></i> <span>Siswa</span></a></li> -->
						<!-- <li><a href="{{ URL::to('/siswa') }}" class=""><i class="lnr lnr-user"></i> <span>Users</span></a></li> -->
						<li>
							<a href="#subPages" data-toggle="collapse" class=""><i class="lnr lnr-user"></i> <span>Users</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('/all') }}" class="">All</a></li>
									<li><a href="{{ URL::to('/myadmin') }}" class="">Admin</a></li>
									<li><a href="{{ URL::to('/guru') }}" class="">Guru</a></li>
									<li><a href="{{ URL::to('/siswa') }}" class="">Siswa</a></li>
								</ul>
							</div>
						</li>
						<!-- <li><a href="{{ URL::to('/posts') }}"   class=""><i class="lnr lnr-pencil"></i> <span>Posts</span></a></li> -->
						<li><a href="{{ URL::to('/postingan') }}"   class=""><i class="lnr lnr-pencil"></i> <span>Posts</span></a></li>
						@endif
						<li><a href="{{ URL::to('/event') }}" class=""><i class="lnr lnr-calendar-full"></i> <span>Event</span></a></li>
						<!-- <li><a href="{{ URL::to('/video') }}" class=""><i class="lnr lnr-camera-video"></i> <span>Video</span></a></li> -->
						<li>
							<a href="#subPagesa" data-toggle="collapse" class=""><i class="lnr lnr-camera-video"></i> <span>Video</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagesa" class="collapse ">
								<ul class="nav">
									<li><a href="{{ URL::to('/video') }}" class="">Mapel</a></li>
									<li><a href="{{ URL::to('/berita') }}" class="">Berita</a></li>
									<li><a href="{{ URL::to('/kamus') }}" class="">Kamus</a></li>
									<li><a href="{{ URL::to('/alquran') }}" class="">Al-Qur'an</a></li>
								</ul>
							</div>
						</li>
						<li><a href="{{ URL::to('/image') }}" class=""><i class="lnr lnr-picture"></i> <span>Image</span></a></li>
						<li><a href="{{ URL::to('/document') }}" class=""><i class="lnr lnr-file-empty"></i> <span>Document</span></a></li>
						<li><a href="{{ URL::to('/artikel') }}" class=""><i class="lnr lnr-book"></i> <span>Artikel</span></a></li>
						<li><a href="{{ URL::to('/audio') }}" class=""><i class="lnr lnr-music-note"></i> <span>Audio</span></a></li>
						<!-- <li><a href="{{ URL::to('/survei') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Survei</span></a></li> -->
						<!-- <li><a href="{{ URL::to('/other') }}" class=""><i class="lnr lnr-cog"></i> <span>Other</span></a></li> -->
						<li><a href="{{ URL::to('/') }}" class=""><i class="lnr lnr-chart-bars"></i> <span>Survei</span></a></li>
						<li><a href="{{ URL::to('/') }}" class=""><i class="lnr lnr-cog"></i> <span>Other</span></a></li>
						<!-- <li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li> -->
					</ul>
				</nav>
			</div>
		</div>