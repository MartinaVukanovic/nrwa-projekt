@extends('layouts.app')

@section('content')
<div class="bankInfo-container">
    <h1>Bank Informations</h1>
    <h2>
        Products
    </h2>
    <div style="display: flex; justify-content: center; align-items: center; flex-direction: column">
        <h5>Search products (and their following types)</h5>
        <div>
            <input type="text" id="searchInput" placeholder="Search products">
            <img src="{{ asset('/img/search.png') }}" alt="" width="16px" class="searchImg" style="margin-left: -30px; opacity: 80%">
        </div>
    </div>
    
    <div id="productsDiv">
    </div>
    
    

    
<div id="bankInformationDiv">

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    axios.get('/api/bankInformations')
    .then(function(response) {
        var { products, productTypes,  officers } = response.data[0];
        var bankInformationDiv = document.getElementById('bankInformationDiv');
        var productsDiv = document.getElementById('productsDiv');
        let filteredProductTypes = [];

        var renderProducts = function(filteredProducts) {
            productsDiv.innerHTML = '';

            filteredProducts.forEach(function(product) {
                filteredProductTypes.push(product.product_type_cd)
                productsDiv.innerHTML += '<div>' + product.name + '</div>';
            });
        };

        var renderProductTypes = function() {
            bankInformationDiv.innerHTML = '<h2>Product Types </h2>';
            productTypes.forEach(function(productType) {
                console.log('productType');
                if (filteredProductTypes.includes(productType.product_type_cd)) {
                    console.log(filteredProductTypes, productType.product_type_cd, true);
                    bankInformationDiv.innerHTML += '<div>' + productType.name + ' (' + productType.product_type_cd + ')' + '</div>';
                }
            });

            filteredProductTypes = [];
        };

        var renderOfficers = function() {
            bankInformationDiv.innerHTML += '<h2>Officers</h2>';
            officers.forEach(function(product) {
                bankInformationDiv.innerHTML += '<div>' + product.first_name + ' ' + product.last_name + '</div>';
            });
        };

        renderProducts(products);
        renderProductTypes();
        renderOfficers();

        
        var searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function(event) {
            var searchTerm = event.target.value.toLowerCase();
            var filteredProducts = products.filter(function(product) {
                return product.name.toLowerCase().includes(searchTerm);
            });
            renderProducts(filteredProducts);
            renderProductTypes();
        });
    })
    .catch(function(error) {
        console.log('Error:', error);
    });
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;800&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Poppins', sans-serif;
    }
    .bankInfo-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    #productsDiv {
        display: flex;
        align-items: center;
        flex-direction: column;
        margin: 12px 0px -6px 0px;
        overflow-y: scroll;
        padding: 0px 50px;
        height: 150px;
    }
    #searchInput {
        border: 1px solid black;
        border-radius: 4px;
        padding: 4px 20px;
        margin-top: 10px;
    }

    #bankInformationDiv {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    h1 {
        position: absolute;
        top: 20px;
        font-weight: 600;
        margin: 0px !important;
    }
    h2 {
        font-weight: 600;
        margin: 20px 0px 2px 0px;
    }
</style>
@endsection
