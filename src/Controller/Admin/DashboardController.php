<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use App\Entity\Certification;
use App\Entity\Contact;
use App\Entity\Formation;
use App\Entity\Adherent;
use App\Entity\Session;
use App\Entity\User; //ajouté manuellement
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator; //ajouté manuellement
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('IFCAP');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Cerifications', 'fas fa-check', Certification::class);
        yield MenuItem::linkToCrud('Formations', 'fas fa-list', Formation::class);
        yield MenuItem::linkToCrud('Sessions', 'fas fa-calendar', Session::class);
        yield MenuItem::linkToCrud('Avis', 'fas fa-comment', Avis::class);
        yield MenuItem::linkToCrud('Contact', 'fas fa-address-card', Contact::class);
        yield MenuItem::linkToCrud('Adherents', 'fas fa-user', Adherent::class);
    }
}
