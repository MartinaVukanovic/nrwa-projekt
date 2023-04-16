@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Product Data
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
    <form method="post" action="{{ route('product.update', $Product->product_cd ) }}">
        @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="product_cd">Product CD:</label>
              <input type="text" class="form-control" name="product_cd" value="{{ $Product->product_cd }}"/>
          </div>
          <div class="form-group">
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $Product->name }}"/>
          </div>
          <div class="form-group">
              <label for="date_offered">Date Offered:</label>
              <input type="date" class="form-control" name="date_offered" value="{{ $Product->date_offered }}"/>
          </div>
          <div class="form-group">
              <label for="date_retired">Date Retired:</label>
              <input type="date" class="form-control" name="date_retired" value="{{ $Product->date_retired }}"/>
          </div>
          <div class="form-group">
              <label for="product_type_c">Product Type CD:</label>
              <input type="text" class="form-control" name="product_type_cd" value="{{ $Product->product_type_cd }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection
