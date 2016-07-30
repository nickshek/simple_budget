<?php

/* @var $app Silex\Application */

$app["locale"] = "zh-HK";
$app["twig.path"] = __DIR__."/../views";
$app["twig.options"] = array("cache" => __DIR__."/../cache");

$app["simple_budget.file.path"] = __DIR__."/../data";
$app["simple_budget.default.currency"] = "HKD";
$app["simple_budget.base_url"] = "http://localhost/";
