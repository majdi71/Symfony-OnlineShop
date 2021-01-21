<?php

namespace App\Controller;

use App\Entity\Checkout;
use App\Form\CheckoutformType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CheckoutController extends AbstractController
{
    /**
     * @Route("/checkout", name="checkout")
     */
    public function index(Request $request): Response
    {
        $checkout = new Checkout();
        $form = $this->createForm(CheckoutformType::class, $checkout);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($checkout);
            $em->flush();

            return $this->redirectToRoute('index');
        }
        return $this->render('checkout/index.html.twig', [
            "form" => $form->createView(),
        ]);
    }
}
