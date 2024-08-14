@extends('layout.main')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Product List</h1>
    <a class="btn btn-primary" href="{{ route('add-product') }}">Thêm</a>
    
    <table class="table table-striped table-bordered">
        
        <thead class="thead-dark">
            <tr>
                <th class="text-center"width=150>Id</th>
                <th class="text-center"width=300>Name</th>
                <th class="text-center"width=300>Price</th>
                <th class="text-center"width=300>Description</th>
                <th class="text-center"width=300>Category</th>
                <td class="text-center"width=300>Hành động</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td class="text-center">{{ $product->id }}</td>
                <td class="text-center">{{ $product->name }}</td>
                <td class="text-center">{{ $product->price }}</td>
                <td class="text-center">{{ $product->description }}</td>
                <td class="text-center">{{ $product->category_name ?? " "}}</td>
                <td class="text-center">

                    <a class="btn btn-warning" href="{{ route('detail-product/'.$product->id) }}">Sửa</a>
                    <a class="btn btn-danger" href="{{ route('delete-product/'.$product->id) }}">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
