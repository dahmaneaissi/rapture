<?php
namespace Dman\Repositories\Navigation\Backend;

use Dman\Contracts\Navigation\MenuRepositoryInterface;

use Dman\Repositories\BaseRepository;
use Dman\Models\Navigation\Menu;


/**
 * Class EntityRepository
 * @package App\Dman\Repositories
 */
class MenuRepository extends BaseRepository implements MenuRepositoryInterface {

    /**
     * Model
     */
    protected $model;

    /**
     * @param Menu $model
     */
    function __construct( Menu $model )
    {
        parent::__construct($model);
    }


    public function getAll( array $params = [])
    {
        return $this->model->getItems();
    }
}