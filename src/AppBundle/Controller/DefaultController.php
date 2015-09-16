<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Aanvraag;
use Swift_Attachment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue as RecaptchaTrue;


class DefaultController extends Controller
{

    public function indexAction(Request $request)
    {
        return $this->render('simpel/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    public function tarievenAction()
    {
        return $this->render('simpel/tarieven.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    public function verkoopAction(Request $request)
    {
        return $this->render('simpel/verkoop.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    public function dewerfAction(Request $request)
    {
        return $this->render('simpel/werf.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    public function bergingAction(Request $request)
    {

        // create a task and give it some dummy data for this example
        $aanvraag = new Aanvraag();

        $aanvraag->setDatumVanaf(new \DateTime('tomorrow'));
        $aanvraag->setDatumTot(new \DateTime('2016-06-01'));


        $form = $this->createFormBuilder($aanvraag)
            ->add('naam', 'text', array('attr' => array( 'class' => 'checkRequirement' )))
            ->add('voornaam', 'text', array('attr' => array( 'class' => 'checkRequirement' )))
            ->add('adres', 'text', array('required' => false))
            ->add('postcode', 'text', array('required' => false))
            ->add('plaats', 'text', array('required' => false))
            ->add('telefoon', 'text', array('attr' => array( 'class' => 'checkRequirement' )))
            ->add('email', 'email', array('attr' => array( 'class' => 'checkRequirement' )))
            ->add('naamShip', 'text', array('label' => 'Naam schip', 'attr' => array( 'class' => 'checkRequirement' )))
            ->add('typeShip', 'text', array('label' => 'Type schip', 'required' => false))
            ->add('lengteShip', 'text', array('label' => 'Lengte schip', 'attr' => array( 'class' => 'checkRequirement' )))
            ->add('breedteShip', 'text', array('label' => 'Breedte schip', 'attr' => array( 'class' => 'checkRequirement' )))
            ->add('datumVanaf', 'date', array(
                'input'  => 'datetime',
                'widget' => 'choice',
                'format' => 'dd MM yyyy',
                'attr' => array( 'class' => 'checkRequirement' )
            ))
            ->add('datumTot', 'date', array(
                'input'  => 'datetime',
                'widget' => 'choice',
                'format' => 'dd MM yyyy',
                'attr' => array( 'class' => 'checkRequirement' )
            ))
            ->add('opmerking', 'textarea', array('required' => false, 'label' => ' '))
            /*->add('recaptcha', 'ewz_recaptcha', array(
                'attr'        => array(
                    'options' => array(
                        'theme' => 'light',
                        'type'  => 'image'
                    )
                ),
                'mapped'      => false,
                'constraints' => array(
                    new RecaptchaTrue()
                )
            ))*/
            ->add('verzenden', 'submit', array('label' => 'Versturen'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            //send mail
            $message = \Swift_Message::newInstance()
                ->setSubject('Nieuwe aanvraag voor winterberging')
                ->setFrom('jillversluys@gmail.com')
                ->setTo('jillversluys@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/aanvraag.html.twig',
                        array('aanvraag' => $aanvraag)
                    ),
                    'text/html'
                );

            $this->get('mailer')->send($message);

            //send copy to owner
            $messageClient = \Swift_Message::newInstance()
                ->setSubject('Uw aanvraag voor winterberging bij Jachtbroker Oostkust')
                ->setFrom('jillversluys@gmail.com')
                ->setTo('jillversluys@gmail.com')
                ->setBody(
                    $this->renderView(
                        'Emails/aanvraag.html.twig',
                        array('aanvraag' => $aanvraag)
                    ),
                    'text/html'
                );


            $attachment = Swift_Attachment::fromPath('files/RSA_21stcenturyenlightment.pdf');

            // Attach it to the message
            //$messageClient->attach($attachment);

            $this->get('mailer')->send($messageClient);


            //display: thanks

            return $this->render('simpel/berging-aanvraag-ontvangen.html.twig', array(
                'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            ));
        }


        return $this->render('simpel/berging.html.twig', array(
            'form' => $form->createView(),
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));

    }

    public function contactAction()
    {
        return $this->render('simpel/contact.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }




}
