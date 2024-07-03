<?php

namespace App\Controller\Admin;

use App\Entity\Adherent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;

class AdherentCrudController extends AbstractCrudController
{
    // use Trait\ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Adherent::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            EmailField::new(propertyName: 'email'),
            TextField::new(propertyName: 'prenom'),
            TextField::new(propertyName: 'nom'),
            TextField::new(propertyName: 'statut'),
            AssociationField::new(propertyName: 'idFormation'),
            TextField::new(propertyName: 'adresse'),
            TelephoneField::new(propertyName: 'telephone'),
        ];
    }
}
