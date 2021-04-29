<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomePanier extends Component
{
    // public $products;

    public function render()
    {
        return view('livewire.home-panier', [
            'products' => Product::get()
        ]);
    }
}
