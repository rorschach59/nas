<?php

require '../controller/SubscribeController.php';
use Controller\SubscribeController;

$subscribe = new SubscribeController();
$subscribe->showIndex();