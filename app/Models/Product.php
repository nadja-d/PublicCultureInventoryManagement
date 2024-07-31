<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products'; // pluralized table name

    protected $fillable = [
        'productID',
        'name',
        'stock',
        'description',
        'price',
        'productCategory', 
        'productImage', 
    ];

    protected $primaryKey = 'productID';

    public $timestamps = false;

    public static function getAllProducts()
    {
        $results = DB::select('CALL GetAllProducts()');
        
        return self::hydrate((array) $results);
    }
    
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
    }    

    public static function createProduct($name, $stock, $description, $price, $productCategory, $productImage)
    {
        return DB::select('CALL CreateProduct(?, ?, ?, ?, ?, ?)', [
            $name,
            $stock,
            $description,
            $price,
            $productCategory,
            $productImage
        ]);
    } 

    public static function getProductAttributesByName($productName)
    {
        $results = DB::select('CALL GetProductAttributesByName(?)', [$productName]);
        
        $products = [];
        foreach ($results as $result) {
            $products[] = new Product((array)$result);
        }

        return $products;
    }

    public static function deleteProduct($productID)
    {
        return DB::select('CALL DeleteProduct(?)', [$productID]);
    }

    public static function updateProduct($productID, $name, $stock, $description, $price, $productCategory, $productImage)
    {
        return DB::select('CALL UpdateProduct(?, ?, ?, ?, ?, ?, ?)', [
            $productID,
            $name,
            $stock,
            $description,
            $price,
            $productCategory,
            $productImage
        ]);
    }    
}