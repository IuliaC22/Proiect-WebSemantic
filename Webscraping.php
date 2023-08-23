<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://books.toscrape.com/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$htmlString = curl_exec($ch);
curl_close($ch);

libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);


$titles = $xpath->evaluate('//ol[@class="row"]//li//article//h3/a');
$prices = $xpath->evaluate('//ol[@class="row"]//li//article//div[@class="product_price"]//p[@class="price_color"]');


$firstThreeTitles = array();
$firstThreePrices = array();


for ($i = 0; $i < count($titles) && $i < 3; $i++) {
    $firstThreeTitles[] = $titles[$i];
    $firstThreePrices[] = $prices[$i];
}


for ($i = 0; $i < count($firstThreeTitles); $i++) {
    echo $firstThreeTitles[$i]->textContent . ' @ '. $firstThreePrices[$i]->textContent.PHP_EOL;
}
?>
