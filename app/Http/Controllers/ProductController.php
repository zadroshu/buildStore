<?php

  namespace App\Http\Controllers;

  use App\ModelsProduct;
  use App\Models\Product;
  use Illuminate\Http\Request;
  use Inertia\Inertia;

  class ProductController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return Inertia::render('Store/Index', [
        'products' => Product::all(),
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
        'img' => 'nullable|string|max:255',
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
    public function show($id)
    {
      return Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $product = Product::find($id);

      $validate = $request->validate([
        'name' => 'required|string|max:191',
        'category' => 'required|int',
        'cost' => 'required|int',
        'discount' => 'required|int',
        'description' => 'required|string|max:1000',
        'img' => 'nullable|string|max:255',
      ]);

      $product->name = $validate['name'];
      $product->category = $validate['category'];
      $product->cost = $validate['cost'];
      $product->discount = $validate['discount'];
      $product->description = $validate['description'];
      $product->img = $validate['img'];


      $product->save();
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
