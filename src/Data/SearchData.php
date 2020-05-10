<?php

namespace App\Data;

use App\Entity\Trajet;

class SearchData
{

    /**
     * @var string
     */
    public $q = '';
    
    /**
     * @var Trajet[]
     */
    public $trajets = [];

    /**
     * @var null/integer
     */
    public $max;

    /**
     * @var null/integer
     */
    public $min;
    
}