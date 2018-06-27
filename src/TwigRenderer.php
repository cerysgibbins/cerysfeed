<?php

namespace CerysFeed;

use \Twig_Loader_Filesystem as Twig_Loader_Filesystem;
use \Twig_Environment as Twig_Environment;

class TwigRenderer implements Renderer
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../templates');
        $this->twig = new Twig_Environment($loader, []);
    }

    public function render($statuses) 
    {
        $template = $this->twig->load('index.twig');
        foreach($statuses as &$status){
            $status['tweet'] = $this->convertURLsToLinks($status['tweet']);
        }

        return $template->render([
            'statuses' => $statuses,
        ]);
    }

    private function convertURLsToLinks($string)
    {
        $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
        return preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $string);
    }
}
