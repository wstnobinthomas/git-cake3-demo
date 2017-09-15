<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{
	public $siteurl = "http://good1-pc/bipha/"; 
    public $default_limit_dropdown = array("10" => "10", "20" => "20", "50" => "50", "100000" => "All");
    public $limits =10;
    
    public function initialize()
    {
        parent::initialize();
		$this->loadComponent('Paginator');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

		$this->loadComponent('Auth', [
          'authenticate' => [
            'Form' => [
                'finder' => 'auth'
            ]
        ],

            'loginRedirect' => [
                'controller' => 'Dashboard',
                'action'     => 'index',
                'prefix'      =>'adminmodule'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action'     => 'login'/*,
                'adminmodule'      =>'true'*/
            ],
             'Session'
        ]);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see http://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        //$this->loadComponent('Csrf');
    }
    
    public function isAuthorized($user){
        // Admin can access every action
        if (isset($user['role']) && $user['role'] === 'adminmodule') {
            return true;
        }

        // Default deny
        return false;
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeFilter event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeFilter(Event $event)
    {
    	$this->set('default_limit_dropdown', $this->default_limit_dropdown);
        $this->set('limits', $this->limits);
        
        $this->Auth->allow(['login','forgotpassword','resetforgottenpassword','ajax_duplicateemail']);        
    }
    
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event){
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        )

        {
            $this->set('_serialize', true);
        }
    }
    
    
/**********Image name formatter*********/
   public function imagename($name){
      if($name != ''){
          $newName=rand(0,9999999).'_'.$name;
          $newName= preg_replace('#[ -]+#', '-', preg_replace('/[%()]/', '', preg_replace('/[^a-zA-Z0-9.]+/', ' ', $newName)));
          return $newName;
      }
    }
/**********Image name formatter*********/
}
