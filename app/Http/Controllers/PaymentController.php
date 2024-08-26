<?php

namespace App\Http\Controllers;

use App\Models\Kredit;
use App\Models\Pembayaran;
use App\Models\Penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index($penjualan_id)
    {
        $pembayarans = Kredit::where('penjualan_id', $penjualan_id)->get();
        return response()->json($pembayarans);
    }

    public function store(Request $request, $penjualan_id) 
    {
        $penjualan = Penjualan::find($penjualan_id);

        if (!$penjualan) {
            return response()->json(['message' => 'Penjualan tidak ditemukan'], 404);
        }

        $grandTotal = $penjualan->grand_total;

        // Jumlah cicilan yang diinginkan
        $jumlahCicilan = $request->input('jumlah_cicilan'); 
        $jumlahPerCicilan = $grandTotal / $jumlahCicilan;

        for ($i = 1; $i <= $jumlahCicilan; $i++) {
            Kredit::create([
                'penjualan_id' => $penjualan_id,
                'marketing_id' => $penjualan->marketing_id,
                'cicilan' => $i,
                'jatuh_tempo' => Carbon::now()->addMonths($i),
                'jumlah_yang_harus_dibayar' => $jumlahPerCicilan,
            ]);
        }

        return response()->json(['message' => 'Cicilan berhasil dibuat'], 201);
    }

    public function show($penjualan_id)
    {
        // Ambil semua cicilan yang terkait dengan penjualan_id
        $cicilans = Kredit::where('penjualan_id', $penjualan_id)->get();

        // Periksa apakah ada cicilan yang ditemukan
        if ($cicilans->isEmpty()) {
            return response()->json(['message' => 'Tidak ada cicilan ditemukan untuk penjualan ini'], 404);
        }

        return response()->json($cicilans, 200);
    }

    public function payment(Request $request, $kredit_id)
    {
        $kredit = Kredit::find($kredit_id);

        if (!$kredit) {
            return response()->json(['message' => 'Kredit tidak ditemukan'], 404);
        }

        $jumlahPembayaran = $request->input('jumlah_pembayaran');
        $metodePembayaran = $request->input('metode_pembayaran');

        if ($jumlahPembayaran >= $kredit->jumlah_yang_harus_dibayar) {
            $kredit->status_pembayaran = 'lunas';
            $kredit->save();
        }

        Pembayaran::create([
            'kredit_id' => $kredit_id,
            'jumlah_pembayaran' => $jumlahPembayaran,
            'tanggal_pembayaran' => now(),
            'metode_pembayaran' => $metodePembayaran,
        ]);


        return response()->json(['message' => 'Pembayaran berhasil dilakukan'], 201);
    }

    public function showPayment($kredit_id)
    {
        // Ambil semua pembayaran yang terkait dengan kredit_id
        $pembayaran = Pembayaran::where('kredit_id', $kredit_id)->get();

        // Periksa apakah ada pembayaran yang ditemukan
        if ($pembayaran->isEmpty()) {
            return response()->json(['message' => 'Tidak ada pembayaran ditemukan untuk cicilan ini'], 404);
        }

        return response()->json($pembayaran, 200);
    }
}
