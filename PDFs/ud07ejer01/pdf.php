<?php 

  include('../tcpdf/config/tcpdf_config.php');
  include('../tcpdf/tcpdf.php');

  class MYPDF extends TCPDF {
    
    public function Header() {
      $this->setJPEGQuality(90);
      $this->Image('./img/logo.png', 20, 15, 30, 0, 'PNG', '');
                  //              m-l, m-t, sizeX, sizeY, img-format,  
    }
    public function Footer() {
      $this->SetY(-15);
      $this->SetFont(PDF_FONT_NAME_MAIN, 'I', 8);
      $this->Cell(0, 10, 'Super Shop sl. Todos los derechos reservados pa lo que sea!', 0, false, 'C');
    }
    public function CreateTextBox($textval, $x = 0, $y, $width = 0,
                                  $height = 10, $fontsize = 10, 
                                  $fontstyle = '', $align = 'L') {
      $this->SetXY($x+20, $y); // 20 = margin left
      $this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
      $this->Cell($width, $height, $textval, 0, false, $align);
    }

  }

?>