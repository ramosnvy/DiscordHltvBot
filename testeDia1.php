<?php

require "vendor/autoload.php";


use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$crawler = new Crawler();
$client = new Client();

$res = $client->request('GET','https://www.hltv.org/matches');
$html =  $res->getBody();

$crawler->addHtmlContent($html);

$elementsInfo =$crawler->filter('div.matchTeams.text-ellipsis');

var_dump($elementsInfo);

$elementTeste = [];
foreach ($elementsInfo as $elementInfo) {
    $elementTeste[] = $elementInfo->textContent;
}


$teste = str_replace(' ', '', $elementTeste[0]);

$teste = trim(preg_replace('/\s+/', ' ', $teste));

$teste = explode(' ', $teste);

var_dump($teste);





    