@extends('layout.main')
@section('content')

    <form action="{{ route('post-category') }}" method="POST" >
        <table>
            <tr>
                <td>Tên danh mục</td>
                <td><input type="text" name="category_name" /></td>
            </tr>
            
            <tr>
                <td><a class="btn btn-primary" href="{{ route('list-category') }}">Quay lại</a></td>
                <td><input type="submit" name="add" value="Thêm" /></td>
            </tr>
        </table>
    </form>
@endsection
