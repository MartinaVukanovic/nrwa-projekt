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
@if ($errors->has('delete'))
    <div class="alert alert-danger">
        {{ $errors->first('delete') }}
    </div>
@endif
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Name</td>
          <td>Address</td>
          <td>City</td>
          <td>Zip code</td>
          <td>State</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->name}}</td>
            <td>{{$Product->address}}</td>
            <td>{{$Product->city}}</td>
            <td>{{$Product->zip_code}}</td>
            <td>{{$Product->state}}</td>
            </td>
            <td><a href="{{ route('branch.edit', $Product->branch_id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('branch.destroy', $Product->branch_id)}}" method="post">
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
  <a href="{{ url('branch/create')}}" class="btn btn-secondary">Create</a>
  </div>
<div>
@endsection
