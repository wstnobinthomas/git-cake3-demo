<?php
namespace App\Controller;
namespace App\Controller\AdminModule;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Validation\Validation;
use Cake\Event\Event;
use ArrayObject;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends AppController
{

	/**
	* Index method
	*
	* @return \Cake\Network\Response|null
	*/
	public function index()
	{

		if(!empty($this->request->data))
		{
			if(isset($this->request->data['data']['Users']['limit']))
			{
				$limit = $this->request->data['data']['Users']['limit'];
				$this->request->Session()->write('default_limit', $limit);
			}
		}
		else
		{
			if($this->request->Session()->check('default_limit'))
			$limit = $this->request->Session()->read('default_limit');
			else
			$limit = $this->limits;
		}
		$search_conditions = array();
		$conditions = array();
		$this->set("search_string", "");
		if(isset($this->request->query['search']))
		{
			$this->set("search_string", $this->request->query['search']);
			$conditions = array('OR' => array(
					'Users.first_name LIKE "%'.trim(addslashes($this->request->query['search'])).'%"',
					'Users.last_name LIKE "%'.trim(addslashes($this->request->query['search'])).'%"' ,
					'Users.email LIKE "%'.trim(addslashes($this->request->query['search'])).'%"'));
		}
		$this->paginate = [
			'limit' => $limit,
			'order' => ['Users.id'=>'DESC'],
			'conditions' => [
				array_merge($conditions,$search_conditions),'Users.group_id IN'=>[1]
			],
		];

		$users = $this->paginate($this->Users)->toArray();
		$this->set('_serialize', ['users']);
		$this->set(compact('limit','default_limit_dropdown','users'));
		$this->set('title_for_layout', 'User : List');
	}
	/**
	* View method
	*
	* @param string|null $id User id.
	* @return \Cake\Network\Response|null
	* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	*/
	public function view($id = null)
	{
		$user = $this->Users->get($id, [
				'contain' => ['Countries', 'States', 'Useraddresses', 'Wishlists']
			]);

		$this->set('user', $user);
		$this->set('_serialize', ['user']);
		$this->set('title_for_layout', 'User : View');
	}

	/**
	* Add method
	*
	* @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
	*/
	public function add()
	{
		$UserPath = $this->UserPath;
		$user     = $this->Users->newEntity();
		if($this->request->is('post'))
		{
			$user           = $this->Users->patchEntity($user, $this->request->data);
			$password       = $this->request->data['password'];
			$hasher         = new DefaultPasswordHasher();
			$hashedpassword = $hasher->hash($password);
			$user['password'] = $hashedpassword ;
			if(isset($this->request->data['image']['name']) && !empty($this->request->data['image']['name']) && $this->request->data['image']['name'] != "" )
			{
				$time       = rand(0,9999999);
				$fileName   = $time.$this->imagename($this->request->data['image']['name']);
				$UserPath   = $this->UserPath;
				$uploadFile = $UserPath.$fileName;
				if(move_uploaded_file($this->request->data['image']['tmp_name'],$uploadFile))
				{
					$user->image = $fileName;
					$user->path = $UserPath;
				}
			}
			if($this->Users->save($user))
			{
				$this->Flash->success(__('The user has been added successfully.'));
				return $this->redirect(['action' => 'index']);
			}
			else
			{
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
		$this->set(compact('user', 'groups'));
		$this->set('_serialize', ['user']);
		$this->set('title_for_layout', 'User : Add');
	}

	/**
	* Edit method
	*
	* @param string|null $id User id.
	* @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
	* @throws \Cake\Network\Exception\NotFoundException When record not found.
	*/
	public function edit($id = null)
	{
		$user   = $this->Users->get($id, [
				'contain' => []
			]);
		$userId = $id; //pr($user );exit;

		if($this->request->is(['patch', 'post', 'put']))
		{

			if(isset($this->request->data['image1']['name']) && !empty($this->request->data['image1']['name']) && $this->request->data['image1']['name'] != "" )
			{
				$UserPath   = $this->UserPath;
				$UserPath   = $this->TestimonialImagePath;
				$currentDoc = $user['image'];
				if(file_exists($UserPath.$currentDoc) && $currentDoc != NULL)
				{
					unlink($UserPath . $currentDoc);
				}
				$time      = rand(0,9999999);
				$imageName = $time.$this->imagename($this->request->data['image1']['name']); //pr($time);exit;
				$uploadDir = $this->UserPath.basename($imageName); //pr($uploadDir);exit;
				$this->request->data['image'] = $imageName;
				move_uploaded_file($this->request->data['image1']['tmp_name'], $uploadDir);
				$this->request->data['image'] = $imageName;
			}
			$user = $this->Users->patchEntity($user, $this->request->data);
			if(isset($user['password']) && !empty($user['password']))
			{
				unset($user['password']);
			}
			if($this->Users->save($user))
			{
				$this->Flash->success(__('The user has been updated successfully.'));
				return $this->redirect(['action' => 'index']);
			}
			else
			{
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
		$this->set('title_for_layout', 'User : Edit');
	}

	/**
	* Delete method
	*
	* @param string|null $id User id.
	* @return \Cake\Network\Response|null Redirects to index.
	* @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	*/
	public function delete($id = null)
	{
		$user = $this->Users->get($id);
		if($this->Users->delete($user))
		{
			$this->Flash->success(__('The user has been deleted.'));
		}
		else
		{
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}



	/********************* User status saving ********************************/


	public function toggleStatus($status,$id)
	{
		$this->autoRender = false;
		if($id != NULL)
		{
			$usersTable = TableRegistry::get('Users');
			$user       = $usersTable->get($id);
			$user->status = !$status;
			$usersTable->save($user);
		}
		exit;
	}


	/********************* User status end saving ************************/

	public function login()
	{
		$this->viewBuilder()->layout('login');
		if($this->request->is('post'))
		{
			//pr($this->request->data);//exit;
			$this->Auth->logout();
			$user = $this->Users->identify($this->request->data);// pr($user);exit;
			if(isset($user) && $user['group_id'] == 1 && $user['status'] == 1 )
			{
				// echo "1"; exit;
				$this->Auth->setUser($user); //pr($user);exit;
				return $this->redirect($this->Auth->redirectUrl());
			}
			else
			{
				$this->Flash->error(__('Invalid username or password, try again'));
			}
		}
	}

	public function logout()
	{
		$this->Flash->success(__('Successfully logged out.', 'flash_success'));
		$this->redirect($this->Auth->logout());
	}

	/********************* Admin User profile update change  ************************/

	public function profile()
	{
		$this->viewBuilder()->layout('default');
		$id         = $this->Auth->user('id');
		$usersTable = TableRegistry::get('Users');
		$user       = $usersTable->get($id);
		if($this->request->is(['patch', 'post', 'put']))
		{
			$user = $this->Users->patchEntity($user, $this->request->data);
			if(isset($user['password']) && !empty($user['password']))
			{
				unset($user['password']);
			}
			if($this->Users->save($user))
			{
				$this->request->session()->write('Auth.User', $user);
				$this->Flash->success(__('Profile updated successfully.'));
				return $this->redirect(['action' => 'profile']);
			}
			else
			{
				$this->Flash->error(__('The Profile could not be saved. Please, try again.'));
			}
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
		$this->set('title_for_layout', 'Admin Profile');
	}

	/********************* Admin User profile update change end ************************/

	/********************* Admin User profile password change  ************************/

	public function changepassword()
	{
		$this->viewBuilder()->layout('default');
		$id         = $this->Auth->user('id');
		$usersTable = TableRegistry::get('Users');
		$user       = $usersTable->get($id);
		if($this->request->is(['patch', 'post', 'put']))
		{
			$user           = $this->Users->patchEntity($user, $this->request->data);
			$password       = $this->request->data['newpassword'];
			$hasher         = new DefaultPasswordHasher();
			$hashedpassword = $hasher->hash($password);
			$user['password'] = $hashedpassword ;
			if($this->Users->save($user))
			{
				$this->Flash->success(__('Password has been updated successfully.'));
				return $this->redirect(['action' => 'profile']);
			}
			else
			{
				$this->Flash->error(__('Password could not be updated. Please try again.'));
			}
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}


	/********************* Admin User profile password change  end  ************************/



	/********************* Admin User duplicate email check *******************************/

	public function ajax_duplicateemail($name)
	{
		$this->autoRender = false;
		$usersTable = TableRegistry::get('Users');
		$arrEmail   = $usersTable->find('all',['conditions'=>['Users.email' => $name]])->first();
		//pr($arrEmail);
		if(!empty($arrEmail))
		{
			echo 1;
		}
		else
		{
			echo 0;
		}exit;
	}

	/********************* Admin User duplicate email check End*******************************/





	public function export()
	{
		$this->autoRender = false;
		$results = [];
		$results = $this->Users->find('all')->toArray();
		$this->response->download('QRS-Export-'.'users-'.date('d-m-Y').'.csv');
		$_header = array('Name');
		$_extract = array('first_name');
		$this->viewBuilder()->className('CsvView.Csv');
		$this->set(compact('results', '_serialize', '_header', '_extract'));
	}



	public function forgotpassword()
	{
		$this->viewBuilder()->layout('login');
		if(!empty($this->request->data))
		{
			if(filter_var($this->request->data['email'], FILTER_VALIDATE_EMAIL))
			{
				$email      = $this->request->data['email']; // pr($email);exit;
				$conditions = array("Users.email"   => $email,"Users.group_id"=> 1);
				$this->request->data = $this->Users->find('all',['conditions'=> $conditions])->toArray();
				if(!empty($this->request->data))
				{
					$id = $this->request->data[0]['id']; //pr($id);exit;
					$this->Users->id = $id;
					$to         = $email;
					$first_name = $this->request->data[0]["first_name"];
					$last_name  = $this->request->data[0]["last_name"];
					$name       = $first_name." ".$last_name;
					$subject    = "Request to reset password :: QRS";
					$txt        = "";
					$baseUrl    = "http://kccm.in/adminmodule/users/resetpassword/";

					$txt        = "<div style='font-family:Trebuchet MS;font-size:14px' bgcolor='#F8F8F8'>
					<table width='100%'><tbody><tr><td style='padding:10px;font-family:Trebuchet MS;font-size:14px;background-color:#202e6f;'>
					<table width='100%'><tbody><tr><td align='center' style='padding-top:40px;padding-bottom:40px;font-family:Trebuchet MS;font-size:14px;background-color:rgb(255,255,255)'><p style='width:80%;text-align:left;line-height:18px;font-family:Trebuchet MS;font-size:14px;margin-right:auto;margin-left:auto'><strong>Hi ".$name."</strong>,<br><br><span style='text-align:center'>Please click on the link below to set your password.</span></p><br><table width='80%' style='padding-top:15px;padding-bottom:15px;font-family:Trebuchet MS;margin-right:auto;margin-left:auto;background-color:rgb(255,129,28)' border='0' cellspacing='0' cellpadding='0'><tbody><tr><td height='50' align='center' valign='middle' style='font-family:Trebuchet MS;font-size:14px'><a style='text-decoration:none' href='".$baseUrl.urlencode(base64_encode($email))."' target='_blank'><span style='color:rgb(255,255,255);font-size:27px;font-weight:bold'>Set your Password</span></a></td></tbody></table><br><p style='width:80%;text-align:left;line-height:18px;font-family:Trebuchet MS;font-size:14px;margin-right:auto;margin-left:auto'>&nbsp;</p><br><br><table width='80%' style='margin-right:auto;margin-left:auto' border='0' cellspacing='0' cellpadding='0'><tbody><tr><td><br><br></td></tr><tr><td><span style='color:#8BC34A;font-family:Trebuchet MS;font-size:13px'><i></i></span><br><br></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><div class='yj6qo'></div><div class='adL'></div><div class='adL'></div></div>";
					//pr($txt);exit;
					$fromAddress= 'admin@kccm.in';
					$fromName   = 'QRS';
					$subject    = "Reset Password :: QRS.";
					$url        = 'https://api.sendgrid.com/';
					$user       = 'reshmaraj';
					$pass       = '9526122185reshma';
					$params     = array(
						'api_user'=> $user,
						'api_key' => $pass,
						'to'      => $to,
						'subject' => $subject,
						'html'    => $txt,
						'text'    => $txt,
						'from'    => $fromAddress,
					);
					$request = $url.'api/mail.send.json';
					//pr($txt);exit;
					// Generate curl request
					$session = curl_init($request);
					// Tell curl to use HTTP POST
					curl_setopt ($session, CURLOPT_POST, true);
					// Tell curl that this is the body of the POST
					curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
					// Tell curl not to return headers, but do return the response
					curl_setopt($session, CURLOPT_HEADER, false);
					curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
					// obtain response
					$ok = curl_exec($session);
					if($ok)
					{
						$this->Flash->success('Please check your mail inbox to reset password.', 'flash_success');
						$this->redirect(array('action'=> 'login'));
					}
					else
					{
						$this->Flash->success('Error: Mail function.<script>$(document).ready(function(){ jQuery(".login-form").hide();
							jQuery(".forget-form").show(); });</script>', 'flash_failure');
					}
				}
				else
				{
					$this->Flash->success('Email address not registered.', 'flash_failure');
					$this->redirect(array('controller'=>'users','action'    => 'login'));
				}
			}
			else
			{
				$this->Flash->success('Email address not registered.', 'flash_failure');
				$this->redirect(array('action'=> 'login'));
			}
		}
	}

	public function resetpassword($hashedEmail = null)
	{
		//echo "string";
		$this->viewBuilder()->layout('login');
		$this->set('hashedEmail',$hashedEmail);
		$email = urldecode(base64_decode($hashedEmail)); //pr($email); exit;
		$this->set(compact('email'));
		if($this->request->is('post'))
		{
			//pr($this->request->data); exit;
			if(($this->request->data['newpassword'] == $this->request->data['confirmpassword']) && $this->request->data['newpassword'] != NULL)
			{
				$conditions = array("Users.email"=> $this->request->data['email']);
				$userDetails = $this->Users->find('all',['conditions'=> $conditions])->first()->toArray();
				// pr( $userDetails);  exit;
				if(isset($userDetails) && !empty($userDetails))
				{
					$user_id = $userDetails['id'];
				}
				$this->Users->id = $user_id;
				$user           = $this->Users->get($user_id);
				$password       = $this->request->data['newpassword'];
				$hasher         = new DefaultPasswordHasher();
				$hashedpassword = $hasher->hash($password);
				$user['password'] = $hashedpassword ;
				$user = $this->Users->patchEntity($user, $this->request->data);
				if($this->Users->save($user))
				{
					$this->Flash->success('Password updated successfully.<br /> Please login below.', 'flash_success');
					$this->redirect(array('controller'=> 'users','action'    => 'login'));
				}
				else
				{
					$this->Flash->success('Password could not be updated. Please try again', 'flash_failure');
				}
			}
			else
			{
				if($this->request->data['newpassword'] == NULL)
				{
					$this->Flash->success('Please enter new password.', 'flash_failure');
				}
				else
				{
					$this->Flash->success('New Passwords do not match.<br />Please try again', 'flash_failure');
				}
			}
		}
	}
}
