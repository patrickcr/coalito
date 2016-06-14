<?php

namespace App\Http\Controllers;

use App\Product;

use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    private $products = null;

    public function __construct()
    {
        $this->init_products();
    }

    public function show()
    {

        return view('products');
    }

    public function init_products()
    {
        $this->products = new Collection();


        if (Storage::disk('local')->exists('products.json')) {
            $products_file = Storage::disk('local')->get('products.json');
            $products_file = json_decode($products_file);
            if(count($products_file) > 0) {
                foreach ($products_file as $product_data) {
                    $product = new Product();
                    $product->id = $product_data->id;
                    $product->name = $product_data->name;
                    $product->quantity = $product_data->quantity;
                    $product->price = $product_data->price;
                    $product->submited = $product_data->submited;
                    $product->credit = $product_data->credit;

                    $this->products->add($product);

                }
            }
        }


    }


    public function index()
    {
        return $this->products->sortByDesc('submited')->values()->toJson();
    }

    public function newId()
    {
        return $this->products->count() + 1;
    }

    public function save(Request $request)
    {
        if ( $request->has("product")) {

            $product = $request->product;

            if($product["id"] > 0)
            {
                $exisint_product = $this->products->where("id", intval($product['id']))->first();
                $exisint_product->name = $product["name"];
                $exisint_product->credit = doubleval($product["credit"]);
                $exisint_product->quantity = doubleval($product["quantity"]);
                $exisint_product->price = doubleval($product["price"]);

            }
            else {

                $new_product = new Product();
                $new_product->fill($product);
                $new_product->id = $this->newId();
                $this->products->add($new_product);
            }
              $this->saveProducsToFile();
        }
    }

    public function saveProducsToFile()
    {
        Storage::disk('local')->put('products.json', $this->products->toJson());
    }
}
