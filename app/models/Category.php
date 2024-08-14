<?php

namespace App\Models;

class Category extends BaseModel{
    protected $table = 'category';

    public function getCategories(){
        $sql = "SELECT * FROM $this->table ORDER BY id ASC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function addCategory($id, $category_name){
        $sql = "INSERT INTO $this->table (id, category_name) VALUES (?, ?)";
        $this->setQuery($sql);
        return $this->execute([$id, $category_name]);
    }

    public function getDetailCategory($id){
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateCategory($id, $category_name){
        $sql = "UPDATE $this->table SET category_name = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$category_name, $id]);
    }

    public function deleteCategory($id){
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
    public function checkProductsLinked($categoryId)
    {
        $sql = "SELECT COUNT(*) as count FROM product WHERE id_category = ?";
        $this->setQuery($sql);
        $result = $this->loadRow([$categoryId]);
        return $result->count > 0;
    }
}
