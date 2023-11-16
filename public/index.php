<?php
declare(strict_types=1);
require_once  __DIR__."/../vendor/autoload.php";
use App\Controllers\MainController;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . "/../public/Views");
$twig = new Environment($loader);
echo $twig->render("index.twig", (new MainController())->index());
