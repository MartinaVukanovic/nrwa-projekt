@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit branch Data
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
    <form method="post" action="{{ route('branch.update', $Product->branch_id ) }}">
        @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="{{ $Product->name }}"/>
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address" value="{{ $Product->address }}"/>
          </div>
          <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city" value="{{ $Product->city }}"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <label for="state">State:</label>
              <input type="text" class="form-control" name="state" value="{{ $Product->state }}"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <label for="zip_code">Zip code:</label>
              <input type="text" class="form-control" name="zip_code" value="{{ $Product->zip_code }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection
