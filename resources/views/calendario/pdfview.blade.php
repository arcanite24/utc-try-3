@extends('layouts.app22')

@section('content')
<style type="text/css">

	table td, table th{

		border:1px solid black;

	}

</style>

<div class="container">



	<br/>

	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>



	<table>

		<tr>

			<th>No</th>

			<th>Title</th>

			<th>Description</th>

		</tr>

		@foreach ($item as $key => $item)

		<tr>

			<td>{{ ++$key }}</td>

			<td>{{ $item->email }}</td>

			<td>{{ $item->name }}</td>

		</tr>

		@endforeach

	</table>

</div>


@endsection