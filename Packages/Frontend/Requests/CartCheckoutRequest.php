<?php
namespace Packages\Frontend\Requests;
use Illuminate\Http\Request;
use Packages\Core\Requests\CoreFormRequest;
use Packages\Frontend\Custom\Services\CartServices;
use Packages\Product\Custom\Services\ProductServices;
use Illuminate\Support\Facades\Validator;

class CartCheckoutRequest extends CoreFormRequest
{
    public function rules()
    {
        return [
            'shipping_address'  => 'required|min:5',
            'customer_phone'  => 'required|min:5',
            'customer_name'  => 'required|min:3',
        ];
    }

    public function afterPasses(){
        $cartServices = app()->make(CartServices::class);
        $cartItems = $cartServices->all();
        if($cartServices->count() <= 0){
            exit;
        }

        $result = [];
        $prodServices = app()->make(ProductServices::class);
        foreach ($cartItems as $item){
            $product = $prodServices->get($item->id);
            $p = [];
            $p['product_id'] = $item->id;
            $p['price'] = $product->price;
            $p['sale_price'] = $product->sale_price;
            $p['quantity'] = $item->qty;
            $result[]= $p;
        }

        $this->merge(['products' => $result]);
        $this->merge(['title' => 'Checkout from '. request()['customer_name']]);
        $this->merge(['tax' => config()]);
        $validator = Validator::make($result, [
            'products.*.quantity'  => 'required|numeric|min:1',
            'products.*.product_id'  => 'required|exists:products,id',
        ]);



        if($validator->fails()){
            exit;
        }


    }

}