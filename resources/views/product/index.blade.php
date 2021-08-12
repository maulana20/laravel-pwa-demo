@extends('layouts.app')

@section('title', 'Product List')

@section('content')
<div class="product-pages">
    <div class="col-lg-10">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <h5><b>Product List</b></h5>
                    </div>
                    <div class="col-lg-6">
                        <form class="form-inline justify-content-end" action="" method="get">
                        <a href="{{ route('admin.product.create') }}" class="btn col-lg-2 btn-primary-dws">Add</a>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-content" style="margin-bottom: 0px;" id="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" width="50px">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody id="tablecontents">
                    <tr class="row1"></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function init() {
        var table = document.getElementById("table");
        
        fetch("{{url('/api/product')}}", { method: 'GET', headers: { 'Content-Type':'application/json', 'Accept':'application/json' } }).then(function(response) {
            const contentType = response.headers.get("content-type");
            if (contentType && contentType.indexOf("application/json") !== -1) {
                response.json().then(function(res) {
                    if (res.success == true) {
                        for (var i = 0; i < res.data.length; i++) {
                            var product = res.data[i];
                            var row = table.insertRow(-1);
                            
                            row.insertCell(0).innerHTML = i + 1
                            row.insertCell(1).innerHTML = product.name
                            row.insertCell(2).innerHTML = product.category
                        }
                    }
                });
            } else {
                console.log("response not json")
            }
        }).catch(function(err) {
            console.log("error " + err);
        });
    }
    
    (function() {
        init();
    })();
</script>
@endsection
