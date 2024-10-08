<?php

namespace okpt\marketplace\project\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use okpt\marketplace\project\Services\ArticleManager;
use Psr\Log\LoggerInterface;

class ArticleController extends AbstractController
{
    private LoggerInterface $logger;
    private $entityManager;

    private ArticleManager $articleManager;

    public function __construct(LoggerInterface $logger, ArticleManager $articleManager, EntityManagerInterface $entityManager)
    {
        $this->logger = $logger;
        $this->entityManager = $entityManager;
        $this->articleManager = $articleManager;
    }

    #[Route('/article-detail/{id}', name: 'article_detail')]
    public function articleDetail($id)
    {

        $article = $this->articleManager->getArticleById($id);

        return $this->render('article/article-detail.html.twig', [
            'controller_name' => 'CartController',
            'article' => $article,
        ]);
    }
}
