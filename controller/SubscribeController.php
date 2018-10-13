<?php

class SubscribeController extends DefaultController
{
    public static function index()
    {
        $data = array('subscribe.php');
        $subscribe = array('variable subscribe');
        $subscrib = array('variable subscrib');
        return DefaultController::show('subscribe', compact('data','subscribe','subscrib'));
    }
}