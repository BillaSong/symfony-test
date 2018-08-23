<?php

namespace App\Controller;

use App\Entity\Messages;
use App\Repository\MessagesRepository;
use App\Service\MessageGenerator;
use Doctrine\ORM\EntityManager;
use http\Url;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewTestController extends Controller
{
    /** @var MessageGenerator */
    protected $message;

    /** @var MessagesRepository  */
    protected $messageRepo;

    public function __construct(
        MessageGenerator $messageGenerator,
        MessagesRepository $messagesRepository
    ) {
        $this->message = $messageGenerator;
        $this->messageRepo = $messagesRepository;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('main.html.twig', ['messages' => $this->messageRepo->findAll()]);
    }

    /**
     * @Route("/create", name="new_message", methods="GET|POST")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create()
    {
        $m = $this->message->getHappyMessage();
        $entityManager = $this->getDoctrine()->getManager();

        $messages = new Messages();
        $messages->setMessage($m);
        $messages->setUrl('homepage');

        $entityManager->persist($messages);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
    }

    /**
     * Delete random message
     * @Route("/destroy", name="delete_message", methods="GET|DELETE")
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function destroy() {
        $message = $this->messageRepo->getRandomField();
        if(!empty($message)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($message);
            $entityManager->flush();
        }

        return $this->redirectToRoute('homepage');
    }
}
