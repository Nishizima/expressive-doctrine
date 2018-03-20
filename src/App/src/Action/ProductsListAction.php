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
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Hydrator\ClassMethods;

class ProductsListAction implements MiddlewareInterface
{
    private $template;

    private $entityManager;

    /**
     * ProductsListAction constructor.
     * @param $template
     * @param $entityManager
     */
    public function __construct(TemplateRendererInterface $template, EntityManager $entityManager)
    {
        $this->template = $template;
        $this->entityManager = $entityManager;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $form = new productCreate();
        $form->setHydrator(new ClassMethods());
        $form->bind(new Products());



        $repository = $this->entityManager->getRepository(Products::class);
        $products = $repository->findAll();


        return new HtmlResponse($this->template->render('app::products-list',['form'=>$form,'products'=>$products]));
        // TODO: Implement process() method.
    }


}