@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add officer
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('officer.store') }}">
          <div class="form-group">
              @csrf
              <label  for="cust_id">Customer Id:</label>
              <select class="form-select" name="cust_id">
                  @foreach (\App\Models\Customer::all() as $type)
                      <option value="{{ $type->cust_id }}">{{ $type->cust_id }} - {{ $type->address }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="first_name">First name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="start_date">Start date:</label>
              <input type="date" class="form-control" name="start_date"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="end_date">End date:</label>
              <input type="date" class="form-control" name="end_date"/>
          </div>
          <button type="submit" class="btn btn-primary">Add officer</button>
      </form>
  </div>
</div>
@endsection
