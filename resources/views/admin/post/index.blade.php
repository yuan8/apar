@extends('layouts.admin.master')

@section('header-content')
<h5 >UNIT</h5>
<div class="btn-group float-right" style="margin-top: 10px; margin-bottom: 10px;">
	<a href="{{route('d.create')}}" class="btn btn-success btn-xs">NEW UNIT</a>
</div>
@stop

@section('content')
<style type="text/css">
	table tr th,table tr td{
		font-size: 10px;
	}
</style>


<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2">
				ID
			</th>
			<th rowspan="2">
				VIEWER
			</th>
			<th rowspan="2">
				JUDUL
			</th>
			<th rowspan="2">
				APARTEMEN
			</th>
			<th rowspan="2">
				LANTAI
			</th>
			<th colspan="3">
				HARGA
			</th>
			
			<th rowspan="2">
				STATUS
			</th>
			<th rowspan="2">
				TGL BERAHIR IKLAN
			</th>
			<th rowspan="2">
				AKSI
			</th>
	</tr>
	<tr>
		<th>
			HARIAN
		</th>
		<th>
			BULANAN
		</th>
		<th>
			TAHUNAN
		</th>
	</tr>
	</thead>
</table>
@stop