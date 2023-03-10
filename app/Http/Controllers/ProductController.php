<?php

  namespace App\Http\Controllers;

  use App\ModelsProduct;
  use App\Models\Product;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\DB;
  use Inertia\Inertia;
  use Ramsey\Uuid\Type\Integer;

  class ProductController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::paginate(12);

      return Inertia::render('Store/Index', [
        'products' => $products
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validate = $request->validate([
        'name' => 'required|string|max:191',
        'category' => 'required|int',
        'cost' => 'required|int',
        'discount' => 'required|int',
        'description' => 'required|string|max:1000',
        'images' => 'nullable|string|max:255',
        'in_stock' => 'required|int',
      ]);

      $product = new Product($validate);
      $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {

    }

    public function addToCart($id)
    {
      $product = Product::findOrFail($id);

      $cart = session()->get('cart', []);

      if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
      } else {
        $cart[$id] = [
          "product_id" => $product->id,
          "quantity" => 1,
        ];
      }

      session()->put('cart', $cart);
    }

    public function getCart()
    {
      $cart = session()->get('cart', []);
      $keys = array_keys($cart);


      $products = Product::findMany($keys);


      return Inertia::render('Store/Cart', [
        'products' => $products,
      ]);
    }

    public function deleteFromCart($id)
    {
      $cart = session()->get('cart');
      if (($key = array_search($id, $cart)) !== false) {
        unset($cart[$key]);
      }
      session()->put('cart', $cart);

      return Inertia::$cart;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

      $validated = $request->validate([
        'name' => 'required|string|max:191',
        'category' => 'required|int',
        'cost' => 'required|int',
        'discount' => 'required|int',
        'description' => 'required|string|max:1000',
        'images' => 'nullable|string|max:255',
        'in_stock' => 'required|int',
      ]);

      $product->update($validated);

      return redirect(route('Store/Index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      //
    }

  }
