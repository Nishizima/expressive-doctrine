<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 19/03/18
 * Time: 15:05
 */

namespace App\Action;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class ProductsDeleteFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router = $container->get(RouterInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        $entityManager = $container->get(EntityManager::class);

        return new ProductsDeleteAction($router, $template,$entityManager);

        // TODO: Implement __invoke() method.
    }
}