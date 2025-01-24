<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class MailerController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(MailerInterface $mailer, Request $request): Response
    {
        $description = $request->request->get('description');
        $email = $request->request->get('email');
        $name = $request->request->get('name');
        $num = $request->request->get('num');

        $email = (new Email())
        ->from('carmatchriviera@gmail.com')
        ->to('contact@carmatchriviera.fr')
            ->subject('Prise de contact - Site WEB')
            ->html('<p>Nom :'.$name.'</p>'.'<br/><p>Email :'.$email.'</p>'.'<p>Numéro :'.$num.'</p>'.'<br/><p>Message : </p>'.$description);

        $mailer->send($email);

        return new Response('Email sent successfully!', Response::HTTP_OK);

    }

    #[Route('/searchRequest')]
    public function sendSearchEmail(MailerInterface $mailer, Request $request): Response
    {
        $title = $request->request->get('title');
        $modele = $request->request->get('modele');
        $Argument = $request->request->get('Argument');
        $AnneeMin = $request->request->get('AnnéeMin');
        $AnneeMax = $request->request->get('AnnéeMax');
        $Carburant = $request->request->get('Carburant');
        $description = $request->request->get('description');
        $Transmission = $request->request->get('Transmission');
        $Kilo = $request->request->get('Kilo');
        $Place = $request->request->get('Place');
        $Prix = $request->request->get('Prix');
        $Garantie = $request->request->get('Garantie');
        $email = $request->request->get('email');
        $name = $request->request->get('name');
        $num = $request->request->get('num');

        $email = (new Email())
            ->from('carmatchriviera@gmail.com')
            ->to('contact@carmatchriviera.fr')
            ->subject('RECHERHCE PERSONNALISEE - NOUVELLE DEMANDE')
            ->html(
                '<p>Nom :'.$name.'</p>'.'<br/>
                <p>Email :'.$email.'</p>'.'<br/>
                <p>Numéro :'.$num.'</p>'.'<br/>
                <p>Marque :'.$title.'</p>'.'<br/>
                <p>Modele :'.$modele.'</p>'.'<br/>
                <p>Année Min :'.$AnneeMin.'</p>'.'<br/>
                <p>Année Max :'.$AnneeMax.'</p>'.'<br/>
                <p>Carburant :'.$Carburant.'</p>'.'<br/>
                <p>Garantie :'.$Garantie.'</p>'.'<br/>
                <p>Kilometrage :'.$Kilo.'</p>'.'<br/>
                <p>Transmission :'.$Transmission.'</p>'.'<br/>
                <p>Budget :'.$Prix.'</p>'.'<br/>'
            );

            $mailer->send($email);

        return new Response('Email sent successfully!', Response::HTTP_OK);

    }
}