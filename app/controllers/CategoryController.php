<?php

namespace App\Controllers;

use App\Models\Category;

class CategoryController extends BaseController
{
    public $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index(){
        $categories = $this->category->getCategories();
        return $this->render('product.page.cate.index', compact('categories'));
    }

    public function addCategory(){
        return $this->render('product.page.cate.add');
    }

    public function postCategory(){
        if(isset($_POST['add'])){
            $errors = [];
            if(empty($_POST['category_name'])){
                $errors [] = "Không được bỏ trống tên danh mục";
            }
            if(count($errors) > 0){
                flash('errors', $errors, 'add-category');
            } else {
                $result = $this->category->addCategory(null, $_POST['category_name']);
                if($result){
                    flash('success', 'Thêm mới thành công', 'list-category');
                }
            }
        }
    }

    public function detail($id){
        $category = $this->category->getDetailCategory($id);
        return $this->render('product.page.cate.edit', compact('category'));
    }

    public function editCategory($id){
        if(isset($_POST['edit'])){
            $errors = [];
            if(empty($_POST['category_name'])){
                $errors [] = "Không được bỏ trống tên danh mục";
            }
            if(count($errors) > 0){
                flash('errors', $errors, 'edit-category');
            } else {
                $result = $this->category->updateCategory($id, $_POST['category_name']);
                if($result){
                    flash('success', 'Sửa thành công', 'list-category');
                }
            }
        }
    }

    // public function deleteCategory($id){
    //     $result = $this->category->deleteCategory($id);
    //     if($result){
    //         flash('success', 'Xóa thành công', 'list-category');
    //     }
    // }
    public function deleteCategory($id){
        $productsLinked = $this->category->checkProductsLinked($id);
        $errors [] = "Không thể xóa danh mục này vì có sản phẩm liên kết với nó.";
        if ($productsLinked) {
            flash('errors', $errors, 'list-category');
        } else {
            $result = $this->category->deleteCategory($id);
            if($result){
                flash('success', 'Xóa danh mục thành công', 'list-category');
            }
        }
    }
}
