<?php

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Session;

require __DIR__.'/vendor/autoload.php';

$driver = new Selenium2Driver('chrome');
$session = new Session($driver);
$session->start();

$session->visit('http://jurassicpark.wikia.com');
echo "Current URL: ".$session->getCurrentUrl() . "\n";

$page = $session->getPage();
echo "First 75 chars: ".substr($page->getText() , 0, 75) . "\n";

$header = $page->find('css', '.wds-community-header__sitename a');
echo "The wiki site name is: ". $header->getText() . "\n";

$subNav = $page->find('css', '.wds-tabs');
$linkEl = $subNav->find('css', 'li a');
echo "The link text is: ". $linkEl->getText() . "\n";

$linkEl = $page->findLink('Books');
echo "The link href is: ". $linkEl->getAttribute('href') . "\n";

$linkEl->click();
echo "Page URL after click: ". $session->getCurrentUrl() . "\n";

$session->stop();
