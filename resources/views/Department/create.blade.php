@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add product type data
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
      <form method="post" action="{{ route('department.store') }}">
          <div class="form-group">
              @csrf
              <p>Department ID is autoincremented.</p>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="name">Department Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <button type="submit" class="btn btn-primary">Add department</button>
      </form>
  </div>
</div>
@endsection
