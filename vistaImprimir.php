<?php
/*  ob_start();

  $content = ob_get_clean();*/
  $personas=simplexml_load_file("arrendatarios.xml");
  $cadena = "";
    foreach($personas as $persona)
    {
        $cadena .="Nombre: " . $persona->nombre. "<br>";
        $cadena .="Apellido: " . $persona->apellido. "<br>";
        $cadena .="RUT: " . $persona->rut."<br>";
        $cadena .="Tiempo de arriendo: " . $persona->tiempo."<br>";
        $cadena .="Monto $: " . $persona->monto."<br>";
        $cadena .="Dirección: " . $persona->direccion."<br>". "<br>";
    }
  require_once(dirname(__FILE__).'/vendor/autoload.php');
  use Spipu\Html2Pdf\Html2Pdf;
  try
  {
      $html2pdf = new Html2Pdf();
      $html2pdf->pdf->SetDisplayMode('fullpage');
      $html2pdf->writeHTML($cadena, isset($_GET['vuehtml']));
      $html2pdf->Output('PDF-CF.pdf');
  }
  catch(HTML2PDF_exception $e) {
      echo $e;
      exit;
  }