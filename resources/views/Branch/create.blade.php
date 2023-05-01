@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add branch
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
      <form method="post" action="{{ route('branch.store') }}">
          <div class="form-group">
              @csrf
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="state">State:</label>
              <input type="text" class="form-control" name="state"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="zip_code">Zip code:</label>
              <input type="text" class="form-control" name="zip_code"/>
          </div>
          <button type="submit" class="btn btn-primary">Add branch</button>
      </form>
  </div>
</div>
@endsection
