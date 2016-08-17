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
    
    public function question()
    {
    
    }
}