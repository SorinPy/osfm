<?php namespace App\Controllers;

class Team extends BaseController
{
	public function index($teamid = -1)
	{
		echo view('common/header' , $this->data);

		echo $teamid;

        echo view('common/footer',$this->data);
	}

	//--------------------------------------------------------------------

    public function new()
    {
        $teamModel = new \App\Models\TeamModel();

        if($this->data['user'] === NULL)
        {
            return redirect()->to(site_url('user/register'));
        }

        if($this->request->getMethod() === 'post' && $this->data['team'] === NULL){

            if(!$teamModel->save([
                'name' => $this->request->getPost('teamName'),
                'user_id' => $this->data['user']['id'],
                'country' =>$this->request->getPost('teamCountry')
                ]))
            {
                $this->session->setFlashdata('newTeamErrors' , $teamModel->errors());
                return redirect()->back()->withInput();
            }
            return redirect()->back();

        }

        echo view('common/header' , $this->data);

        echo view('team/new',$this->data);

        echo view('common/footer',$this->data);
    }

    public function players($teamid = -1)
    {
        $playerModel = new \App\Models\PlayerModel();

        $this->data['players'] = NULL;

        if($teamid === -1 || $teamid === $this->data['team']['id'])
        {

            $this->data['players'] = $playerModel->getWhere(['team_id' => $this->data['team']['id']])->getResult('array');
        }

        echo view('common/header' , $this->data);

        echo view('team/players' , $this->data);

        echo view('common/footer',$this->data);
    }

    public function player($playerid = -1 ,$teamid = -1)
    {
        echo view('common/header' , $this->data);

        echo "Player id " .$teamid;

        echo view('common/footer',$this->data);
    }
}