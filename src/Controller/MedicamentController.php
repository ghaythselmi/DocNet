<?php

namespace App\Controller;

use App\Entity\Pharmacie;
use App\Entity\Medicament;
use App\Form\Medicament1Type;
use App\Repository\MedicamentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


#[Route('/medicament')]
class MedicamentController extends AbstractController
{
    #[Route('/', name: 'app_medicament_index', methods: ['GET'])]
    public function index(MedicamentRepository $medicamentRepository): Response
    {
        return $this->render('back_office/medicament/index.html.twig', [
            'medicaments' => $medicamentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_medicament_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MedicamentRepository $medicamentRepository): Response
    {
        $medicament = new Medicament();
        $form = $this->createForm(Medicament1Type::class, $medicament);
        $form->handleRequest($request);
     
      
        if ($form->isSubmitted() && $form->isValid()) {
            // dump($medicament);
            // die;
            
            $medicamentRepository->save($medicament, true);

            return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/medicament/new.html.twig', [
            'medicament' => $medicament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_medicament_show', methods: ['GET'])]
    public function show(Medicament $medicament): Response
    {
        return $this->render('back_office/medicament/show.html.twig', [
            'medicament' => $medicament,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_medicament_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Medicament $medicament, MedicamentRepository $medicamentRepository): Response
    {
        $form = $this->createForm(Medicament1Type::class, $medicament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $medicamentRepository->save($medicament, true);

            return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/medicament/edit.html.twig', [
            'medicament' => $medicament,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_medicament_delete', methods: ['GET','POST'])]
    public function delete(Request $request, Medicament $medicament, MedicamentRepository $medicamentRepository): Response
    {
            $medicamentRepository->remove($medicament, true);
        

        return $this->redirectToRoute('app_medicament_index', [], Response::HTTP_SEE_OTHER);
    }
}
