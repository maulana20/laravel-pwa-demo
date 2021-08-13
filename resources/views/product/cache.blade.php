@extends('layouts.app')

@section('title', 'Product Cache')

@section('content')
<div class="product-pages">
    <div class="col-lg-10">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <h5><b>Product Cache</b></h5>
                    </div>
                    <div class="col-lg-6">
                        <form class="form-inline justify-content-end" action="" method="get">
                        <a class="btn col-lg-2 btn-primary-dws" onclick="sync()">Sync</a>
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
        
        (new idbTable('product')).getAll().then(function(products) {
            for (var i = 0; i < products.length; i++) {
                var product = products[i];
                var row = table.insertRow(-1);
                
                row.insertCell(0).innerHTML = i + 1
                row.insertCell(1).innerHTML = product.name
                row.insertCell(2).innerHTML = product.category_name
            }
        });
    }
    
    function sync() {
        if ('serviceWorker' in navigator && 'SyncManager' in window) {
            navigator.serviceWorker.ready.then(function(sw) {
                sw.sync.register('sync-product');
            });
        }
        
        location.href = '/product'
    }
    
    (function() {
        init();
    })();
</script>
@endsection
