<?php


namespace App\Model\Table;


// By convention, table name will be `articles`.
// `id` column is the primary key.
use Cake\ORM\Table;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        // Populate created and modified columns.
        $this->addBehavior('Timestamp');
    }
}
