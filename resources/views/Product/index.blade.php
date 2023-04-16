@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  td {
    text-align: center;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>Product Code</td>
          <td>Product Name</td>
          <td>Date Offered</td>
          <td>Date Retired</td>
          <td>Product Type Code </td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->product_cd }}</td>
            <td>{{$Product->name}}</td>
            <td>{{$Product->date_offered}}</td>
            <td>{{$Product->date_retired}}</td>
            <td>{{$Product->product_type_cd }}</td>
            </td>
            <td><a href="{{ route('product.edit', $Product->product_cd)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('product.destroy', $Product->product_cd)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <div style="display: flex; justify-content: center">
  <a href="{{ url('product/create')}}" class="btn btn-secondary">Create</a>
  </div>
<div>
@endsection
