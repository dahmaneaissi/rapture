<?php

namespace App\Http\ViewComposers\Backend;

use Illuminate\Contracts\View\View;
use Dman\Repositories\Navigation\Backend\MenuRepository;

class MenuComposer
{

    protected $menu;

    public function __construct(MenuRepository $menuRepository )
    {
        $this->menu = $menuRepository;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuItems', $this->menu->getAll() );
    }
}