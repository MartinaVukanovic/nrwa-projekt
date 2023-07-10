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
          <td>Available balance</td>
          <td>Close date</td>
          <td>Last activity date</td>
          <td>Open date</td>
          <td>Pending balance</td>
          <td>Status</td>
          <td>Customer address</td>
          <td>Open branch id</td>
          <td>Open employee id</td>
          <td>Product code</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->avail_balance }}</td>
            <td>{{$Product->close_date}}</td>
            <td>{{$Product->last_activity_date}}</td>
            <td>{{$Product->open_date}}</td>
            <td>{{$Product->pending_balance }}</td>
            <td>{{$Product->status }}</td>
            <td>{{ $Product->customer->address }}</td>
            <td>{{$Product->open_branch_id }}</td>
            <td>{{$Product->open_emp_id }}</td>
            <td>{{$Product->product_cd }}</td>
            </td>
            <td><a href="{{ route('account.edit', $Product->account_id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('account.destroy', $Product->account_id)}}" method="post">
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
  <a href="{{ url('account/create')}}" class="btn btn-secondary">Create</a>
  </div>
<div>
@endsection
