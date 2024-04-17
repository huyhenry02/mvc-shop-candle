@extends('admin.layouts.main')
@section('content')
    <div class="body-wrapper">
        @include('admin.layouts.auth')
        <!--  Header End -->
        <div class="container-fluid">
            <div class="table-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-heading">
                            <h5>Sản phẩm / <strong>Danh sách</strong></h5>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center mb-2">
                        <a href="{{route('admin.product.create')}}" class="btn btn-secondary add-button">Thêm Sản phẩm</a>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="row" width="20%">Mô tả</th>
                        <th scope="col">Ảnh</th>
                        <th scope="row">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{number_format($product->price, 0, ',', '.')}} VNĐ</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <img src="{{ asset('storage/products/' . $product->id . '/' . $product->images) }}" alt="" width="100">
                            </td>
                            <td>
                                <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-primary">Sửa</a>
                                <a href="{{route('admin.product.destroy', $product->id)}}" class="btn btn-danger">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
