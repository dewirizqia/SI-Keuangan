@extends('@layout.base_admin')

@section('head')

@stop

@section('isi')

@stop
@section('sidebar')		<li>
                            <a href="#"><i class="glyphicon glyphicon-credit-card"></i> Pagu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="">Pagu Output</a>
                                </li>
                                <li>
                                    <a href="">Pagu Prodi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<li>
                            <a href="#"><i class="glyphicon glyphicon-briefcase"></i> Anggaran FT</span></a>
                        </li>
                        <li>
	                        <a href="#"><i class="glyphicon glyphicon-book"></i> Usulan Anggaran<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            @foreach ($sbagian as $bagian)

	                            <li>
	                                <a href="{{ route('daftar_usulan_bagian',$bagian->id) }}">{{ $bagian->bagian }}</a>
	                            </li>
	                            @endforeach
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i> Rekap Belanja<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                            @foreach ($sbagian as $bagian)

@section('sidebar')		
<li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Pagu<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            <li>
                <a href="">Pagu Output</a>
            </li>
            <li>
                <a href="">Pagu Prodi</a>
            </li>
            <li>
                <a href="">Pagu Kegiatan</a>
            </li>
        </ul>
        <!-- /.nav-second-level -->
    </li>
	<li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Anggaran FT</span></a>
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Usulan Anggaran<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            @foreach ($sbagian as $bagian)
>>>>>>> ad79868d56e2320600bf812afbfce9eab86610db

            <li>
                <a href="{{ route('daftar_usulan_bagian',$bagian->id) }}">{{ $bagian->bagian }}</a>
            </li>
            @endforeach
        </ul>
        <!-- /.nav-second-level -->
    </li>
    <li>
        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Rekap Belanja<span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
            @foreach ($sbagian as $bagian)
	                            <li>
	                                <a href="#">{{ $bagian->bagian }}</a>
	                            </li>
	                            @endforeach
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-folder-close"></i>Permintaan Belanja</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Ajuan Revisi</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-envelope"></i> Surat <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
	                            <li>
	                                <a href="#">Daftar Nominatif</a>
	                            </li>
	                            <li>
	                                <a href="#">SPJ</a>
	                            </li>
	                        </ul>
                        </li>
@stop