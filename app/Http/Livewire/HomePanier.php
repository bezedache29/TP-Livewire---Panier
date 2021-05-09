<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomePanier extends Component
{

    use WithPagination;

    public $panier = false;
    public $countItems = 0;
    public $panierItems = [];
    public $total = 0;
    public $addInProgress = false;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'addItem',
        'addAnotherOne',
        'removeAnotherOne',
        'newUserStock',
        'outOfStock',
        'stockOn'
    ];

    // Ajout d'une quantité de produit dans le panier car il y en a en stock + insere de l'info en session
    public function stockOn(Product $product)
    {
        $this->panierItems[$product->id]['outOfStock'] = false;

        $session = session()->get("panier.products");

        session()->forget('panier.products');

        $session[$product->id]['outOfStock'] = false;

        session(["panier.products" => $session]);

        $this->emit('panierItems', $this->panierItems);

        $this->emit('stockIsOn', $product->id);
    }

    // Pas d'ajout de quantité de produit dans le panier car pas de stock + insere de l'info en session
    public function outOfStock(Product $product)
    {
        $this->panierItems[$product->id]['outOfStock'] = true;

        $session = session()->get("panier.products");

        session()->forget('panier.products');

        $session[$product->id]['outOfStock'] = true;

        session(["panier.products" => $session]);

        $this->emit('panierItems', $this->panierItems);

        $this->emit('stockIsOut', $product->id);
    }

    // Ajout d'une quantité de produit dans le panier + insere en session
    public function newUserStock($userStock)
    {
        $id = $userStock['id'];
        $userNumber = $userStock['userNumber'];

        $product = Product::find($id);

        $this->panierItems[$id]['userNumber'] = $userNumber;

        session(["panier.products.{$id}" => [
            'id' => $id,
            'title' => $product->title,
            'price' => $product->price,
            'stock' => $product->stock,
            'userNumber' => $userNumber
        ]]);

        $this->emit('panierItems', $this->panierItems);

        $this->emit('changeUserStock', $userNumber);
    }

    // Increment le nombre total de produits & quantité
    public function incrementCountItems()
    {
        $this->countItems++;
    }

    // Décrement le nombre total de produits & quantité
    public function decrementCountItems()
    {
        if ($this->countItems > 0) {
            $this->countItems--;
        }
    }

    // Ajout de la première quantité de produit dans le panier + insere en session
    public function addItem(Product $product)
    {
        $product['userNumber'] = 1;
        $this->panierItems[$product->id] = $product;
        $this->total += $product->price;

        session(["panier.products.{$product->id}" => [
            'id' => $product->id,
            'title' => $product->title,
            'price' => $product->price,
            'stock' => $product->stock,
            'userNumber' => 1
        ]]);

        $this->emit('addOneItem', $product->id);

        $this->emit('panierItems', $this->panierItems);

        $this->emit('total', $this->total);

        // On increment de 1 le nombre d'items total
        $this->incrementCountItems();

        // On met en session le nb total de produit
        session()->put('panier.items', $this->countItems);

        // On met le total en session
        session()->put('panier.total', $this->total);
    }

    // Incrémente la quantité de produit dans le panier + insere en session
    public function addAnotherOne(Product $product)
    {
        $this->panierItems[$product->id]['userNumber']++;

        $this->emit('addUserStock', $product->id);

        $this->total += $product->price;

        $this->emit('total', $this->total);

        session()->put('panier.total', $this->total);

        session()->increment("panier.products.{$product->id}.userNumber");

        $this->incrementCountItems();

        session()->put('panier.items', $this->countItems);
    }

    // Enleve une quantité de produit au panier + insere info en session
    public function removeAnotherOne(Product $product)
    {

        $this->panierItems[$product->id]['userNumber']--;

        // Check si la quantité est a 0. Si oui on enleve le produit du panier et de la session
        if ($this->panierItems[$product->id]['userNumber'] == 0) {
            unset($this->panierItems[$product->id]);

            $session = session()->get("panier.products");

            session()->forget('panier.products');

            unset($session[$product->id]);

            session(["panier.products" => $session]);

            $this->emit('closeBtns', $product->id);

            $this->emit('panierItems', $this->panierItems);

        } else {

            $this->emit('addUserStock', $product->id);

            session()->decrement("panier.products.{$product->id}.userNumber");
        }

        $this->total -= $product->price;

        $this->emit('total', $this->total);

        session()->put('panier.total', $this->total);

        $this->decrementCountItems();

        session()->put('panier.items', $this->countItems);
        
    }

    // Sert a ouvrir ou fermer le panier
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

        if (session()->has('panier.products')) {
            $this->panierItems = session()->get('panier.products');
        }

        if (session()->has('panier.items')) {
            $this->countItems = session()->get('panier.items');
        }

        // session()->flush();

        return view('livewire.home-panier', [
            'products' => Product::paginate(4)
        ]);
    }
}
