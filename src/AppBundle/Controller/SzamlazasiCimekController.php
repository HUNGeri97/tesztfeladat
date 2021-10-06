<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use AppBundle\Entity\SzamlazasiCimek;
use AppBundle\Form\SzamlazasicimekType;
use AppBundle\Form\EditSzamlazasicimekType;

use Symfony\Component\HttpFoundation\Response;

class SzamlazasiCimekController extends Controller
{
    /**
     * @Route("/cimek", name="newcimek")
     */
    public function NewSzamlazasicim(Request $request)
    {
		$form = $this->createForm(SzamlazasicimekType::class);
			
		$form->handleRequest($request);
        $post = new SzamlazasiCimek();
		$data = $this->getDoctrine()
            ->getRepository('AppBundle:SzamlazasiCimek')
            ->findAll();
		
		if ($form->isSubmitted() && $form->isValid()) {
            $getData = $form->getData();
			$em = $this->getDoctrine()->getManager();
            $post->setType($getData->getType());
            $post->setName($getData->getName());
            $post->setOrszag($getData->getOrszag());
            $post->setIranyitoszam($getData->getIranyitoszam());
            $post->setVaros($getData->getVaros());
            $post->setUtcahazszam($getData->getUtcahazszam());
            $post->setAdoszam($getData->getAdoszam());
            $post->setPhone($getData->getPhone());
            $post->setTeljescim($getData->getName().' - '.$getData->getOrszag().' '.$getData->getIranyitoszam().' '.$getData->getVaros().' '.$getData->getUtcahazszam());
			$em->persist($post);
            $em->flush();
			//var_dump($getData->getName());
            return $this->redirectToRoute('newcimek');
		}
		
		return $this->render('szamlazasicimek/szamlazasicimek.html.twig', array(
			'form' => $form->createView(),
			'data' => $data,
		));
    }
	
    /**
     * @Route("/cimek/edit/{id}")
     */
    public function EditSzamlazasicim(Request $request, SzamlazasiCimek $genus)
    {
		$form = $this->createForm(EditSzamlazasicimekType::class, $genus);
        $post = new SzamlazasiCimek();
        $form->handleRequest($request);
        $data = $this->getDoctrine()
            ->getRepository('AppBundle:SzamlazasiCimek')
            ->findAll();
        if ($form->isSubmitted() && $form->isValid()) {
            $genus = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $post->setType($genus->getType());
            $post->setName($genus->getName());
            $post->setOrszag($genus->getOrszag());
            $post->setIranyitoszam($genus->getIranyitoszam());
            $post->setVaros($genus->getVaros());
            $post->setUtcahazszam($genus->getUtcahazszam());
            $post->setAdoszam($genus->getAdoszam());
            $post->setPhone($genus->getPhone());
            $post->setTeljescim($genus->getName().' - '.$genus->getOrszag().' '.$genus->getIranyitoszam().' '.$genus->getVaros().' '.$genus->getUtcahazszam());
            //$em->persist($post);
            $em->flush();
            return $this->redirectToRoute('newcimek');
        }
        return $this->render('szamlazasicimek/editszamlazasicimek.html.twig', [
            'form' => $form->createView(),
            'data' => $data,
        ]);
    }
	
    /**
     * @Route("/cimek/del/{id}")
     */
	public function DeleteSzamlazasicim($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $table = $em->getRepository('AppBundle:SzamlazasiCimek')->find($id);
        $em->remove($table);
        $em->flush();
        return $this->redirectToRoute('newcimek');
    }
}
