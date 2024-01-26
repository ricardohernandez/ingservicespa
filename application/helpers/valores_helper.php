<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 function imprimirUF($mes_usr, $anio){

  $contenido = file_get_contents("http://www.sii.cl/valores_y_fechas/uf/uf".$anio.".htm");
  $dom = new DOMDocument;
  $dom->loadHTML($contenido);
  $tables = $dom->getElementById('table_export');

  foreach($dom->getElementById('table_export')->getElementsByTagName("tr") as $meses => $tr){
    foreach($tr->getElementsByTagName('td') as $dias => $td){
      $valores_por_mes[$dias][$meses] = $td->nodeValue;
    }
  }
  
  $array_uf = array();
  foreach($valores_por_mes as $meses => $arreglo_dias){
    
    $mes = intval($meses+1);
    if(strlen($mes)==1){ 
      $mes = "0".$mes; 
    }else{ 
      $mes; 
    }   
    
    foreach($arreglo_dias as $dias => $valor){      
      if($mes == $mes_usr || $mes_usr == 13){     
        if (strpos($valor,'.') !== false) {         
          if(strlen($dias)==1){ $dias = "0".$dias; }else{ $dias; }
          $fecha = $dias."-".$mes."-".$anio;
          $array_uf[$fecha] = $valor;
        }       
      }
    }   
  } 

  $hoy=date("d-m-Y");
  return $array_uf[$hoy];
  
  /*echo $array_uf[$hoy];
  echo json_encode($array_uf);*/
}

/* End of file csv_helper.php */
/* Location: ./system/helpers/csv_helper.php */