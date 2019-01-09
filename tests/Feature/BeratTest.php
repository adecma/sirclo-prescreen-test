<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Berat;

class BeratTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * tes halaman index berat
     *
     * @return void
     */
    public function test_page_index()
    {
        $res = $this->get('berat');

        $res->assertStatus(200)
        ->assertViewIs('berat.index')
        ->assertSeeText('Index Data');
    }

    /**
     * tes halaman tambah berat
     *
     * @return void
     */
    public function test_page_create()
    {
        $res = $this->get('berat/create');

        $res->assertStatus(200)
        ->assertViewIs('berat.create')
        ->assertSeeText('Tambah Data');
    }

    /**
     * tes halaman edit berat
     *
     * @return void
     */
    public function test_page_edit()
    {
        $data = Berat::first();

        if(! is_null($data)) {
            $res = $this->get("berat/{$data->id}/edit");

            $res->assertStatus(200)
            ->assertViewIs('berat.edit')
            ->assertSeeText('Edit Data');
        }
    }

    /**
     * tes storing data
     *
     * @return void
     */
    public function test_store_data()
    {
        $data = [
            'tanggal' => '2018-01-01',
            'max' => 50,
            'min' => 40
        ];

        $this->json('post', '/berat', $data);

        $this->assertDatabaseHas('berat', $data);
    }

    /**
     * tes update data
     *
     * @return void
     */
    public function test_update_data()
    {
        $data = Berat::first();

        if(! is_null($data)) {
            $dummy = [
                'tanggal' => $data->tanggal,
                'max' => 40,
                'min' => 20,
            ];

            $this->json('put', "/berat/{$data->id}", $dummy);

            $this->assertDatabaseHas('berat', $dummy);
        }
    }

    /**
     * tes hapus data
     *
     * @return void
     */
    public function test_destroy_data()
    {
        $data = Berat::first();

        if(! is_null($data)) {
            $dummy = [
                'id' => $data->id,
                'tanggal' => $data->tanggal,
            ];

            $this->json('delete', "/berat/{$data->id}");

            $this->assertDatabaseMissing('berat', $dummy);
        }
    }
}
