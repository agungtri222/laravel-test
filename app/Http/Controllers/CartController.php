<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;

class CartController extends Controller
{
    /** @var  ProductRepository */
    protected $productRespository;

    public function __construct(ProductRepository $productRespository) {
        $this->productRepository = $productRespository;
    }

    public function index()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = $this->productRepository->findWithoutFail($id)->first();

        if (empty($product)) {
            abort(404);
        }

        $cart = session()->get('cart');
    }
}
