<?php

namespace App\controllers;

use App\Models\Product;

class ProductController extends BaseController
{
    public $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index(){
        $products = $this->product->getProduct();
        $categories = $this->product->getCategory();
        return $this->render('product.page.pro.index', compact('products', 'categories'));
    }
    public function addProduct(){
        $listCategory = $this->product->getCategory();
        return $this->render('product.page.pro.add', compact('listCategory'));
    }
    public function postProduct(){
        if(isset($_POST['add'])){
            // tạo mNGR lỗi = rỗng
            $errors = [];
            if(empty($_POST['name'])){
                $errors [] = "Không được bỏ trống tên sp";
            }
            if(empty($_POST['price'])){
                $errors [] = "Không được bỏ trống giá sp";
            }
            if(empty($_POST['description'])){
                $errors [] = "Không được bỏ trống mota sp";
            }
            if(count($errors)>0){
                flash('errors', $errors, 'add-product');
            }
            else{
                $result = $this->product->addProduct(null,$_POST['name'],$_POST['price'],$_POST['description'],$_POST['id_category']);
                if($result){
                    flash('success', 'Thêm mới thành công', 'list-product');
                }
            }
        }
    }
    // sua san pham
    // lay chi tiet sp va chuyen sang form edit
    public function detail($id){
        $product = $this->product->getDetailProduct($id);
        $categories = $this->product->getCategory();
        return $this->render('product.page.pro.edit', compact('product', 'categories'));
    }
    public function editProduct($id){
        if(isset($_POST['edit'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors [] = "Không được bỏ trống tên sp";
            }
            if(empty($_POST['price'])){
                $errors [] = "Không được bỏ trống giá sp";
            }
            if(empty($_POST['description'])){
                $errors [] = "Không được bỏ trống mota sp";
            }
            if(count($errors)>0){
                flash('errors', $errors, 'add-product');
            }else{
            $result = $this->product->updateProduct($id,$_POST['name'],$_POST['price'],$_POST['description'],$_POST['id_category']);
                if($result){
                    flash('success', 'Sửa thành công', 'list-product');
                }
            }
        }
    }
    
    public function deleteProduct($id){
        $result = $this->product->deleteProduct($id);
                if($result){
                    flash('success', 'Xóa thành công', 'list-product');
                }
    }

}