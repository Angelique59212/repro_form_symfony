<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * List all available articles
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    #[Route('/', name: 'articles_list')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articleRepository->findAll();
        return $this->render('article/list.html.twig', [
           'articles' => $articleRepository->findAll(),
        ]);
    }


    #[Route('/article/add', name: 'article_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

//        On demande à la form d'hydrater l'objet article depuis le form si c possible
        $form->handleRequest($request);

//        Si le form a été soumis, et si valide alors on pt traiter

        if ($form->isSubmitted() && $form->isValid()) {
//            Prend en compte le nvl article
            $entityManager->persist($article);
//            Envoyer en bdd
            $entityManager->flush();
        }

        return $this->render('article/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

//    #[Route('/article/edit/{id}', name: 'article_edit')]
//    public function edit(Article $article, Request $request, EntityManagerInterface $entityManager): Response
//    {
//        return $this->add($request, $entityManager, $article);
//    }
}
