<?php
use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Core\Plugin;
use Cake\Event\EventManager;
use Cake\Log\Log;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;


collection((array)Configure::read('Google.config'))->each(function ($file) {
    Configure::load($file);
});