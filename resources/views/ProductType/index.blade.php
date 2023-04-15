@extends('ProductType/layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
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
          <td>Product type code</td>
          <td>Product Name</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($Products as $Product)
        <tr>
            <td>{{$Product->product_type_cd}}</td>
            <td>{{$Product->name}}</td>
            </td>
            <td><a href="{{ route('productType.edit', $Product->product_type_cd)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('productType.destroy', $Product->product_type_cd)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
