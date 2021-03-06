<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 19/03/18
 * Time: 14:59
 */

namespace App\Action;

use App\Forms\Products\Create as productCreate;
use App\Entity\Products;
use Aura\Router\Exception;
use Doctrine\ORM\EntityManager;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Hydrator\ClassMethods;

class ProductsDeleteAction implements MiddlewareInterface
{
    private $template;

    private $entityManager;
    private $router;

    /**
     * ProductsListAction constructor.
     * @param $template
     * @param $entityManager
     */
    public function __construct(RouterInterface $router, TemplateRendererInterface $template, EntityManager $entityManager)
    {
        $this->template = $template;
        $this->router = $router;
        $this->entityManager = $entityManager;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $repository = $this->entityManager->getRepository(Products::class);

        $dados = $repository->findOneBy(['id' => $request->getAttribute('id')]);

        $this->entityManager->remove($dados);
        $this->entityManager->flush();

        return new RedirectResponse($this->router->generateUri('products.list'));
        // TODO: Implement process() method.
    }


}