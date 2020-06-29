<?php namespace App\Controllers;
use App\Models\UserModel;
class UserLogin extends BaseController
{
	public function index()
	{
		return view('auths/login');
	}
	public function singOut()
	{
		return view('auths/register');
	}
	
	public function registerUser()
	{
		
		helper(['form']);
		$userModel = new UserModel();
		$data =[];
		if($this->request->getMethod()=="post")
		 {
			$rules = [
				'email'=>'required|min_length[6]|max_length[50]|valid_email',
				'password'=>'required|min_length[8]|max_length[20]',
				'address'=>'required',
				
			];
			if($this->validate($rules))
				{
					$userEmail = $this->request->getVar('email');
					$userPassword = $this->request->getVar('password');
					$userAddress = $this->request->getVar('address');

					$userData = array(
						'email'=>$userEmail,
						'password'=>$userPassword,
						'address'=>$userAddress,
					); 
					$userModel->userLogin($userData);
					return redirect()->to('/');
					
				}else{
					$data['validation']= $this->validator;	
					return view('auths/register',$data);
				}
		 }
		
	}

	

}