@extends('layouts')

@section('title','Task')

@section('content')

<br/>
<h1>{{$task->title}}</h1>
<br/>
<h4>{{$task->description}}</h4>
<br/>
<p>{{$task->long_description}}</p>
@endsection
