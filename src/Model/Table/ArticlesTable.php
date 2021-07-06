<?php


namespace App\Model\Table;


// By convention, table name will be `articles`.
// `id` column is the primary key.
use Cake\Event\EventInterface;
use Cake\ORM\Table;
use Cake\Utility\Text;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        // Populate created and modified columns.
        $this->addBehavior('Timestamp');
    }

    // a callbak to update `slug` column before saving.
    public function beforeSave(EventInterface $event,$entity,$options){
        // if `slug` value is null
        if($entity->isNew() && !$entity->slug){
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug=substr($sluggedTitle,0,191);
        }
    }
}
