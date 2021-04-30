<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CardPanier extends Component
{

    public $product;

    public $isItemAdded = false;

    protected $listeners = [
        'closeBtns' 
    ];

    public function addItem(Product $product)
    {
        $this->isItemAdded = true;
    }

    public function closeBtns()
    {
        $this->isItemAdded = false;
    }

    public function render()
    {
        return view('livewire.card-panier', [
            'product' => Product::find($this->product->id)
        ]);
    }
}
