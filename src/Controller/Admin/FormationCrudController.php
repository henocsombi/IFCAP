<?php

namespace App\Controller\Admin;

use App\Entity\Formation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

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
            TextEditorField::new(propertyName: 'resume'),
            TextEditorField::new(propertyName: 'description'),
            TextEditorField::new(propertyName: 'prerequis'),
            TextEditorField::new(propertyName: 'debouches'),
            AssociationField::new(propertyName: 'idCertif'),
        ];
    }
}
