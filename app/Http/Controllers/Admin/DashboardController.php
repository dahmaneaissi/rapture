<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashboardController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $data['title'] = 'Tableaux de bord';
        return view('admin/dashbord/index')->with( $data );
    }

}
