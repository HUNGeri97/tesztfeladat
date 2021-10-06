<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\megrendeles;
use AppBundle\Entity\SzamlazasiCimek;
use AppBundle\Form\MegrendelesType;
use AppBundle\Form\MegrendelesNewType;
use AppBundle\Form\SzamlazasicimekType;

use Symfony\Component\HttpFoundation\Response;

class megrendelesController extends Controller
{
    /**
     * @Route("/megrendeles", name="megrendeles")
     */
    public function Megrendeles(Request $request)
    {
		$data = $this->getDoctrine()->getRepository('AppBundle:SzamlazasiCimek')->findAll();
        $form = $this->createForm(MegrendelesType::class);

		$form->handleRequest($request);
		if ($form->isSubmitted() && $form->isValid()) {
			$getData = $form->getData();
			if ($getData->getSzamlazasiId()!=null) {
                $entityManager = $this->getDoctrine()->getManager();
                $megrendeles = new megrendeles();
                $megrendeles->setSzamlazasiId($getData->getSzamlazasiId()->getId());
                $megrendeles->setAr('22847');
                $megrendeles->setCim($getData->getSzamlazasiId()->getTeljescim());

                $entityManager->persist($megrendeles);
                $entityManager->flush();

                return $this->redirectToRoute('megrendeles');
            }
		}
        $form2 = $this->createForm(MegrendelesNewType::class);
        $form2->handleRequest($request);
        $post = new SzamlazasiCimek();

        if ($form2->isSubmitted() && $form2->isValid()) {
            $entityManager2 = $this->getDoctrine()->getManager();
            $getData = $form2->getData();
            if ($getData->getType()!=null) {
                $em = $this->getDoctrine()->getManager();
                $post->setType($getData->getType());
                $post->setName($getData->getName());
                $post->setOrszag($getData->getOrszag());
                $post->setIranyitoszam($getData->getIranyitoszam());
                $post->setVaros($getData->getVaros());
                $post->setUtcahazszam($getData->getUtcahazszam());
                $post->setAdoszam($getData->getAdoszam());
                $post->setPhone($getData->getPhone());
                $post->setTeljescim($getData->getName() . ' - ' . $getData->getOrszag() . ' ' . $getData->getIranyitoszam() . ' ' . $getData->getVaros() . ' ' . $getData->getUtcahazszam());
                $em->persist($post);
                $em->flush();

                $megrendeles2 = new megrendeles();
                $megrendeles2->setSzamlazasiId($post->getId());
                $megrendeles2->setAr('22847');
                $megrendeles2->setCim($getData->getType() . ' ' . $getData->getName() . ' ' . $getData->getOrszag() . ' ' . $getData->getIranyitoszam() . ' ' . $getData->getVaros() . ' ' . $getData->getUtcahazszam() . ' ' . $getData->getAdoszam() . ' ' . $getData->getPhone());

                $entityManager2->persist($megrendeles2);
                $entityManager2->flush();

                return $this->redirectToRoute('megrendeles');
            }
        }

		return $this->render('megrendeles/megrendeles.html.twig', array(
			'form' => $form->createView(),
            'form2' => $form2->createView(),
			'data' => $data,
		));
    }

    /**
     * @Route("/megrendelesek", name="megrendelesek")
     */
    public function Megrendelesek(Request $request)
    {
        $data = $this->getDoctrine()->getRepository('AppBundle:megrendeles')->findAll();


        return $this->render('megrendeles/Megrendelesek.html.twig', array(
            'data' => $data,
        ));
    }
}
