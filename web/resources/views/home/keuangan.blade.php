@extends('@layout.base_admin')

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
                            <a href="#"><i class="glyphicon glyphicon-hdd"></i> Anggaran FT</span></a>
                        </li>
                        <li>
	                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Usulan Anggaran<span class="fa arrow"></span></a>
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
	                        <a href="#"><i class="glyphicon glyphicon-tasks"></i> Rekap Belanja<span class="fa arrow"></span></a>
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
                            <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i>Permintaan Belanja</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-duplicate"></i> Ajuan Revisi</span></a>
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