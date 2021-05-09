<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CardPanier extends Component
{

    public $product;
    public $isItemAdded = false;

    protected $listeners = [
        'closeBtns'
    ];

    // Ajout de la première quantité du produit
    public function addProduct()
    {
        $this->isItemAdded = true;
        $this->emit('addItem', $this->product);
    }

    // N'affiche plus les boutons pour decrementer ou incrementer ainsi que l'input
    public function closeBtns($id)
    {
        if ($this->product->id == $id) {
            $this->isItemAdded = false;
        }
    }

    public function render()
    {

        if (session()->has('panier.products')) {
            foreach (session()->get('panier.products') as $product) {
                if ($product['id'] == $this->product->id) {
                    $this->isItemAdded = true;
                }
            }
        }

        return view('livewire.card-panier');
    }
}
