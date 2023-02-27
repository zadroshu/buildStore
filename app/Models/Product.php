<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Factories\HasFactory;
  use Illuminate\Database\Eloquent\Model;

  class Product extends Model
  {
    use HasFactory;

    protected $fillable = [
      'name',
      'category',
      'cost',
      'discount',
      'description',
      'images',
    ];

    public function orders()
    {
      return $this->belongsToMany(Order::class, 'product_order');
    }
  }
