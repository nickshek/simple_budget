<?php

/* @var $app Silex\Application */
$app->match('/', "budget.controller.index:index")->bind('homepage');
