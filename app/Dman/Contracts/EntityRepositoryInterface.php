<?php

namespace Dman\Contracts;

interface EntityRepositoryInterface {
    /**
     * @return mixed
     */
    public function getAll( array $params );
}