<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Http\Controllers\LSanPhamController;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class Thongke extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $result = LSanPhamController::thongke();
        return Chartisan::build()
            ->labels($result['TenLSP'])
            ->dataset('Two', $result['SoLuong']);
    }
}