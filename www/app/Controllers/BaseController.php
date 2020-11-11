<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['icons','bootstrap'];

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();

		$this->session = \Config\Services::session();
		$this->data = [];
		
		$this->teamModel =  new \App\Models\TeamModel();

		$this->validation =  \Config\Services::validation();

		//var_dump($this->session->getFlashdata());
		foreach( $this->session->getFlashdata() as $key => $value)
		{
			$this->data[$key] = $value;
		}
		$this->data['user'] = $this->session->get('user');
		$this->data['team'] = $this->session->get('team');
		if($this->data['user'] !== NULL){
			
			$team = $this->teamModel->getWhere(['user_id'=>$this->data['user']['id']])->getFirstRow('array');
			if($team !== NULL){
				$this->data['team'] = $team;
			}
		}
		//var_dump($this->data);
	}

}
