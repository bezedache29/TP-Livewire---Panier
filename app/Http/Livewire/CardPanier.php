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

    public function addProduct(Product $product)
    {
        $this->isItemAdded = true;
        $this->emit('addItem', $product);
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
