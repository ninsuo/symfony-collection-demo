<?php

$dir = getenv('PHP_CS_FIXER_DIR') ?: __DIR__ . '/src';

$finder = Symfony\Component\Finder\Finder::create()
    ->files()
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->in($dir)
    ->exclude('cache')
    ->exclude('logs')
    ->exclude('Resources')
    ->exclude('vendor')
;

return Symfony\CS\Config\Config::create()
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->fixers([
        // remove a few Symfony rules
        '-concat_without_spaces',
        '-phpdoc_short_description',
        '-pre_increment',
	'align_double_arrow',
	'align_equals',
        // add a few Contrib rules
        'concat_with_spaces',
        'newline_after_open_tag',
        'ordered_use',
        'phpdoc_order',
        'short_array_syntax'
    ])
    ->setUsingCache(true)
    ->setUsingLinter(false)
    ->finder($finder)
;