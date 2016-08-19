<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class MylayoutController extends AppController
{
 
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('mylayout');
    }
     
	public function index()
    {
       	
    }
	
    public function sendForm()
    {
		$username = $this->request->data('username');
		$password = $this->request->data('password');
		$this->set("username",$username);
    }
    
    public function question()
    {
    
    }
}