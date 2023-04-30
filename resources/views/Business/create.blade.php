@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add business
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
      <form method="post" action="{{ route('business.store') }}">
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
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="state_id">State Id:</label>
              <input type="text" class="form-control" name="state_id"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="incorp_date">Incorp Date:</label>
              <input type="date" class="form-control" name="incorp_date"/>
          </div>
          <button type="submit" class="btn btn-primary">Add customer</button>
      </form>
  </div>
</div>
@endsection
