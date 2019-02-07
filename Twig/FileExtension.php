<?php

namespace PunkAve\FileUploaderBundle\Twig;

use Symfony\Component\DependencyInjection\Container;
use Twig_Extension;
use Twig_SimpleFunction;

class FileExtension extends Twig_Extension
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getFunctions()
    {
        return [
            new Twig_SimpleFunction('punkave_get_files', [$this, 'getFiles']),
        ];
    }

    public function getFiles($folder)
    {
        return $this->container->get('punk_ave.file_uploader')->getFiles(array('folder' => $folder));
    }

    public function getName()
    {
        return 'punkave_file';
    }
}
