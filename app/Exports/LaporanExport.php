<?php

namespace App\Exports;

use App\Models\Pesanan;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(Request $request): View
    {
        $search = '%'.$request->tcari.'%';
        if ($request->tcari) {
            $data['pesanan'] = Pesanan::where('tanggalpesanan','like',$search);
        }else{
            $data['pesanan'] = Pesanan::all();
        }
        return view('exports.invoice',$data);
    }
}
