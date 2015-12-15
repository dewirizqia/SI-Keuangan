@extends('@layout.base_keuangan')

@section('head')
<link href="{{ asset('css/jquery.appendGrid-development.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" />
@stop

@section('isi')
<form id="calx">
<table id="usulan" class="table table-bordered table-hover table-striped">
</table>

</form>

@stop

@section('script')

<script type="text/javascript" src="css/jquery-1.9.1.min.js"></script>
    <script src="css/jquery-calx-1.1.9.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $('#calx').calx();
    });
    </script>


<script>
$(function () {
$('#usulan').appendGrid({
caption: 'Usulan {{$databagian->detail}}',
initRows: 1,
columns: [
{ name: 'tahun', display: 'Tahun', type: 'text', ctrlAttr: { maxlength: 4 }, ctrlCss: { width: '40px'} },
{ name: 'sub_output', display: 'Sub Output', type: 'select', ctrlOptions: { 
		@foreach($suboutput as $daftar_suboutput)
			{{$no_suboutput++}}: '{{ $daftar_suboutput->uraian }}',
		@endforeach
	} },
{ name: 'input', display: 'Input', type: 'select', ctrlOptions: { 
		@foreach($input as $daftar_input)
			{{$no_input++}}: '{{ $daftar_input->uraian }}',
		@endforeach
	} },
{ name: 'sub_input', display: 'Sub Input', type: 'text', type: 'select', ctrlOptions: {
 		@foreach($subinput as $daftar_subinput)
			{{$no_subinput++}}: '{{ $daftar_subinput->uraian }}',
		@endforeach

	} },
{ name: 'akun', display: 'Akun', type: 'select', ctrlOptions: { 
		@foreach($akun as $daftar_akun)
			{{$no_akun++}}: '{{ $daftar_akun->uraian_akun }}',
		@endforeach
	} },

{ name: 'detail', display: 'Detail', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'harga', display: 'Harga', type: 'text', ctrlAttr: { maxlength: 10 }, ctrlCss: { width: '50px', 'text-align': 'right' }, value: 0 },

{ name: 'nominal1', display: 'Nominal', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'satuan1', display: 'Satuan', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'nominal2', display: 'Nominal', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'satuan2', display: 'Satuan', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'nominal3', display: 'Nominal', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'satuan3', display: 'Satuan', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'nominal4', display: 'Nominal', type: 'text',  ctrlCss: { width: '100px'} },
{ name: 'satuan4', display: 'Satuan', type: 'text',  ctrlCss: { width: '100px'} },

{ name: 'jumlah_rincian', display: 'Jumlah Rincian', type: 'text',  formula: '$harga*($nominal1*$nominal2*$nominal3*$nominal4)', ctrlCss: { width: '100px'} }

]
});
});



</script>

<script type="text/javascript">
caption: null,
captionTooltip: null,
initRows: 3,
maxRowsAllowed: 0,
initData: null,
columns: null,
i18n: null,
idPrefix: null,
rowDragging: false,
hideButtons: null,
hideRowNumColumn: false,
rowButtonsInFront: false,
rowCountName: '_RowCount',
buttonClasses: null,
sectionClasses: null,
customGridButtons: null,
customRowButtons: null,
customFooterButtons: null,
useSubPanel: false,
maintain<a href="http://www.jqueryscript.net/tags.php?/Scroll/">Scroll</a>: false,
maxBodyHeight: 0,
autoColumnWidth: true
</script>


<script type="text/javascript">
type: 'text',
name: null,
value: null,
display: null,
displayCss: null,
displayTooltip: null,
headerSpan: 1,
cellCss: null,
ctrlAttr: null,
ctrlProp: null,
ctrlCss: null,
ctrlClass: null,
ctrlOptions: null,
uiOption: null,
uiTooltip: null,
resizable: false,
invisible: false,
emptyCriteria: null,
customBuilder: null,
customGetter: null,
customSetter: null,
onClick: null,
onChange: null
</script>

<script type="text/javascript">
nameFormatter: null,
dataLoaded: null,
rowDataLoaded: null,
afterRowAppended: null,
afterRowInserted: null,
afterRowSwapped: null,
beforeRowRemove: null,
afterRowRemoved: null,
afterRowDragged: null,
subPanelBuilder: null,
subPanelGetter: null,
maxNumRowsReached: null

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{ asset('css/jquery.appendGrid-development.js') }}"></script>

@stop