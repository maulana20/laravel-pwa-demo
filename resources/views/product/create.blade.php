@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="product-pages">
    <div class="col-lg-10">
        <div class="create-content my-4">
            <h4 class="mt-4 mb-5">Create Product</h4>
            <form id="createProduct" onsubmit="return false;">
                <input type="hidden" name="id" id="id">
                <div class="form-group row mb-4">
                    <label class="col-lg-3 col-form-label label-dsf-dws d-flex align-items-center">
                        Name &nbsp; <span class="text-danger"><b>*</b></span>
                    </label>
                    <div class="col-lg-6">
                        <input type="text" name="name" id="name" class="form-control shadow-none" placeholder="Product Name">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-lg-3 col-form-label label-dsf-dws d-flex align-items-center">
                        Category &nbsp; <span class="text-danger"><b>*</b></span>
                    </label>
                    <div class="col-lg-6">
                        <select class="form-control w-auto" name="category" id="category">
                        @foreach ($categories as $category => $index)
                            <option value="{{ $index }}">{{ $category }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group mt-5 m-0">
                    <input type="submit" id="btn_save" class="btn col-lg-2 btn-primary-dws" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.querySelector("#btn_save").addEventListener('click',function() {
        var id = document.querySelector("#id").value;
        var category = document.querySelector("#category").value;
        var product = {
            'id': id,
            'name': document.querySelector("#name").value,
            'category': category,
            'category_name': document.querySelector("#category").options[category - 1].innerHTML
        };

        if ('serviceWorker' in navigator && 'SyncManager' in window) {
            navigator.serviceWorker.ready.then(function(sw) {
                (new idbTable('product')).set(id, product).then(function() {
                    sw.sync.register('sync-product');
                });
            });
        } else {
            (new idbTable('product')).set(id, product);
        }
        
        alert('berhasil simpan');
        location.href = '/product'
    });
    (function() {
        (new idbTable('product')).count().then(res => document.querySelector("#id").value = res + 1)
    })();
</script>
@endsection
