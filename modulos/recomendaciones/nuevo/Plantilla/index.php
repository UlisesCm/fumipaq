<?php

function getDatosCliente($TitulosThTablaArray, $datodos){
//<label> variable :  '. $phpvariable[0] .' </label>
  $phpvariable=$TitulosThTablaArray;
  $datoscliente='<div id="detalles" class="clearfix">
    <div id="client">

      <h2 class="name">ALPASA FARMS S DE RL DE CV </h2>
      <div class="address">Niño artillero No. 54 col. casa dle niño</div>
      <div class="email"><a href="mailto:miguel@example.com">miguel@example.com</a></div>
    </div>
      <div id="Datosgenerales">
      <div id="">REPORTE DE PRODUCTOS Y PLAGUICIDA UTILIZADOS</div>
        <div class="notice">Folio: 878</div>
      </div>
      </div>




    </div>';

    return $datoscliente;
}

function getTablaDatos($TitulosThTablaArray, $ContenidoTdTablaArray){

  $arraytitulos_num = count($TitulosThTablaArray);
  for ($i = 0; $i < $arraytitulos_num; ++$i){
    $titulostabla=$titulostabla.'
              <th class="service">'.$TitulosThTablaArray[$i].'</th>';
    }


$auxtd=0;
    $arraycontenido_num = count($ContenidoTdTablaArray);
    for ($i = 0; $i < $arraycontenido_num; ++$i){
      if($auxtd<=0){

        $contenidotabla=$contenidotabla.'
                <tr>
                <td class="desc">'.$ContenidoTdTablaArray[$i].'</td>
                </tr>';
                $auxtd=$auxtd+1;
      }

      if($auxtd<$arraytitulos_num){
        $contenidotabla=$contenidotabla.'
                  <td class="desc">'.$ContenidoTdTablaArray[$i+1].'</td> ';
                $auxtd=$auxtd+1;
      }else{
          $auxtd=0;
      }



      }


  $tabladatos='
  <table>
        <thead>
          <tr>
          '.$titulostabla.'
          </tr>
        </thead>
        <tbody>

            '.$contenidotabla.'

          <tr>
            <td colspan="5">SUBTOTAL</td>
            <td class="total">$5,200.00</td>
          </tr>
          <tr>
            <td colspan="5">IVA 16%</td>
            <td class="total">$1,300.00</td>
          </tr>
          <tr>
            <td colspan="5" class="grand total">TOTAL</td>
            <td class="grand total">$6,500.00</td>
          </tr>

        </tbody>
      </table>

<div id="firmacliente">
  <div class="firmaclientes">___________________________</div>
  <div>Firma de conformidad del cliente</div>
</div>

';

    return $tabladatos;
}


?>
