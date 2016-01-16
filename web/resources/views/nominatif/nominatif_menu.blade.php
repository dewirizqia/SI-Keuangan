@extends('home.keuangan')

@section('isi')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Nominatif</h1>
    </div>
</div>

<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-body">   
                    <form action="{{ route('nominatif_daftar') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label >Nomor SK</label>                            
                                <select name="sk" class="form-control">
                                    <option value="">-- Pilih  --</option>
                                    @foreach($daftar_spjls as $spjls)
                                    <option value="{{ $spjls->no_sk }}">{{ $spjls->no_sk }}</option>
                                    @endforeach
                                </select><br>
                                <div class="col-md-6">
                                <input type="submit" value="Lihat Daftar Nominatif" class="form-control btn-primary">
                            </div>
                            
                            </div>
                        </input>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
@parent
@stop