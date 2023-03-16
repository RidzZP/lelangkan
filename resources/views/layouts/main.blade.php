{{-- Head HTML --}}
@include('partials.header')

<body class="sidebar-dark">
	<div class="main-wrapper">

		{{-- Sidebar --}}
		@include('partials.sidebar')
		
	
		<div class="page-wrapper">
			{{-- Navbar --}}
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
			</nav>

            {{-- Konten --}}
			<div class="page-content">

                @yield('konten')

			</div>
		</div>
	</div>


    {{-- Script JS --}}
    @include('partials.footer')
</body>
</html>    