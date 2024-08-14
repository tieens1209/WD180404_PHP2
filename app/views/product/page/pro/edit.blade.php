@extends('layout.main')
@section('content')
    
    <form action="{{ route("edit-product/".$product->id) }}" method="POST" >
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="name" value="{{ $product->name }}"/></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" name="price" value="{{ $product->price }}"/></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="description" value="{{ $product->description }}"/></td>
            </tr>
            <tr>
                <td>Danh mục</td>
                <td>
                    <select name="id_category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->id_category ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><a class="btn btn-primary" href="{{ route('list-product') }}">Quay lại</a></td>
                <td><input type="submit" name="edit" value="Sửa" /></td>
            </tr>
        </table>
    </form>
@endsection
