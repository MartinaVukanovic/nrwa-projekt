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
      <form method="post" action="{{ route('product.store') }}">
          <div class="form-group">
              @csrf
              <label for="product_cd">Product CD:</label>
              <input type="text" class="form-control" name="product_cd"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">Product name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="date_offered">Date Offered:</label>
              <input type="date" class="form-control" name="date_offered"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="name">Date Retired:</label>
              <input type="date" class="form-control" name="date_retired"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="product_type_cd">Product Type CD:</label>
              <input type="text" class="form-control" name="product_type_cd"/>
          </div>
          <button type="submit" class="btn btn-primary">Add product</button>
      </form>
  </div>
</div>
@endsection
