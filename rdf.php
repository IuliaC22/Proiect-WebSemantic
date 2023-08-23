<?php
require 'vendor/autoload.php';

$JSONsosit = file_get_contents("php://input");
$data = json_decode($JSONsosit, true);
$titlu1 =  $data[0]['titlu'];
$price1 =  $data[0]['price'];
$titlu2 =  $data[1]['titlu'];
$price2 =  $data[1]['price'];
$titlu3 =  $data[2]['titlu'];
$price3 =  $data[2]['price'];
$titlu4 =  $data[3]['titlu'];
$price4 =  $data[3]['price'];

$graf=new EasyRdf\Graph("http://iulia.ro#grafNou2");
$prefixe=new EasyRdf\RdfNamespace();

$prefixe->setDefault("http://iulia.ro#");
$graf->addResource("Item1","schema:has","Titlu1");
$graf->addLiteral("Item1", "http://iulia.ro#titlu", "$titlu1");
$graf->addLiteral("Item1", "http://iulia.ro#price", "$price1");

$graf->addResource("Item2","schema:has","Titlu2");
$graf->addLiteral("Item2", "http://iulia.ro#titlu", "$titlu2");
$graf->addLiteral("Item2", "http://iulia.ro#price", "$price2");

$graf->addResource("Item3","schema:has","Titlu3");
$graf->addLiteral("Item3", "http://iulia.ro#titlu", "$titlu3");
$graf->addLiteral("Item3", "http://iulia.ro#price", "$price3");

$graf->addResource("Item4","schema:has","Titlu4");
$graf->addLiteral("Item4", "http://iulia.ro#titlu", "$titlu4");
$graf->addLiteral("Item4", "http://iulia.ro#price", "$price4");

$client=new EasyRdf\Sparql\Client("http://localhost:8080/rdf4j-server/repositories/grafexamen/statements");
$client->insert($graf,"http://iulia.ro#grafNou2");



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