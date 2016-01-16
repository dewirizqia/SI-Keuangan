@extends('@layout.base_admin')


@section('sidebar')			
							<li>
                            <a href="#"><i class="glyphicon glyphicon-credit-card"></i> Pagu<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            	<li>
                                    <a href="{{ route('daftar_pagu') }}">Alokasi RKA-KL</a>
                                </li>
                                <li>
                                    <a href="{{ route('daftar_pagu_output') }}">Pagu Output</a>
                                </li>
                                <li>
                                    <a href="{{ route('daftar_pagu_bagian') }}">Pagu Bagian</a>
                                </li>
                                <li>
                                    <a href="#">Pagu Kegiatan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        

						<li>
                            <a href="{{ route('daftar_rkakl') }}"><i class="glyphicon glyphicon-hdd"></i> Anggaran FT</span></a>
                        </li>
                        <li>
	                        <a href="#"><i class="glyphicon glyphicon-folder-open"></i> Usulan Anggaran<span class="fa arrow"></span></a>

	                        <ul class="nav nav-second-level">
	                        	<li>
	                                <a href="{{ route('daftar_usulan') }}">Daftar Usulan</a>
	                            </li>
	                            @foreach ($sbagian as $bagian)

	                            <li>
	                                <a href="{{ route('daftar_usulan_bagian',$bagian->id) }}">{{ $bagian->detail }}</a>
	                            </li>
	                            @endforeach
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
	                    <li>
	                        <a href="#"><i class="glyphicon glyphicon-tasks"></i> Rekap Belanja<span class="fa arrow"></span></a>
	                        <ul class="nav nav-second-level">
	                        	<li>
	                                <a href="{{ route('belanja_daftar') }}">Daftar Rekap Belanja</a>
	                            </li>
	                            @foreach ($sbagian as $bagian)
	                            <li>
	                                <a href="#">{{ $bagian->detail }}</a>
	                            </li>
	                            @endforeach
	                        </ul>
	                        <!-- /.nav-second-level -->
	                    </li>
                        <!-- <li>
                            <a href="#"><i class="glyphicon glyphicon-shopping-cart"></i>Permintaan Belanja</a>
                        </li> -->
                        <li>
                            <a href="{{ route('daftar_revisi') }}"><i class="glyphicon glyphicon-duplicate"></i> Ajuan Revisi</span></a>
                        </li>
                        <li>

                            <a href="#"><i class="glyphicon glyphicon-envelope"></i> Surat <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
	                            <li>
	                                <a href="{{ route('nominatif_menu') }}">Daftar Nominatif</a>
	                            </li>
	                            <li>
	                                <a href="{{ route('spjup_daftar') }}">SPJ UP</a>
	                            </li>
	                            <li>
	                                <a href="{{ route('spjls_daftar') }}">SPJ LS</a>
	                            </li>
	                        </ul>
                        </li>

@stop

@section('script')
@parent
@stop