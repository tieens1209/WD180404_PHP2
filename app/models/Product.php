<?php 

namespace App\Models;

class Product extends BaseModel{
    protected $table = 'product';
    protected $cate = 'category';
    // lấy danh sách sản phẩm
    public function getProduct(){
        // $sql = "SELECT * FROM $this->table";
        $sql = "SELECT pr.id, pr.name, pr.price, pr.description, ct.category_name FROM $this->table AS pr
                INNER JOIN $this->cate AS ct ON pr.id_category = ct.id ORDER BY pr.id ASC";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function getCategory(){
        $sql = "SELECT * FROM $this->cate";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    // thêm sp
    public function addProduct($id,$name,$price,$description,$id_category){
        $sql = "INSERT INTO $this->table value(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$price,$description,$id_category]);
    }

    // sua sp
    // lay chi tiet cua 1 san pham
    public function getDetailProduct($id){
        $sql = "SELECT pr.id, pr.name, pr.price, pr.description, ct.category_name, pr.id_category FROM $this->table AS pr
                INNER JOIN $this->cate AS ct ON pr.id_category = ct.id WHERE pr.id =?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    //khoi tao ham sua
    public function updateProduct($id, $name, $price, $description, $id_category){
        $sql = "UPDATE $this->table SET name=? , price=? , description=?, id_category=? where id=?";
        $this->setQuery($sql);
        return $this->execute([ $name, $price, $description, $id_category, $id]);
    }

    // xoa san pham
    public function deleteProduct($id){
        $sql = "DELETE FROM $this->table WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);

    }

    
}