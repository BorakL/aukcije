<?php
namespace App\Controllers;
class CategoryController extends \App\Core\Controller{
    public function show($id){
        $categoryModel = new \App\Models\CategoryModel($this->getDatabaseConnection());
        $category = $categoryModel->getById($id);

        if(!$category){
            header('Location: /tairApp');
            exit;
        }

        $this->set("category",$category);
    
        $auctionModel = new \App\Models\AuctionModel($this->getDatabaseConnection());
        $auctionsInCategory = $auctionModel->getAllByFieldName("category_id",$id);
        $this->set('auctionsInCategory',$auctionsInCategory);
    }
}