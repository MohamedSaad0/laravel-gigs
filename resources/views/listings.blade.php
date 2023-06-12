@extends('layout')
@section('content')
@if(count($listings) == 0)
<h2>Currently there are no listings</h2>
@else 
@foreach($listings as $listing)

<h3> <a href="listings/{{$listing['id']}}"> {{$listing['title']}}</a> </h3>
<p>{{$listing['description']}}</p>
@endforeach
@endif
@endsection