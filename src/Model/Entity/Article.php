<?php


namespace App\Model\Entity;


// Entity is a DB record.
class Article extends \Cake\ORM\Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}
