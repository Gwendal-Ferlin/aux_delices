<?php
namespace App\Controller;

use App\Form\AjoutBonbonType;
use App\Repository\TypeBonbonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\TypeBonbon;


class BaseController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    // /base est l’URL de la page, name est le nom de la route
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [ // render est la fonction qui va chercher le fichier TWIG pour l’afficher
            'controller_name' => 'BaseController', // Le contrôleur donne à la vue une variable dont le contenu est BaseController, cela nous ne servira pas, nous l’enlèverons un peu plus loin
        ]);
    }

    #[Route('/ajoutBonbon', name: 'app_ajout_bonbon')]
    public function contact(): Response
    {
        $form = $this->createForm(AjoutBonbonType::class);
        return $this->render('base/ajout_bonbon.html.twig', [
            'form' => $form->createView(),
        ]);
    }
    #[Route('/liste-typebonbon', name: 'app_liste-type_bonbon')]
    public function listeTypeBonbon(TypeBonbonRepository $contactRepository): Response
    {
        $bonbons = $contactRepository->findAll();
        return $this->render('base/liste-type_bonbon.html.twig', [
            'bonbons' => $bonbons

        ]);
    }

}
