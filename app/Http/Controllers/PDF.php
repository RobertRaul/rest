<?php
namespace App\Http\Controllers;
use Codedge\Fpdf\Fpdf\Fpdf;
//para fecha y hora
use Carbon\Carbon;

class PDF extends Fpdf
{
    public $dato;
    public function setTitulo($titulo)
    {
        $this->dato = $titulo;
    }

    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image(asset('/images/report_list/apple_logo.jpg'), 8, 3, 20); // X = HORIZONTAL  , Y = VERTICAL ,ANCHO ,  ALTO
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, $this->dato,  0, 0, 'C');
        //Letras Hora y Fecha
        $this->SetFont('Arial', '', 8);
        // Horas y Fecha
        $this->Cell(50);
        $this->Cell(0,0,"Fecha: " .Carbon::now()->format('d/m/Y'));

        // Satlto de Line par al Hora
        $this->Ln(4);
        // Movernos a la derecha para la hora
        $this->Cell(165);
        $this->Cell(80,0,"Hora: ". Carbon::now()->format('H:i:s'));
        // Salto de línea
        $this->Ln(14);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 9);
        // Número de página
        $this->Cell(30, 10, 'Av. La Cultura 1410', 0, 0, 'C');
        $this->Cell(0, 10, 'Usuario:' .'Admin', 0, 0, 'C');
        $this->Cell(0, 10, 'Pag.' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }


}
