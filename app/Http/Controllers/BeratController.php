<?php

/**
 * crud berat
 * soal ketiga : https://gist.github.com/fandywie/c895e83afb2faa829116696d9a09ddbe
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berat;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BeratRequest;
use Illuminate\Support\Facades\DB;

class BeratController extends Controller
{
    /**
     * handling invalid configure database or forget migration
     * 
     * @return void 
     */
    public function __construct()
    {
        try{
            DB::getPdo();
            DB::table('berat')->count();
        }catch(\Exception $e) {
            abort(404, 'Mohon konfigurasi dan migrate database SQLite Anda');
        }    
    }

    public function index()
    {
        $rataRata = Berat::selectRaw("avg(max) as avg_max, avg(min) as avg_min, avg(max-min) as avg_perbedaan")->first();

        return view('berat.index', compact('rataRata'));
    }

    public function create()
    {
        return view('berat.create');
    }

    public function store(BeratRequest $req)
    {
        $req->save();

        return redirect()->route('berat.index')
        ->with('alert_type', 'success')
        ->with('alert_title', 'Berhasil')
        ->with('alert_message', 'Data telah tersimpan');
    }

    public function show(Berat $berat)
    {
        return view('berat.show', compact('berat'));
    }

    public function edit(Berat $berat)
    {
        return view('berat.edit', compact('berat'));
    }

    public function update(BeratRequest $req, Berat $berat)
    {
        $req->save();

        return redirect()->route('berat.index')
        ->with('alert_type', 'success')
        ->with('alert_title', 'Berhasil')
        ->with('alert_message', 'Data telah diperbaharui');
    }

    public function destroy(Request $req, Berat $berat)
    {
        $berat->delete();

        return redirect()->route('berat.index')
        ->with('alert_type', 'success')
        ->with('alert_title', 'Berhasil')
        ->with('alert_message', 'Data telah dihapus');
    }
}
