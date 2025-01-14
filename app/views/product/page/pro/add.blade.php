@extends('layout.main')
@section('content')
    
    <form action="{{ route('post-product') }}" method="POST">
        <table>
            <tr>
                <td>Tên sản phẩm</td>
                <td><input type="text" name="name" value=""/></td>
            </tr>
            <tr>
                <td>Đơn giá</td>
                <td><input type="text" name="price" value=""/></td>
            </tr>
            <tr>
                <td>Mô tả</td>
                <td><input type="text" name="description" value=""/></td>
            </tr>
            <tr>
                <td>Danh Mục</td>
                <td>
                    <select class="form-select" id="id_category" name="id_category">
                        <?php foreach ($listCategory as $valueCT){ ?>
                            <option value="<?php echo $valueCT->id ?>"><?php echo $valueCT->category_name ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><a class="btn btn-primary" href="{{ route('list-product') }}">Quay lại</a></td>
                <td><input type="submit" name="add" value="Thêm" /></td>
            </tr>
        </table>
    </form>
@endsection