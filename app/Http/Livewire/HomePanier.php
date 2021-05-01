<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomePanier extends Component
{
    public $panier = false;

    public $panierItems = [];

    protected $listeners = [
        'addItem'
    ];

    public function addItem($value)
    {
        $this->panierItems[] = $value;
    }

    public function togglePanier()
    {
        if ($this->panier) {
            $this->panier = false;
        }
        else {
            $this->panier = true;
        }
    }

    public function render()
    {
        return view('livewire.home-panier', [
            'products' => Product::get()
        ]);
    }
}
