<?php namespace App\Controllers\User;


use App\Controllers\BaseController;

class Login extends BaseController
{
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		

		$this->userModel = new \App\Models\UserModel();

		
    }

    public function index()
    {
      if($this->request->getMethod() === 'post')
        {
          $this->validation->reset();
          $this->validation->setRuleGroup('signIn');
			$data = [
				'email' => $this->request->getPost('login_email'),
				'password' => $this->request->getPost('login_password'),
			];
        	if(!$this->validation->run($data))
        	{
				$this->session->setFlashdata('loginErrors' , $this->validation->getErrors());
				$this->validation->reset();
				return redirect()->back()->withInput();
    		}else{
				$user = $this->userModel->auth($data['email'],$data['password'] );
				if($user === null)
				{
					$this->session->setFlashdata('loginErrors' , ['invalid_account' => 'Contul este inexistent sau parola nu este corecta!']);
					return redirect()->back()->withInput();
				}else
				{
					$this->session->set(['user'=>$user]);
					return redirect()->back();
				}
			}
      }

      return redirect()->to('register');
      
	}
	
	public function logout()
	{
		$this->session->destroy();
		return redirect()->to(site_url());
	}
}