<?php 

  include('../tcpdf/config/tcpdf_config.php');
  include('../tcpdf/tcpdf.php');

  class MYPDF extends TCPDF {
    
    public function Header() {
      $this->setJPEGQuality(90);
      $this->Image('./img/logo.png', 5, 75, 60, 0, 'PNG', '');
                  //              m-l, m-t, sizeX, sizeY, img-format,  
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