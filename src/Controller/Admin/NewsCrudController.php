<?php

namespace App\Controller\Admin;

use App\Entity\News;
use Cassandra\Date;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('news_title')->setColumns(6),
            SlugField::new('news_slug')->setTargetFieldName('news_title')->setColumns(6),
            TextEditorField::new('detail'),
            ImageField::new('image')
                ->setBasePath('upload/')
                ->setUploadDir('public/upload')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            DateTimeField::new('post_date')->setColumns(6),
            BooleanField::new('five_section')->setColumns(3),
            BooleanField::new('statut')->setColumns(3),
            AssociationField::new('category')->setColumns(6),
            AssociationField::new('user')->setColumns(6),
        ];
    }
}
