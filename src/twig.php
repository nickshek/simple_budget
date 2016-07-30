<?php

/* @var $app Silex\Application */
$app['twig'] = $app->extend('twig', function($twig, $app) {
    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use($app) {
        // implement whatever logic you need to determine the asset path
        return sprintf('%s%s',$app["simple_budget.base_url"] ,ltrim($asset, '/'));
    }));

    return $twig;
});
