<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Datatables;
use App\Berat;

class SourceDataController extends Controller
{
    /**
     * membuat response json dari data berat
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function berat()
    {
        $data = Datatables::eloquent(
            Berat::query()
            ->selectRaw("berat.*, (berat.max - berat.min) as perbedaan")
        );

        $data->editColumn('tanggal', function($data) {
            return '<a href="' . route('berat.show', $data->id) . '">' . $data->tanggal . '</a>';
        });

        $data->addColumn('aksi', function($data) {
            $url['urlForm'] = route('berat.destroy', $data->id);
            $url['urlEdit'] = route('berat.edit', $data->id);
            $url['id'] = $data->id;

            return view('template.partial._aksi', [
                'data' => $url
            ])->render();
        });
        
        return $data->make(true);
    }
}
