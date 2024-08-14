@extends('layout.main')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Category List</h1>
    <a class="btn btn-primary" href="{{ route('add-category') }}">Thêm</a>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" width=150>Id</th>
                <th class="text-center" width=300>Name</th>
                <td class="text-center" width=300>Hành động</td>
            </tr>
        </thead>
        <tbody>
         
                @foreach ($categories as $category)
                <tr>
                    <td class="text-center">{{ $category->id }}</td>
                    <td class="text-center">{{ $category->category_name }}</td>
                    <td class="text-center">
                        <a class="btn btn-warning" href="{{ route('detail-category/'.$category->id) }}">Sửa</a>
                        <a class="btn btn-danger" href="{{ route('delete-category/'.$category->id) }}">Xóa</a>
                    </td>
                </tr>
                @endforeach
            
        </tbody>
    </table>
</div>
@endsection
