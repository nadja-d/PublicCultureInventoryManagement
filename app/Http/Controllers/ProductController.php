<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        return view('product');
    }

    public function showOrder()
    {
        return view('order');
    }

    public function showEditProduct()
    {
        return view('edit-product');
    }

    public function showAddNewProduct()
    {
        return view('add-new-product');
    }

    public function viewDeleteProduct()
    {
        $products = Product::getAllProducts();
        return view('delete-product', compact('products'));
    }
    public function index()
    {
        $products = Product::getAllProducts();
        return view('product', compact('products'));
    }    

    public function search()
    {
        $products = Product::getAllProducts();
        return view('search-product', compact('products'));
    }    

    public function viewProduct(Request $request)
    {
        $productName = $request->input('searchProductName');
        $productAttributes = Product::getProductAttributesByName($productName);

        if (empty($productAttributes)) {
            abort(404, 'Product not found');
        }
        $product = $productAttributes[0];

        return view('edit-product', compact('product'));
    }
    
    public function createProduct(Request $request)
    {
        $productName = $request->input('productName');
        $stock = $request->input('stock');
        $description = $request->input('description');
        $price = $request->input('price');
        $productCategory = $request->input('productCategory');
        $productImage = $request->input('productImage');

        Product::createProduct($productName, $stock, $description, $price, $productCategory, $productImage);
        return redirect()->route('product');
    }

    public function searchProduct(Request $request)
    {
        $productName = $request->input('searchProductName');
        $productAttributes = Product::getProductAttributesByName($productName);

        return view('search-results', compact('productAttributes'));
    }

    public function updateProduct(Request $request)
    {
        $productID = $request->input('id');
        $productName = $request->input('productName');
        $stock = $request->input('stock');
        $description = $request->input('description');
        $price = $request->input('price');
        $productCategory = $request->input('productCategory');
        $productImage = $request->input('productImage');
    
        Product::updateProduct($productID, $productName, $stock, $description, $price, $productCategory, $productImage);
        return redirect()->route('product');
    }

    public function deleteProduct(Request $request)
    {
        $productID = $request->input('id');
        
        Product::deleteProduct($productID);
        return redirect()->route('product');
    }    
}