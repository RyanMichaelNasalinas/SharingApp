<?php

class Pages extends Controller{
    public function __construct() {
       
    }

    public function index() {
       //Redirect to posts home
       if(isLoggedIn()){
            redirect('posts');
       }

        $data = [
            'title' => 'Welcome Home',
            'description' => 'Welcome to simple sharing app feel free to add or share some blogs'
            
        ];

        $this->view('pages/index',$data);
    }
    
    public function about() {
        $data = [
            'title' => 'About Us',
            'description' => 'We want to create a simple app the shareposts'
        ];
        $this->view('pages/about',$data);
    }
}