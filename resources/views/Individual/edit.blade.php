@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Individual Data
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
    <form method="post" action="{{ route('individual.update', $Product->cust_id ) }}">
        @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="first_name">First name:</label>
              <input type="text" class="form-control" name="first_name" value="{{ $Product->first_name }}"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last name:</label>
              <input type="text" class="form-control" name="last_name" value="{{ $Product->last_name }}"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              <label for="birth_date">Birth date:</label>
              <input type="date" class="form-control" name="birth_date" value="{{ $Product->birth_date }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection
