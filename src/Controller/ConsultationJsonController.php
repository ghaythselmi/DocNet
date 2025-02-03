<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Entity\Consultation;
use App\Repository\ConsultationRepository;

#[Route('/Consultation')]
class ConsultationJsonController extends AbstractController
{
   
  /*  #[Route('/get', name: 'consultations')]
    public function getConsultations(ConsultationRepository $repo, SerializerInterface $serializer)
    {

    $Cons = $repo->findAll();
    $json = $serializer->serialize($Cons, 'json', ['groups' => "consultations"]);  

        return new Response($json);
        
    }

        #[Route('/create', name: 'addCons')]
        public function addConsultation(Request $req , SerializerInterface $serializer)
        {

        $em = $this->getDoctrine()->getManager();
        $Consultation = new Consultation();
        
        $Consultation ->setDate($req->get('date'));
        $Consultation ->setComment($req->get('comment'));
        $Consultation ->setMedecin($req->get('medecin'));
    
        
        $em->persist($Consultation);
        $em->flush();


        $json = $serializer->serialize($Consultation, 'json', ['groups' => "consultations"]);
    
        return new Response($json);
            
        }



    #[Route('/u/{id}', name: 'yyyy')]
    public function updateCons($id,Request $req , SerializerInterface $serializer,ConsultationRepository $repo)
    {

    $em = $this->getDoctrine()->getManager();
    $Consultation = $repo->find($id);
    $Consultation ->setStatus($req->get('date'));
    $Consultation ->setName($req->get('comment'));
    $Consultation ->setMedecin($req->get('medecin'));
   
    $em->persist($Consultation);
    $em->flush();


    $json = $serializer->serialize($Consultation, 'json', ['groups' => "consultations"]);
    
       
    return new Response($json);
        
    }



    #[Route('/delete/{id}', name: 'delcons')]
    public function deleteCons($id,SerializerInterface $serializer,Consultation $consultation ,ConsultationRepository $repo)
    {

   // $em = $this->getDoctrine()->getManager();
    $consultation = $repo->find($id);
    $repo->remove($consultation, true);
   // $em->remove($reservation);
    //$em->flush();
    $json = $serializer->serialize($consultation, 'json', ['groups' => "consultations"]);
    
    return new Response($json);
        
    }*/





}
