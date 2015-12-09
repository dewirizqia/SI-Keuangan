@extends('@layout.base_keuangan')

@section('head')
<link href="{{ asset('css/jquery.appendGrid-development.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css" />
@stop

@section('isi')
<form>
<table id="usulan" class="table table-bordered table-hover table-striped">
</table>
</form>

@stop

@section('script')

<script>
$(function () {
$('#usulan').appendGrid({
caption: 'Usulan ',
initRows: 1,
columns: [
{ name: 'tahun', display: 'Tahun', type: 'text', ctrlAttr: { maxlength: 4 }, ctrlCss: { width: '40px'} },

{ name: 'Album', display: 'Album', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '160px'} },
{ name: 'Artist', display: 'Artist', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '100px'} },
{ name: 'Origin', display: 'Origin', type: 'select', ctrlOptions: { 0: '{Choose}', 1: 'Hong Kong', 2: 'Taiwan', 3: 'Japan', 4: 'Korea', 5: 'US', 6: 'Others'} },
{ name: 'Poster', display: 'With Poster?', type: 'checkbox' },
{ name: 'Price', display: 'Price', type: 'text', ctrlAttr: { maxlength: 10 }, ctrlCss: { width: '50px', 'text-align': 'right' }, value: 0 }
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