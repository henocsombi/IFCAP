<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class FormationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formation::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new(propertyName: 'nom'),
            TextareaField::new(propertyName: 'resume'),
            TextareaField::new(propertyName: 'description'),
            TextField::new(propertyName: 'duree'),
            TextareaField::new(propertyName: 'prerequis'),
            TextareaField::new(propertyName: 'debouches'),
            AssociationField::new(propertyName: 'idCertif'),
        ];
    }
}
