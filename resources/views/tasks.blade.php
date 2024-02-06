@extends('layouts')

@section('title', 'Tasks')

@section('content')

<div class="row justify-content-center mt-5">
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
    <div class="col-md-7">
        <div class="card">
            <div class="card-header"><h3>Tasks List</h3></div>
            <div class="card-body">
                   
                @foreach($task as $key => $data)
                    <div class="card" style="margin-bottom:10px;">
                        
                        <div class="card-body">
                            <h5>{{$data->title}}</h5>
                            <p>{{$data->description}}</p>
                            <b>Status: 
                            @if ($data->completed == 0)
                                Open
                            @else
                                Closed
                            @endif
                            </b>
                            <a style="float:right;" href="{{ route('taskshow',[$data->id]) }}">View Task</a>
                            @if ($data->completed == 0)
                                <form action=" {{ route('tasks.complete', $data->id) }} " method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input style="float:right; background:#000; color:#fff; text-decoration:none; padding:5px 15px; display:inline; width:auto; margin:10px 0;" type="submit" onclick="return confirm('Are you sure you want to mark it done?')" name="complete" value="Mark As Done" />
                                </form>
                            @endif
                            
                        </div>
                    </div>
                @endforeach
                 

                 @if ($task->count())
                    {{ $task->links() }} 
                 @endif

            </div>
        </div>
    </div>  
    <div class="col-md-5">
        <div class="card">
            <div class="card-header"><h3>Add New Task</h3></div>
            <div class="card-body">
                <form method="POST" action="{{route('tasks.store')}}">
                    @csrf
                    <div class="col-md-12">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('required') is-invalid @enderror" />
                    </div>
                    <div class="col-md-12">
                        <label for="short_desc" class="form-label">Short Description</label>
                        <textarea name="short_desc" id="short_desc" rows="2" class="form-control @error('required') is-invalid @enderror"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="long_desc" class="form-label">Long Description</label>
                        <textarea name="long_desc" id="long_desc" rows="5" class="form-control @error('required') is-invalid @enderror"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-secondary" value="Create">
                    </div>

                </form>
            </div>
        </div>
    </div>   
</div>
    
@endsection