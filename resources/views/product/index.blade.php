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
            <table class="table table-bordered table-content" style="margin-bottom: 0px;">
                <thead>
                    <tr>
                        <th scope="col" class="text-center" width="50px">No</th>
                        <th scope="col" class="text-center">Position</th>
                        <th scope="col" class="text-center" width="200px">Location</th>
                        <th scope="col" class="text-center" width="120px">Action</th>
                    </tr>
                </thead>
                <tbody id="tablecontents">
                    <tr class="row1" data-id="">
                        <td class="bg-white">tes</td>
                        <td class="bg-white">test</td>
                        <td class="bg-white" width="200px">test</td>
                        <td class="bg-white" width="120px">test</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
