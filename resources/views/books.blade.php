@extends('layouts')

@section('title', 'Books')

@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header"><h3>Books</h3></div>
            <div class="card-body">
                   
                @foreach($book as $key => $data)
                    <div class="card" style="margin-bottom:10px;">
                        
                        <div class="card-body">
                            <h5>{{$data->title}}</h5>
                            <p>Author: {{$data->author}}</p>
                            <a style="float:right;" href="#">View Reviews</a>   
                        </div>
                    </div>
                @endforeach
                 

                 @if ($book->count())
                    {{ $book->links() }} 
                 @endif

            </div>
        </div>
    </div>
    <div class="col-md-5">

    </div>
</div>

@endsection