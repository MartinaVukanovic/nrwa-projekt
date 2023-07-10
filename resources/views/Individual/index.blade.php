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
          <td>First name</td>
          <td>Last name</td>
          <td>Birth date</td>
          <td>Customer Id</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->first_name}}</td>
            <td>{{$Product->last_name}}</td>
            <td>{{$Product->birth_date}}</td>
            <td style="color:blue !important; cursor:pointer" onclick="location.href=`/customer/{{$Product->cust_id}}/edit`;">{{$Product->cust_id}}</td>
            </td>
            <td><a href="{{ route('individual.edit', $Product->cust_id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('individual.destroy', $Product->cust_id)}}" method="post">
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
  <a href="{{ url('individual/create')}}" class="btn btn-secondary">Create</a>
  </div>
<div>
@endsection
