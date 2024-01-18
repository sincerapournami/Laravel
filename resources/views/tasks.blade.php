@extends('layouts')

@section('title', 'Tasks')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3>Tasks List</h3></div>
            <div class="card-body">
                 <ol>   
                @foreach($task as $key => $data)
                    <li><a href="{{ route('taskshow',[$data->id]) }}">{{$data->title}}</a></li>
                @endforeach
                 </ol>
            </div>
        </div>
    </div>  
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3>Add New Task</h3></div>
            <div class="card-body">
                <form method="POST" action="{{route('tasks.store')}}">
                    @csrf
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('required') is-invalid @enderror" />
                    </div>
                    <div>
                        <label for="short_desc">Short Description</label>
                        <textarea name="short_desc" id="short_desc" rows="2" class="form-control @error('required') is-invalid @enderror"></textarea>
                    </div>
                    <div>
                        <label for="long_desc">Long Description</label>
                        <textarea name="long_desc" id="long_desc" rows="5" class="form-control @error('required') is-invalid @enderror"></textarea>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Create">
                    </div>
                    @if(session()->has('success'))
                        <p>
                            {{ session()->get('success') }}
                        </p>
                    @endif

                    @if ($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </div>
        </div>
    </div>   
</div>
    
@endsection