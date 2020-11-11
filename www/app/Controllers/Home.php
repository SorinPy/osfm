<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		echo view('common/header' , $this->data);

		

        echo view('common/footer',$this->data);
	}

	//--------------------------------------------------------------------

}
