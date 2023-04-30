@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add customer
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
      <form method="post" action="{{ route('customer.store') }}">
          <div class="form-group">
              @csrf
              <label  for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="postal_code">Postal Code:</label>
              <input type="text" class="form-control" name="postal_code"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="state">State:</label>
              <input type="text" class="form-control" name="state"/>
          </div>
          <button type="submit" class="btn btn-primary">Add customer</button>
      </form>
  </div>
</div>
@endsection
