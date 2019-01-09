<?php

/**
 * library cart
 * soal kedua : https://gist.github.com/fandywie/12323549d2f8c202853018118b6054a7
 */

namespace App\Repositories;

class Cart
{
    private $cart;

    /**
     * initial data
     * 
     * @return void
     */
    public function __construct()
    {
        $this->cart = collect([]);
    }

    /**
     * tambah produk
     */
    public function tambahProduk($name, $qty)
    {
        $name = strtoupper($name);
        $qty = intval($qty);

        // menghentikan jika qty == 0
        if($qty === 0) {
            return $this;
        }

        // cek data produk, apakah store atau update
        $check = $this->cart->first(function($produk) use($name) {
            return $produk[0] === $name;
        });

        if(is_null($check)) {
            // storing
            $this->cart->push([$name, $qty]);
        } else {
            // update
            $this->cart = $this->cart->map(function($produk) use($name, $qty) {
                if($produk[0] === $name) {
                    $produk[1] = $produk[1] + $qty;
                }

                return $produk;
            });
        }
        
        return $this;
    }

    /**
     * hapus produk
     */
    public function hapusProduk($name)
    {
        $name = strtoupper($name);

        $this->cart = $this->cart->reject(function($produk) use($name) {
            return $produk[0] === $name;
        });

        return $this;
    }

    public function myCart()
    {
        return $this->cart;
    }

    public function tampilkanCart()
    {
        return $this->cart->map(function($produk) {
            return $produk[0] . ' (' . $produk[1] . ')';
        })->toArray();
    }
}