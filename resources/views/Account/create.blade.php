@extends('layouts/app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add account data
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
      <form method="post" action="{{ route('account.store') }}">
          <div class="form-group">
              @csrf
              <label for="avail_balance">Available balance:</label>
              <input type="float" class="form-control" name="avail_balance"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="close_date">Close date</label>
              <input type="date" class="form-control" name="close_date"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="last_activity_date">Last activity date:</label>
              <input type="date" class="form-control" name="last_activity_date"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="open_date">Open date:</label>
              <input type="date" class="form-control" name="open_date"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="pending_balance">Pending balance:</label>
              <input type="float" class="form-control" name="pending_balance"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="status">Status:</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="cust_id">Customer:</label>
              <select class="form-select" name="cust_id">
              @foreach (\App\Models\Individual::all() as $type)
                      <option value="{{ $type->cust_id }}">{{ $type->first_name }} {{ $type->last_name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
              @csrf
              <label for="open_branch_id">Open branch id:</label>
              <input type="number" class="form-control" name="open_branch_id"/>
          </div><div class="form-group">
              @csrf
              <label for="open_emp_id">Open employee id:</label>
              <input type="number" class="form-control" name="open_emp_id"/>
          </div>
          <div class="form-group" style="margin-bottom: 15px;">
              @csrf
              <label for="cust_id">Product name:</label>
              <select class="form-select" name="product_cd">
                  @foreach (\App\Models\Product::all() as $type)
                      <option value="{{ $type->product_cd }}">{{ $type->name }}</option>
                  @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Add account</button>
      </form>
  </div>
</div>
@endsection
