<?php

require 'vendor/autoload.php';
$input3 = $_POST['input3'];
$client3=new EasyRdf\Sparql\Client("http://localhost:8080/rdf4j-server/repositories/grafexamen/statements");
$interogare = "
   DELETE WHERE {
  ?item <http://iulia.ro#titlu> \"$input3\" ;
        <http://iulia.ro#price> ?price .
}
";

$rezultat=$client3->update($interogare);


$client2=new EasyRdf\Sparql\Client("http://localhost:8080/rdf4j-server/repositories/grafexamen");
$interogare=" SELECT ?title ?price WHERE {
  ?item <http://iulia.ro#titlu> ?title ;
        <http://iulia.ro#price> ?price .
}
";
$rezultat=$client2->query($interogare);

foreach ($rezultat as $row) {
    $title = $row->title->getValue();
    $price = $row->price->getValue();

    $item = new stdClass();
    $item->titlu = $title;
    $item->price = $price;

    $data2[] = $item;
}
echo json_encode($data2);



?>

