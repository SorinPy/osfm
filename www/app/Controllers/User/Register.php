<?php namespace App\Controllers\User;


use App\Controllers\BaseController;

class Register extends BaseController
{
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		
		

		$this->userModel = new \App\Models\UserModel();
		
		
		
	}


	public function index()
	{
		if($this->session->get('user') !== NULL)
		{
			return redirect()->to(site_url());
		}

		if($this->request->getMethod() === 'post'){
			$redirect = $this->_post($this->request);
			if($redirect !== null)
			{
				return $redirect;
			}
		}
        echo view('common/header' , $this->data);

        echo view('user/register',$this->data);

        return view('common/footer' , $this->data);
	}


	private function _post(\CodeIgniter\HTTP\RequestInterface $request)
	{
		$result = $this->userModel->save([
			'username' => $request->getPost('username'),
			'email' => $request->getPost('email'),
			'password' => $request->getPost('password'),
			'password_confirm' => $request->getPost('password_confirm')
		]);

		if(!$result)
		{
			$this->session->setFlashdata('regErrors' , $this->userModel->errors());
			return redirect()->back()->withInput();
		}
		return redirect()->back()->with('login_email' , $request->getPost('email'))
								->with('regSuccess' , 'Te-ai inregistrat cu succes! Logheaza-te acum!');
	}

	//--------------------------------------------------------------------

}
