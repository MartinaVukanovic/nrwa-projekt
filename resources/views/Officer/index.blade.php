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
          <td>Title</td>
          <td>First name</td>
          <td>Last name</td>
          <td>Start date</td>
          <td>End date</td>
          <td>Customer Id</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->title}}</td>
            <td>{{$Product->first_name}}</td>
            <td>{{$Product->last_name}}</td>
            <td>{{$Product->start_date}}</td>
            <td>{{$Product->end_date}}</td>
            <td>{{$Product->cust_id}}</td>
            </td>
            <td><a href="{{ route('officer.edit', $Product->officer_id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('officer.destroy', $Product->officer_id)}}" method="post">
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
  <a href="{{ url('officer/create')}}" class="btn btn-secondary">Create</a>
  </div>
<div>
@endsection
