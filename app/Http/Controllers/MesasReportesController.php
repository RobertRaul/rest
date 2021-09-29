<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PDF;
use App\Models\Mesa;

class MesasReportesController extends Controller
{
    public function createPDF()
    {
        $pdf = new PDF();
        $pdf->SetTitle('Reporte General de Mesas');
        $pdf->setTitulo("Reporte General de Mesas");
        $pdf->AliasNbPages();
        $pdf->AddPage();

        // RECUPERAR DATOS
        $lista = Mesa::where('mes_estado', 'Activo')
            ->orderBy('mes_id')
            ->take(10)
            ->get();

        $header = array('ID', 'Numero', 'Nro Sillas', 'Estado');

        // Colores, ancho de línea y fuente en negrita
        $pdf->SetFillColor(255, 0, 0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(.3);
        $pdf->SetFont('', 'B');
        // Movernos a la derecha
        $pdf->Cell(30);
        // Cabecera
        $w = array(20, 35, 45, 40);
        for ($i = 0; $i < count($header); $i++)
            $pdf->Cell($w[$i], 6, $header[$i], 1, 0, 'C', true);
        $pdf->Ln();
        // Restauración de colores y fuentes
        $pdf->SetFillColor(224, 235, 255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');

        // Datos
        $fill = false;
        foreach ($lista as $row) {
            // Movernos a la derecha
            $pdf->Cell(30);
            $pdf->Cell($w[0], 6, $row['mes_id'], 'LR', 0, 'C', $fill); // $ALIGN: C=CENTER , L = LEFT , R = RIGHT
            $pdf->Cell($w[1], 6, $row['mes_numero'], 'LR', 0, 'C', $fill);
            $pdf->Cell($w[2], 6, $row['mes_sillas'], 'LR', 0, 'C', $fill);
            $pdf->Cell($w[3], 6, $row['mes_estado'], 'LR', 0, 'C', $fill);
            $pdf->Ln();
            $fill = !$fill;
        }
        // Movernos a la derecha
        $pdf->Cell(30);
        // Línea de cierre
        $pdf->Cell(array_sum($w), 0, '', 'T');

        $pdf->Output();
        exit;
    }

    // Tabla coloreada
    function FancyTable($header, $data)
    {
    }
}
