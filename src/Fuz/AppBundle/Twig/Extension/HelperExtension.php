<?php

namespace Fuz\AppBundle\Twig\Extension;

class HelperExtension extends \Twig_Extension
{
    protected $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('github', [$this, 'github'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('tabs', [$this, 'tabs'], ['is_safe' => ['html']]),
        ];
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('md5', 'md5', ['is_safe' => ['html']]),
        ];
    }

    public function github($files)
    {
        return $this->twig->render('FuzAppBundle::github.html.twig', [
            'paths' => $this->_getPaths($files),
        ]);
    }

    public function tabs($files)
    {
        $basedir  = realpath(__DIR__.'/../../');
        $tabs = [];
        foreach ($this->_getPaths($files) as $file) {
            $tabs[$file] = file_get_contents($basedir.'/'.$file);
        }

        return $this->twig->render('FuzAppBundle::tabs.html.twig', [
            'tabs' => $tabs,
        ]);
    }

    protected function _getPaths($files)
    {
        $paths = [];
        foreach ($files as $file)
        {
            $basedir  = realpath(__DIR__.'/../../');
            $realpath = realpath($basedir.'/'.$file);

            if (!is_file($realpath)) {
                throw new \LogicException("File {$file} not found");
            }

           $paths[] = substr($realpath, strlen($basedir) + 1);
        }
        sort($paths);

        return $paths;
    }

    public function getName()
    {
        return 'helper';
    }
}
