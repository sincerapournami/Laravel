@extends('layouts')

@section('content')


<div class="row justify-content-center mt-5">
<div class="col-md-6">
    <div class="card">
        <div class="card-header"><h3>Edit Task</h3></div>
        <div class="card-body">
            <form method="POST" action="{{route('tasks.update', $task->id )}}">
                @csrf
                @method('PUT')
                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control @error('required') is-invalid @enderror" value="{{$task->title}}" />
                </div>
                <div>
                    <label for="short_desc" class="form-label">Short Description</label>
                    <textarea name="short_desc" id="short_desc" rows="2" class="form-control @error('required') is-invalid @enderror">{{$task->description}}</textarea>
                </div>
                <div>
                    <label for="long_desc" class="form-label">Long Description</label>
                    <textarea name="long_desc" id="long_desc" rows="5" class="form-control @error('required') is-invalid @enderror">{{$task->long_description}}</textarea>
                </div>
                <div>
                    <input type="submit" class="btn btn-secondary" value="Update">
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