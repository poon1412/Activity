<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

    }
    public function loginAction()
    {

    }
    public function checkloginAction()
    {
      $idTeacher = $this->request->getPost("id");
      $password = $this->request->getPost("Password");

      $user = Teacher::findFirst
                        (
                          [
                            "idTeacher = '" . $idTeacher . "'"
                          ]
                        );
        if (!$user)
        {
            $this->flashSession->error("Invalid ID !!");
            return $this->response->redirect("Login/login");
        }

      elseif ($user)
      {
        if ($password == $user->Password)
        {
            $this->session->set("login", $idTeacher);
            $this->flashSession->success("Successful login");
            if($user->status==1)
              return $this->response->redirect("admin/activityList");
            else
              return $this->response->redirect("teacher/activityList");
        }
        else
        {
          $this->flashSession->error("Unsuccessful login, please try again");
          return $this->response->redirect("Login/login");
        }
      }
    }

      public function logoutAction(){
        if($this->session->has("login")){
        $this->session->remove("login"); ///only one
        //$this->session->destroy();
        $this->flashSession->success("Successful logout");
        return $this->response->redirect("home");
      }
    }




  }
