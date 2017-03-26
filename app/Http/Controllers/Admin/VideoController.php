<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class VideoController extends Controller {


	public function getIndex()
	{
        $data['title'] = 'Test Hamoud video';
	   return view('admin/video/video')->with( $data );
	}

    public function getEndVideo()
    {
        $data['title'] = 'Question';
        return view('admin/video/question')->with( $data );
    }
}
