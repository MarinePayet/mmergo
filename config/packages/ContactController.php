<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Map;

use Symfony\UX\Map\Bridge\Google\GoogleOptions;
use Symfony\UX\Map\Bridge\Google\Option\ControlPosition;
use Symfony\UX\Map\Bridge\Google\Option\FullscreenControlOptions;
use Symfony\UX\Map\Bridge\Google\Option\GestureHandling;
use Symfony\UX\Map\Bridge\Google\Option\MapTypeControlOptions;
use Symfony\UX\Map\Bridge\Google\Option\MapTypeControlStyle;
use Symfony\UX\Map\Bridge\Google\Option\StreetViewControlOptions;
use Symfony\UX\Map\Bridge\Google\Option\ZoomControlOptions;
use Symfony\UX\Map\Point;
use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\TileLayer;
use Symfony\UX\Map\InfoWindow;
use Symfony\UX\Map\Marker;


final class ContactController extends AbstractController{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
    
        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // QUAND LA PARTIE ENVOI DE MAIL SERA OPERATIONNELLE

            $email = (new Email())
            ->from('marine.payet3@gmail.com')
            ->to('marine.ulteam@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);

            $mail = $form->getData();
            // dd($mail);

            return $this->redirectToRoute('app_contact');
        }
        // $map = (new Map('default'))
        //     ->center(new Point(45.7534031, 4.8295061))
        //     ->zoom(6)

        //     ->addMarker(new Marker(
        //         position: new Point(45.7534031, 4.8295061),
        //         title: 'Lyon',
        //         infoWindow: new InfoWindow(
        //             content: '<p>Thank you <a href="https://github.com/Kocal">@Kocal</a> for this component!</p>',
        //         )
        //     ));

        // return $this->render('ux_packages/map.html.twig', [
            
        // ]);

        // $myMap = (new Map());

        // return $this->render('contact/index.html.twig', [
        //     'form' => $form,
        // ]);

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form,
            // 'map' => $map,
        ]);
    }
}
