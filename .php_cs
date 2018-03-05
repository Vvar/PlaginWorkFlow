<?php
$finder = PhpCsFixer\Finder::create()
    ->in('./config')
    ->in('./src')
    ->in('./test')
    ;
return PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'array_syntax' => ['syntax' => 'short'],
    ])
    ->setUsingCache(false)
    ->setFinder($finder);