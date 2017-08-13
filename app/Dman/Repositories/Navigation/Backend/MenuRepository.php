<?php
namespace Dman\Repositories\Navigation\Backend;

use Dman\Contracts\Navigation\MenuRepositoryInterface;

use Dman\Repositories\BaseRepository;
use Dman\Models\Navigation\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


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
     * @var Request
     */
    protected $request;

    /**
     * MenuRepository constructor.
     * @param Menu $model
     * @param Request $request
     */
    function __construct(Menu $model , Request $request )
    {
        parent::__construct($model);
        $this->request = $request;
    }

    /**
     * @param array $params
     * @return array
     */
    public function getAll(array $params = [])
    {
        $items =  $this->model->getItems();
        return $this->sutupItems($items);
    }

    /**
     * @param array $items
     * @return array
     */
    private function sutupItems(array $items )
    {
        $menu = [];

        $routeName = $this->request->route()->getName();
        foreach ($items as $item)
        {
            $item['current'] = $item['routeName'] == $routeName ? true : false;
            $menu[] = $item;
        }

        return $menu;
    }

}