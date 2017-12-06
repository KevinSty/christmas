<?php

/**
 * Created by PhpStorm.
 * User: kevin.diaz
 * Date: 06/12/17
 * Time: 09:01
 */
namespace App\Controller;

use App\Entity\Participant;
use App\Form\ParticipantType;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\DependencyInjection\Tests\Compiler\E;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller {


    /**
     * @Route(path="/", name="index")
     */
    public function listParticipant(Request $request, EntityManager $manager, EventDispatcherInterface $dispatcher) {

        $form = $this->createForm(Participant::class);
        $form->handleRequest($request);

        if() {

        }

    }

    /**
     * @Route(path="/show", name="participant_show")
     */
    public function showAction() {

        return $this->render('Participant/show.html.twig');
    }

    /**
     * @Route(path="/new", name="participant_new")
     */
    public function newAction(Request $request, NewArticleHandler $articleHandler) {

        // changer en != pour tester sans passer par un autre utilisateur
        if($this->getUser()->getRoles() == 'ROLE_AUTHOR') {

            $article = $this->get(\App\Entity\Article::class);
            $form = $this->createForm(ParticipantType::class);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $articleHandler->handle($article);

            }

            return $this->render('Article/new.html.twig', ['form' => $form->createView()]);
        }
    }

    /**
     * @Route(path="/update/{slug}", name="article_update")
     */
    public function updateAction() {
        // Seul les auteurs doivent avoir access.
        // Seul l'auteur de l'article peut le modifier
        if($this->getUser()->getRoles() == 'ROLE_AUTHOR') {
            return $this->render('Article/update.html.twig');
        }
    }
}
