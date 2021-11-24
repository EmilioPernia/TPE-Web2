<?php

require_once('./Model/FightersModel.php');
require_once('./Model/WeightclassModel.php');
require_once('./View/AbmView.php');
require_once('./Helpers/LoggedHelper.php');
require_once('./Model/UserModel.php');
require_once('./View/UserView.php');

class AbmController{

    private $model;
    private $weightClassModel;
    private $view;
    private $helper;
    private $userModel;
    private $usersView;


    function __construct(){

        $this->model= new FightersModel();
        $this->weightClassModel= new WeightclassModel();
        $this->view= new AbmView();
        $this->helper= new LoggedHelper();
        $this->userModel= new UserModel();
        $this->usersView= new UserView();
    }

    function loadSelectWeightclass(){
        $loadSelect= $this->weightClassModel->getWeightclass();
        $this->view->loadWeightclassSelect($loadSelect);
    }

    function redirectUrl(){
        header("Location:".BASE_URL."/abm");
    }

    function showFighters(){
        $this->loadSelectWeightclass();
        $fighters = $this->model->getFighters();
        if ($this->helper->checkLogin()==true){
            $this->view->showUserFightersView($fighters);
        }else{
            header("Location:".BASE_URL."/loginForm");
        }
    }

    function showByCategory(){
        $this->loadSelectWeightclass();   
        $weightclassFighters = $this->model->getFightersByWeightclass($_POST['input_weightclass']);
        if ($this->helper->checkLogin()==true){
            $this->view->showUserFightersView($weightclassFighters);
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
        
    }

    //funciones de abmfighter

    function addFighter(){
        if ($this->helper->checkLogin()==true){
            if (!empty ($_POST)) {
                $this->model->addFighter($_POST['name'], $_POST['nickname'],$_POST['nationality'],$_POST['age'],$_POST['record'],
                $_POST['height'],$_POST['weight'],$_POST['weightclass'],$_POST['rank']);
            }
        
            $this->redirectUrl();  
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
           
    }

    function deleteFighter($id){
        if ($this->helper->checkLogin()==true){
            $this->model->deleteFighter($id);
            $this->redirectUrl();  
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
        
        
    }

    function editFighterPage($id){
        if ($this->helper->checkLogin()==true){
            $fighter=$this->model->getFighter($id);
            $this->loadSelectWeightclass();
            $this->view->editFighter($fighter);
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
          
    }

    function editFighter($id){
        if ($this->helper->checkLogin()==true){
            if (!empty ($_POST)){
                $this->model->saveChanges($id,$_POST['name'], $_POST['nickname'],$_POST['nationality'],$_POST['age'],$_POST['record'],
                $_POST['height'],$_POST['weight'],$_POST['weightclass'],$_POST['rank']);
            }
       
            $this->redirectUrl(); 
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
        
    }

    //funciones de abmweightclass

    function createNewWeightclass(){
        if ($this->helper->checkLogin()==true){
            if (!empty ($_POST)){
                $this->weightClassModel->createNewWeightclass($_POST['weightclass'], $_POST['maxWeight'], $_POST['minWeight']);
            }
            $this->redirectUrl(); 
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
        
    }

    function deleteWeightclass(){
        if ($this->helper->checkLogin()==true){
           if (!empty ($_POST)){
            $msg=$this->weightClassModel->deleteWeightclass($_POST['weightclass']);
            if ($msg=="error"){
                    $this->redirectUrl(); 
            }else{
                    $this->redirectUrl(); 
                }
            } 
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
        
            
    }

    function editWeightclass(){
        if ($this->helper->checkLogin()==true){
            if (!empty ($_POST)){
                $this->weightClassModel->editWeightclass($_POST['id'],$_POST['weightclass'],$_POST['maxWeight'],$_POST['minWeight']);
            }
            $this->redirectUrl();
        }else{  
            header("Location:".BASE_URL."/loginForm");
        }
         
    }

    //funciones para el manejo de usuarios

    function showUsers(){
        $user=$this->helper->checkAutorization();
        if($user['user']=="admin"){
            $users=$this->userModel->getUsers();
            $this->usersView->showUsers($users);
        }else{
            header("Location:".BASE_URL."/loginForm");
        }
        
    }


    function changeUserRol($email){
        $user=$this->helper->checkAutorization();
        if($user['user']=="admin"){
            $user=$this->userModel->changeUserRol($email);
            header("Location:".BASE_URL."/showEditUsers");
        }else{
            header("Location:".BASE_URL."/loginForm");
        }
    }

    function deleteUser($id){
        $user=$this->helper->checkAutorization();
        if($user['user']=="admin"){
            $user=$this->userModel->deleteUser($id);
            header("Location:".BASE_URL."/showEditUsers");
        }else{
            header("Location:".BASE_URL."/loginForm");
        }

    }
}