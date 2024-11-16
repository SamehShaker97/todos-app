@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">

      <div class="col-md-8">
        
          <div class="card mt-5">

              <div class="card-header">Todo List</div>
              <div class="p-3">
                
                <a class="btn btn-primary w-25 justify-content-center d-flex m-auto mt-3 mb-3" href="{{route('todos.create')}}">Create</a>
                  @if($todos->isNotEmpty())
                  
                  <table class="table">
                    <thead class="border-bottom">
                      <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Status</th>
                          <th>Created By</th>
                          <th>Created At</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($todos as $key => $todo)
                      <tr>
                          <th scope="row">{{$key + 1}}</th>
                          <td>{{$todo->title}}</td>
                          <td>{{$todo->description}}</td>
                          <td>
                            @if($todo->status == 'pending')
                            <span class="badge bg-warning">Pending</span>
                            @else
                            <span class="badge bg-success">Completed</span>
                            @endif
                          </td> 
                          <td>{{ $todo->user->name }}</td>
                          <td>{{ $todo->created_at->format('d/m/Y') }}</td>
                          <td class="d-flex gap-1">
                            <a href="{{route('todos.edit', $todo->id)}}" class="btn btn-primary">Edit</a>
                            <form action="{{route('todos.destroy', $todo->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                      {{ $todos->links() }}
                    </div>
                    @else
                    <div class="text-center">No todos found.</div>
                  @endif
              </div>

          </div>
      </div>
  </div>
</div>
@endsection