<?php
namespace App\Controller;
namespace App\Controller\AdminModule;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class DashboardController extends AppController
{

	/**
	* Index method
	*
	* @return \Cake\Network\Response|null
	*/
	public function index()
	{
		$this->viewBuilder()->layout('default');
		$this->set('title_for_layout', 'Dashboard');
	}
}
