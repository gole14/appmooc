<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    // Incluimos el archivo fpdf
    //ini_set("session.auto_start", 0);
    require_once(APPPATH."/third_party/fpdf/fpdf.php");
    //$this->load->library('fpdf');
    
    //Extendemos la clase Pdf de la clase fpdf para que herede todas sus variables y funciones
    class Pdf extends FPDF {
        public function __construct() {
            parent::__construct();
        }
        // El encabezado del PDF
        public function Header(){
            $this->Image('assets/images/logo.png',10,8,22);
            $this->SetFont('Arial','B',13);
            $this->Cell(30);
            $this->Cell(120,10,'MOOC APP',0,0,'C');
            $this->Ln('5');
            $this->SetFont('Arial','B',8);
            $this->Cell(30);
            $this->Cell(120,10,'USUARIOS REGISTRADOS EN LA BASE DE DATOS',0,0,'C');
            $this->Ln(20);
       }
       // El pie del pdf
       public function Footer(){
           $this->SetY(-15);
           $this->SetFont('Arial','I',8);
           $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
      }
    }
?>;