@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <form method="post" action="{{ route('todos.update' , $todo->id) }}">
              @csrf
              @method('put')
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$todo->title}}"
                    name="title" id="exampleFormControlInput1">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    id="exampleFormControlTextarea1" rows="3">{{ old('description', $todo->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status"
                    id="exampleFormControlSelect1">
                    <option value="pending"{{old('status', $todo->status) == 'pending' ? 'selected' : ''}}">Pending</option>
                    <option value="completed"{{old('status', $todo->status) == 'completed' ? 'selected' : ''}}">Completed</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div> 
  </div>  
@endsection
