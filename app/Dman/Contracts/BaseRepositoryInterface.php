<?php

namespace Dman\Contracts;

interface BaseRepositoryInterface {
    /**
     * @return mixed
     */
    public function getAll( array $params );
}