<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Marketing;

class CommissionController extends Controller
{
    public function index()
    {
        $marketings = Marketing::all();
        $result = [];

        foreach ($marketings as $marketing) {
            $penjualans = Penjualan::where('marketing_id', $marketing->id)
                ->selectRaw('SUM(grand_total) as omzet, MONTH(date) as month')
                ->groupBy('month')
                ->get();

            foreach ($penjualans as $penjualan) {
                $Persenankomisi = $this->getCommissionPercentage($penjualan->omzet);
                $Nominalkomisi = $penjualan->omzet * ($Persenankomisi / 100);

                $result[] = [
                    'Marketing' => $marketing->name,
                    'Bulan' => date('F', mktime(0, 0, 0, $penjualan->month, 10)),
                    'Omzet' => $penjualan->omzet,
                    'Komisi %' => $Persenankomisi,
                    'Komisi Nominal' => $Nominalkomisi,
                ];
            }
        }

        return response()->json($result);
    }

    private function getCommissionPercentage($omzet)
    {
        if ($omzet >= 500000000) {
            return 10;
        } elseif ($omzet >= 200000000) {
            return 5;
        } elseif ($omzet >= 100000000) {
            return 2.5;
        } else {
            return 0;
        }
    }
}
