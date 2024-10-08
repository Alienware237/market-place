<?php

namespace okpt\marketplace\project\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use okpt\marketplace\project\Services\ArticleManager;
use Psr\Log\LoggerInterface;

class IndexController extends AbstractController
{
    private ArticleManager $articleManager;
    private $logger;

    public function __construct(ArticleManager $articleManager, LoggerInterface $logger)
    {
        $this->articleManager = $articleManager;
        $this->logger = $logger;
    }

    #[Route('/index', name: 'app_index')]
    public function index(): Response
    {
        $allArticles = $this->articleManager->getAllArticles();

        //var_dump($allArticles);
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'articles' => $allArticles
        ]);
    }
}
