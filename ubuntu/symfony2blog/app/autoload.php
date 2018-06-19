<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationReader::addGlobalIgnoredName('author');
AnnotationRegistry::registerLoader(array($loader, 'loadClass'));

return $loader;
