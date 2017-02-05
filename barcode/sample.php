<?PHP
include "barcode.class";

echo "<HTML>";

  $bc = new BarcodeI25();

  $bc->SetCode("12345678901234567890123456789012345678904444");
  $bc->Generate();
echo "</HTML>";
?>