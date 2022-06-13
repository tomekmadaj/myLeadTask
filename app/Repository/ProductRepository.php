<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    private Product $productModel;

    public function __construct(Product $productModel)
    {
        $this->productModel = $productModel;
    }

    public function getProduct(int $productid): Product
    {
        return $this->productModel->with('price')->find($productid);
    }

    public function getProducts(int $limit = 10)
    {
        return $this->productModel->with('price')->orderByDesc('created_at')->paginate($limit);
    }

    public function getProductsfilterBy(?string $searchName = null, $priceOrder = null, $addOrder = 'DESC', int $limit = 9)
    {
        $query = $this->productModel->with('price');

        $priceOrder ? $query->orderByPrice($priceOrder) : $query->orderBy('created_at', $addOrder);

        if ($searchName)
            $query->whereRaw('name like ?', ["%$searchName%"]);

        return $query->paginate($limit);
    }

    public function checkProducts(): array
    {
        return array_column($this->productModel->all('id')->toArray(), 'id');
    }

    public function addProduct(array $data): void
    {
        if (!empty($data['image'])) {
            $path = $data['image']->store('products', 'public');
            $data['image'] = $path;
        }

        $product = $this->productModel;

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->image = $data['image'] ?? '';

        for ($i = 0; $i < 3; $i++) {
            if ($data['price' . $i + 1]) {
                $price[] = new Price(['price' => $data['price' . $i + 1]]);
            }
        }
        $product->save();
        $product->price()->saveMany($price);
    }

    public function updateProduct(Product $product, array $data): void
    {
        if (!empty($data['image'])) {
            $path = $data['image']->store('products', 'public');
            $data['image'] = $path;
            if ($path) {
                Storage::disk('public')->delete($product->image);
                $data['image'] = $path;
            }
        } else {
            $data['image'] = $this->productModel->find($data['productId'])->getImage();
        }

        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->image = $data['image'] ?? '';

        $price = $this->productModel->with('price')->find($data['productId'])->price;

        for ($i = 0; $i < 3; $i++) {
            if ($data['price' . $i + 1]) {
                if (array_key_exists($i, $price->toArray())) {
                    $price[$i]->price = $data['price' . $i + 1];
                } else {
                    $price->push(new Price(['price' => $data['price' . $i + 1]]));
                }
            } else {
                if (array_key_exists($i, $price->toArray())) {
                    $price[$i]->delete();
                    unset($price[$i]);
                }
            }
        }
        $product->save();
        $product->price()->saveMany($price);
    }

    public function deleteProduct(int $productId): void
    {
        $product = $this->productModel->with('price')->find($productId);
        $product->price()->delete();
        $product->delete();
    }
}
