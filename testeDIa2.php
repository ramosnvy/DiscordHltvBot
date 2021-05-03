<?php

require "vendor/autoload.php";
require "src/TeamsManagerFactory.php";


use GuzzleHttp\Client;

use Ramos\Bot\Manager\TeamsManagerFactory;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client();
$crawlerTeam = new Crawler();


$times = new TeamsManagerFactory();
$times ->getMatchEvents($crawlerTeam, $client);

