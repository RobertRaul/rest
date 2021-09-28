<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;


class MesasReportesController extends Controller
{
    private $fpdf;

    public function createPDF()
    {
        $this->fpdf = new Fpdf();
        $this->fpdf->AddPage();
        $this->fpdf->SetTitle("Reporte General de Mesas"); //titulo de la hoja

        $this->fpdf->SetFont('Arial','',10);

        $this->fpdf->Text(80, 10, "Reporte General de Mesas");

        $this->fpdf->Cell(40,10,'Hola, Mundo');
        $this->fpdf->Cell(70,10,'Hola, Mundo2');
        $this->fpdf->Cell(100,10,'Hola, Mundo3');
        $this->fpdf->Image(asset('/images/report_list/google_maps.png'),50,16,25,25);
        $this->fpdf->Output();
        exit;
    }

}
