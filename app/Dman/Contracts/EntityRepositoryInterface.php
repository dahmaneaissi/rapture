<?php

namespace App\Dman\Contracts;

interface EntityRepositoryInterface {
    /**
     * @return mixed
     */
    public function getAll();
}