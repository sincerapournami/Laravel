@extends('layouts')

@section('title','Task')

@section('content')

<br/>
<div class="row justify-content-right mt-5">
    <div class="col-md-8">
        <h1>{{$task->title}}</h1>
        <br/>
        <b>Status: 
            @if ($task->completed == 0)
                Open
            @else
                Closed
            @endif
            </b>
            <br/><br/>
        <h4>{{$task->description}}</h4>
        <br/>
    </div>
    <div class="col-md-4">
        <a style="float:left; background:#bbb; color:#000; text-decoration:none; padding:8px 20px; display:inline; width:auto; margin:0 10px; border:2px solid #000;" href="{{ route('tasks.edit', [$task->id]) }}">Edit</a>
        <form action=" {{ route('tasks.destroy', [$task->id]) }} " method="POST">
            @csrf
            @method('DELETE')
            <input style="float:left; background:#bbb; color:#000; text-decoration:none; padding:8px 20px; display:inline; width:auto; margin:0;" type="submit" name="destroy" value="Delete" onclick="return confirm('Are you sure you want to delete?')" />
        </form>
    </div>    
</div>

@endsection
