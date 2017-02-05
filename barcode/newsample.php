<?PHP
include "barcode.class.php";


  $bc = new BarcodeI25();
  $bc->tipoRetorno = 1;
  $bc->SetCode("1049106247990000000030000000715628280000001500");
  $bc->Generate();

?>