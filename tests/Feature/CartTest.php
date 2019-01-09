<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Repositories\Cart;

class CartTest extends TestCase
{
    /**
     * tes library Cart - tambah produk
     *
     * @return void
     */
    public function test_tambah_produk()
    {
        $this->assertEquals(
            $this->defaultDataCart(), 
            $this->cart()->myCart()
                ->toArray()
        );
    }

    /**
     * tes library Cart - hapus produk
     *
     * @return void
     */
    public function test_hapus_produk()
    {
        $this->assertNotEquals(
            $this->defaultDataCart(),
            $this->cart()->hapusProduk($this->produk())
                ->myCart()
                ->toArray()
        );
    }

    /**
     * initial data produk
     *
     * @return string
     */
    private function produk()
    {
        return 'KAOS';
    }

    /**
     * initial data qty
     *
     * @return integer
     */
    private function qty()
    {
        return 4;
    }

    /**
     * default data produk
     *
     * @return array
     */
    public function defaultDataCart()
    {
        return [
            [$this->produk(), $this->qty()],
        ];
    }

    /**
     * buat instance class Cart dan menambah produk
     *
     * @return \App\Repositories\Cart
     */
    private function cart()
    {
        $cart = (new Cart)->tambahProduk(
            $this->produk(), 
            $this->qty()
        );

        return $cart;
    }
}
