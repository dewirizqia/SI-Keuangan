@extends('@layout.base_admin')



@section('sidebar')
						<li>
                            <a href="{{ route('daftar_usulan_perbagian', Auth::user()->id_bagian ) }}"><i class="glyphicon glyphicon-folder-open"></i> Usulan Anggaran</span></a>
                        </li>
                        <li>
                            <a href="{{ route('belanja_bagian_daftar', Auth::user()->id_bagian ) }}"><i class="glyphicon glyphicon-tasks"></i>Rekap Belanja</a>
                        </li>
                        <li>
                            <a href="{{ route('daftar_serapan_bagian', Auth::user()->id_bagian ) }}"><i class="glyphicon glyphicon-calendar"></i> Serapan Dana</a>
                            <!-- <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Kegiatan</a>
                                </li>
                                <li>
                                    <a href="">Prodi</a>
                                </li>
                            </ul> -->

                        </li>
                        <li>
                            <a href="{{ route('daftar_revisi_perbagian', Auth::user()->id_bagian ) }}"><i class="glyphicon glyphicon-duplicate"></i> Ajuan Revisi</span></a>
                        </li>
@stop