@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  td {
    text-align: center;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Department ID</td>
          <td>Department Name</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->dept_id}}</td>
            <td>{{$Product->name}}</td>
            </td>
            <td><a href="{{ route('department.edit', $Product->dept_id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('department.destroy', $Product->dept_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div style="display: flex; justify-content: center">
  <a href="{{ url('department/create')}}" class="btn btn-secondary">Create</a>
  </div>
<div>
@endsection
