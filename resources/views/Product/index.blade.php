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

  <div class="mb-3" style="display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: row;">
    <input type="text" id="searchInput" class="form-control" placeholder="Search">
    <img src="{{ asset('/img/search.png') }}" alt="" width="16px" class="searchImg" style="margin-left: -30px; opacity: 80%">

  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <td>Product Code</td>
        <td>Product Name</td>
        <td>Date Offered</td>
        <td>Date Retired</td>
        <td>Product Type</td>
        <td colspan="2">Action</td>
      </tr>
    </thead>
    <tbody>
      @foreach($Products as $Product)
      <tr>
        <td>{{$Product->product_cd}}</td>
        <td>{{$Product->name}}</td>
        <td>{{$Product->date_offered}}</td>
        <td>{{$Product->date_retired}}</td>
        <td>{{$Product->product_type_cd}}</td>
        <td>
          <a href="{{ route('product.edit', $Product->product_cd)}}" class="btn btn-primary">Edit</a>
        </td>
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
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  const searchInput = document.getElementById('searchInput');
  const tableBody = document.querySelector('tbody');

  searchInput.addEventListener('input', function(event) {
    const searchValue = event.target.value.trim().toLowerCase();

    axios.get(`/api/product/search?search=${searchValue}`)
      .then(function(response) {
        const products = response.data;
        console.log(response);

        tableBody.innerHTML = '';

        products.forEach(function(product) {
          const row = document.createElement('tr');

          const productCode = document.createElement('td');
          productCode.textContent = product.product_cd;
          row.appendChild(productCode);

          const productName = document.createElement('td');
          productName.textContent = product.name;
          row.appendChild(productName);

          const dateOffered = document.createElement('td');
          dateOffered.textContent = product.date_offered;
          row.appendChild(dateOffered);

          const dateRetired = document.createElement('td');
          dateRetired.textContent = product.date_retired;
          row.appendChild(dateRetired);

          const productType = document.createElement('td');
          productType.textContent = product.product_type_cd;
          row.appendChild(productType);

          const editButton = document.createElement('td');
          const editLink = document.createElement('a');
          editLink.href = `/product/edit/${product.product_cd}`;
          editLink.className = 'btn btn-primary';
          editLink.textContent = 'Edit';
          editButton.appendChild(editLink);
          row.appendChild(editButton);

          const deleteButton = document.createElement('td');
          const deleteForm = document.createElement('form');
          deleteForm.action = `/product/destroy/${product.product_cd}`;
          deleteForm.method = 'post';
          deleteForm.innerHTML = `
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
          `;
          deleteButton.appendChild(deleteForm);
          row.appendChild(deleteButton);

          tableBody.appendChild(row);
        });
      })
      .catch(function(error) {
        console.log(error);
        console.error(error);
      });
  });
</script>
<style>
  #searchInput {
        border: 1px solid black;
        border-radius: 4px;
        padding: 6px 20px;
    }
</style>
@endsection
