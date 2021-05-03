<?php
namespace Ramos\Bot\Manager;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class TeamsManagerFactory
{

    public function getMatchEvents(Crawler $crawler, Client $client)
    {


        $res = $client->request('GET', 'https://www.hltv.org/matches');
        $html = $res->getBody();
        $crawler ->addHtmlContent($html);

        $elementsTeams = $crawler->filter('div.matchTeams.text-ellipsis');

        $arrayTeams = [];

        foreach ($elementsTeams as $elementTeam){
            $elementTeam = $elementTeam->textContent;
            $elementTeam = str_replace(' ', '', $elementTeam);
            $elementTeam = trim(preg_replace('/\s+/', ' ', $elementTeam));
            $arrayTeams[] = explode(' ', $elementTeam);
        }



        echo "Essas são as partidas em destaque" . PHP_EOL;
        for($i = 0; $i <= 4; $i++){
            echo  PHP_EOL . $arrayTeams[$i][0].' vs '.$arrayTeams[$i][1] . PHP_EOL;
        }



    }


}