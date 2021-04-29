<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CardPanier extends Component
{

    public $product;

    public function render()
    {
        return view('livewire.card-panier', [
            'product' => Product::find($this->product->id)
        ]);
    }
}
