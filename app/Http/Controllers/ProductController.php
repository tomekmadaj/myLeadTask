<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductData;
use App\Http\Requests\DeleteProductData;
use App\Http\Requests\UpdateProductData;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request)
    {
        $searchName = $request->get('searchName');
        $priceOrder = $request->get('priceOrder');
        in_array($priceOrder, ['ASC', 'DESC']) ?: $priceOrder = null;
        $productData = $this->productRepository->getProductsfilterBy($searchName, $priceOrder);

        $productData->appends(['searchName' => $searchName]);

        return view('product.list', [
            'products' => $productData,
            'searchName' => $searchName,
            'priceOrder' => $priceOrder
        ]);
    }

    public function show($productId)
    {
        $products = $this->productRepository->checkProducts();
        if (!in_array($productId, $products))
            return redirect()->route('product.list');

        return view('product.show', [
            'product' => $this->productRepository->getProduct($productId)
        ]);
    }

    public function editList()
    {
        $productsData = $this->productRepository->getProducts();
        return view('product.edit', ['products' => $productsData]);
    }

    public function add(AddProductData $request)
    {
        $data = $request->validated();
        $this->productRepository->addProduct($data);

        return redirect()->route('product.edit.list')->with('success', 'Product ' . $data['name'] .  ' has been added');
    }

    public function delete(DeleteProductData $request)
    {
        $data = $request->validated();
        $this->productRepository->deleteProduct($data['productId']);

        return redirect()->route('product.edit.list')->with('success', 'Product has been deleted');
    }

    public function edit($productId)
    {
        $products = $this->productRepository->checkProducts();
        if (!in_array($productId, $products))
            return redirect()->route('product.edit.list');

        return view('product.update', [
            'product' => $this->productRepository->getProduct($productId)
        ]);
    }

    public function update(UpdateProductData $request)
    {
        $data = $request->validated();

        $product = $this->productRepository->getProduct($data['productId']);
        $this->productRepository->updateProduct($product, $data);

        return redirect()->route('product.edit.list')->with('success', 'Product ' . $data['name'] .  ' has been updated');
    }
}
