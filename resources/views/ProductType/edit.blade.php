@extends('ProductType/layout')

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
    <form method="post" action="{{ route('productType.update', $Product->product_type_cd ) }}">
        @csrf
          @method('PATCH')
          <div class="form-group">
              <label for="country_name">Product type CD:</label>
              <input type="text" class="form-control" name="product_type_cd" value="{{ $Product->product_type_cd }}"/>
          </div>
          <div class="form-group">
              <label for="country_name">Product type Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $Product->name }}"/>
          </div>
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>
  </div>
</div>
@endsection
