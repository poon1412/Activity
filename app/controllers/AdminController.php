<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Select;
class AdminController extends \Phalcon\Mvc\Controller
{
    public function initialize(){
      if(!$this->session->has("login")){
      $this->flashSession->notice("Unsuccessful Please login again");
      return  $this->response->redirect("Login/login");
      }
    }
    public function indexAction()
    {

    }
    public function acformAction()
    {
      $numberPage = $this->request->getQuery("page", "int");
      $parameters["order"] = "idTeacher DESC";
      $teacher = Teacher::find($parameters);
      $paginator = new Paginator([
        'data' => $teacher,
        'limit'=> 50,
        'page' => $numberPage
      ]);
      $this->view->page = $paginator->getPaginate();
    }


    public function activitylistAction()
    {
      $numberPage = $this->request->getQuery("page", "int");
      $parameters["order"] = "idActivity DESC";
      $activity = Activity::find($parameters);
      $paginator = new Paginator([
        'data' => $activity,
        'limit'=> 50,
        'page' => $numberPage
      ]);
      $this->view->page = $paginator->getPaginate();
    }


    public function acAddAction()
    {
      $activitys= new Activity;
      $num = Activity::maximum(
        [
        "column" => "idActivity",
        ]
      );
      $activitys->idActivity= $num+1;
      $activitys->ActivityName= $this->request->getPost("nameAc");
      $activitys->Detail= $this->request->getPost("detail");
      $activitys->StartDate= $this->request->getPost("datest");
      $activitys->StartTime= $this->request->getPost("timest");
      $activitys->EndDate= $this->request->getPost("dateed");
      $activitys->Endtime= $this->request->getPost("timeed");
      $activitys->Teacher_idTeacher= $this->request->getPost("teacherID");

      if($this->request->getPost("place")==99){
        $locations= new Location;
        $numL = Location::maximum(
          [
          "column" => "idLocation",
          ]
        );
        $locations->idLocation= $numL+1;
        $locations->LocationName= $this->request->getPost("otherPlace");
        $locations->room= $this->request->getPost("otherRoom");
        $locations->save();
        $activitys->Location_idLocation= $numL+1;
        }
      else
      {
        $activitys->Location_idLocation= $this->request->getPost("place");
      }

      $activitys->Yearofeducation_Semester= $this->request->getPost("semeter");
      $activitys->Yearofeducation_Year= $this->request->getPost("year");
      $AHY= new ActivityHaveYear;
      $AHY->activity_have_year_idactivity=$num+1;
      if($this->request->getPost("chkyear1"))
        $AHY->activity_have_year1 = 1;
      else
        $AHY->activity_have_year1 = 0;


      if($this->request->getPost("chkyear2"))
        $AHY->activity_have_year2 = 1;
      else
        $AHY->activity_have_year2 = 0;

      if($this->request->getPost("chkyear3"))
        $AHY->activity_have_year3 = 1;
      else
        $AHY->activity_have_year3 = 0;

      if($this->request->getPost("chkyear4"))
        $AHY->activity_have_year4 = 1;
      else
        $AHY->activity_have_year4 = 0;
      $AHY->save();

      if (!$activitys->save()) {
          foreach ($activitys->getMessages() as $message) {
              $this->flash->error($message);
          }

          $this->dispatcher->forward([
              'controller' => "admin",
              'action' => 'new'
          ]);

          return;
      }

      $this->flash->success("Activity was created successfully");

      $this->dispatcher->forward([
          'controller' => "admin",
          'action' => 'activityList'
      ]);
    }

    public function aceditAction($idActivity)
    {
        if (!$this->request->isPost()) {

            $activity = Activity::findFirstByidActivity($idActivity);
            if (!$activity) {
                $this->flash->error("Activity was not found");

                $this->dispatcher->forward([
                    'controller' => "admin",
                    'action' => 'activityList'
                ]);

                return;
            }

            $this->view->idActivity = $activity->idActivity;

            $this->tag->setDefault("nameAc", $activity->ActivityName);
            $this->tag->setDefault("detail", $activity->Detail);
            $this->tag->setDefault("datest", $activity->StartDate);
            $this->tag->setDefault("timest", $activity->StartTime);
            $this->tag->setDefault("dateed", $activity->EndDate);
            $this->tag->setDefault("timeed", $activity->Endtime);
            $this->tag->setDefault("teacherID", $activity->Teacher_idTeacher);
            // $this->tag->setDefault("place", $activity->Location_idLocation);
              // $activitys->Location_idLocation= $locations->idLocation;
              // $locations->LocationName= $this->request->getPost("otherPlace");
              // $locations->room= $this->request->getPost("otherRoom");
            }



            $this->tag->setDefault("semeter", $activity->Yearofeducation_Semester);
            $this->tag->setDefault("year", $activity->Yearofeducation_Year);




            // $activitys->ActivityName= $this->request->getPost("nameAc");
            // $activitys->Detail= $this->request->getPost("detail");
            // $activitys->StartDate= $this->request->getPost("datest");
            // $activitys->StartTime= $this->request->getPost("timest");
            // $activitys->EndDate= $this->request->getPost("dateed");
            // $activitys->Endtime= $this->request->getPost("timeed");
            // $activitys->Teacher_idTeacher= $this->request->getPost("teacherID");

        }


    /**
     * Saves an activity edited
     *
     */
    public function acsaveAction($id)
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'activityList'
            ]);

            return;
        }

        // $idActivity = $this->request->getPost("id");
        $activitys = Activity::findFirst($id);

        if (!$activitys) {
            $this->flashSession->error("activity does not exist " . $idActivity);

            $this->dispatcher->forward([
                'controller' => "Admin",
                'action' => 'activityList'
            ]);

            return;
        }

        $activitys->ActivityName= $this->request->getPost("nameAc");
        $activitys->Detail= $this->request->getPost("detail");
        $activitys->StartDate= $this->request->getPost("datest");
        $activitys->StartTime= $this->request->getPost("timest");
        $activitys->EndDate= $this->request->getPost("dateed");
        $activitys->Endtime= $this->request->getPost("timeed");
        $activitys->Teacher_idTeacher= $this->request->getPost("teacherID");

        if($this->request->getPost("place")==99){
          $locations= new Location;
          $numL = Location::maximum(
            [
            "column" => "idLocation",
            ]
          );
          $locations->idLocation= $numL+1;
          $locations->LocationName= $this->request->getPost("otherPlace");
          $locations->room= $this->request->getPost("otherRoom");
          $locations->save();
          $activitys->Location_idLocation= $numL+1;
          }
        else
        {
          $activitys->Location_idLocation= $this->request->getPost("place");
        }

        $activitys->Yearofeducation_Semester= $this->request->getPost("semeter");
        $activitys->Yearofeducation_Year= $this->request->getPost("year");
        $AHY= ActivityHaveYear::findFirst($id);
        if($this->request->getPost("chkyear1"))
          $AHY->activity_have_year1 = 1;
        else
          $AHY->activity_have_year1 = 0;


        if($this->request->getPost("chkyear2"))
          $AHY->activity_have_year2 = 1;
        else
          $AHY->activity_have_year2 = 0;

        if($this->request->getPost("chkyear3"))
          $AHY->activity_have_year3 = 1;
        else
          $AHY->activity_have_year3 = 0;

        if($this->request->getPost("chkyear4"))
          $AHY->activity_have_year4 = 1;
        else
          $AHY->activity_have_year4 = 0;
        $AHY->save();

        if (!$activitys->save()) {
            foreach ($activitys->getMessages() as $message) {
                $this->flashSession->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'acedit'
            ]);

            return;
        }

        $this->flashSession->success("Activity was created successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'activitylist'
        ]);

}
public function acdeleteAction($id)
{
  $activitys = Activity::findFirst($id);
        $activitys->delete();
        if($activitys->delete()){
          $this->flashSession->success("Activity was delete successfully");

          $this->dispatcher->forward([
              'controller' => "admin",
              'action' => 'activitylist'
          ]);
        }
}

    public function showacAction($idActivity){
      if (!$this->request->isPost()) {

          $activity = Activity::findFirstByidActivity($idActivity);
          if (!$activity) {
              $this->flash->error("Activity was not found");

              $this->dispatcher->forward([
                  'controller' => "admin",
                  'action' => 'activityList'
              ]);

              return;
          }
          $this->view->idActivity = $activity->idActivity;
          }
    }
    public function showstdAction($y)
    {
      $numberPage = $this->request->getQuery("page", "int");
      
      $student = Student::find(
      [
        "year =".$y,
      ]
      );
    
      $paginator = new Paginator([
        'data' => $student,
        'limit'=> 50,
        'page' => $numberPage
      ]);
      $this->view->page = $paginator->getPaginate();

    }

    public function userformAction()
    {

    }


    public function showUserAction()
    {

    }

    public function joinacAction($id)
    {
      $numberPage = $this->request->getQuery("page", "int");
      $this->view->id = $id;
      $std= Student::findFirstByidStudent($id);
      if ($std->year==1) {
        $xs = ActivityHaveYear::find(
          [
            "activity_have_year1 = 1",
          ]
          );
      }elseif ($std->year==2) {
        $xs = ActivityHaveYear::find(
          [
            "activity_have_year2 = 1",
          ]
          );
      }elseif ($std->year==3) {
        $xs = ActivityHaveYear::find(
          [
            "activity_have_year3 = 1",
          ]
          );
      }elseif ($std->year==4) {
        $xs = ActivityHaveYear::find(
          [
            "activity_have_year4 = 1",
          ]
          );
      }

      $paginator = new Paginator([
        'data' => $xs,
        'limit'=> 8,
        'page' => $numberPage
      ]);
      $this->view->page = $paginator->getPaginate();

   }




    public function teacherAction()
    {
        $this->persistent->parameters = null;
    }
    public function searchAction()
    {
        $this->persistent->parameters = null;
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Teacher', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idTeacher";

        $teacher = Teacher::find($parameters);
        if (count($teacher) == 0) {
            $this->flash->notice("The search did not find any teacher");

            $this->dispatcher->forward([
                "controller" => "admin",
                "action" => "teacher"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $teacher,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a teacher
     *
     * @param string $idTeacher
     */
    public function editAction($idTeacher)
    {
        if (!$this->request->isPost()) {

            $teacher = Teacher::findFirstByidTeacher($idTeacher);
            if (!$teacher) {
                $this->flash->error("teacher was not found");

                $this->dispatcher->forward([
                    'controller' => "teacher",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->idTeacher = $teacher->idTeacher;

            $this->tag->setDefault("idTeacher", $teacher->idTeacher);
            $this->tag->setDefault("Title", $teacher->Title);
            $this->tag->setDefault("FirstName", $teacher->FirstName);
            $this->tag->setDefault("LastName", $teacher->LastName);
            $this->tag->setDefault("Password", $teacher->Password);
            $this->tag->setDefault("image", $teacher->image);

        }
    }

    /**
     * Creates a new teacher
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'index'
            ]);

            return;
        }





        $teacher = new Teacher();
        $teacher->idTeacher = $this->request->getPost("idTeacher");
        $teacher->Title = $this->request->getPost("Title");
        $teacher->FirstName = $this->request->getPost("FirstName");
        $teacher->LastName = $this->request->getPost("LastName");
        $teacher->Password = $this->request->getPost("Password");
        $teacher->status = $this->request->getPost("status");
        $teacher->image =$path;



        if (!$teacher->save()) {
            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("teacher was created successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a teacher edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'index'
            ]);

            return;
        }

        $idTeacher = $this->request->getPost("idTeacher");
        $teacher = Teacher::findFirstByidTeacher($idTeacher);

        if (!$teacher) {
            $this->flash->error("teacher does not exist " . $idTeacher);

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'index'
            ]);

            return;
        }

        $teacher->idTeacher = $this->request->getPost("idTeacher");
        $teacher->Title = $this->request->getPost("Title");
        $teacher->FirstName = $this->request->getPost("FirstName");
        $teacher->LastName = $this->request->getPost("LastName");
        $teacher->Password = $this->request->getPost("Password");
        $teacher->status = $this->request->getPost("status");
        $teacher->image = $this->request->getPost("image");


        if (!$teacher->save()) {

            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'edit',
                'params' => [$teacher->idTeacher]
            ]);

            return;
        }

        $this->flash->success("teacher was updated successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a teacher
     *
     * @param string $idTeacher
     */
    public function deleteAction($idTeacher)
    {
        $teacher = Teacher::findFirstByidTeacher($idTeacher);
        if (!$teacher) {
            $this->flash->error("teacher was not found");

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'index'
            ]);

            return;
        }

        if (!$teacher->delete()) {

            foreach ($teacher->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("teacher was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => "index"
        ]);
    }


    // Controller about student

    public function studentAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for student
     */
    public function stsearchAction()
    {
      $this->persistent->parameters = null;
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Student', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "idStudent";

        $student = Student::find($parameters);
        if (count($student) == 0) {
            $this->flash->notice("The search did not find any student");

            $this->dispatcher->forward([
                "controller" => "admin",
                "action" => "student"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $student,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function stnewAction()
    {

    }

    /**
     * Edits a student
     *
     * @param string $idStudent
     */
    public function steditAction($idStudent)
    {
        if (!$this->request->isPost()) {

            $student = Student::findFirstByidStudent($idStudent);
            if (!$student) {
                $this->flash->error("student was not found");

                $this->dispatcher->forward([
                    'controller' => "admin",
                    'action' => 'student'
                ]);

                return;
            }

            $this->view->idStudent = $student->idStudent;

            $this->tag->setDefault("idStudent", $student->idStudent);
            $this->tag->setDefault("Title", $student->Title);
            $this->tag->setDefault("FirstName", $student->FirstName);
            $this->tag->setDefault("LastName", $student->LastName);
            $this->tag->setDefault("Password", $student->Password);
            $this->tag->setDefault("year", $student->year);

        }
    }

    /**
     * Creates a new student
     */
    public function stcreateAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'student'
            ]);

            return;
        }

        $student = new Student();
        $student->idStudent = $this->request->getPost("idStudent");
        $student->Title = $this->request->getPost("Title");
        $student->FirstName = $this->request->getPost("FirstName");
        $student->LastName = $this->request->getPost("LastName");
        $student->Password = $this->request->getPost("Password");
        $student->year = $this->request->getPost("year");


        if (!$student->save()) {
            foreach ($student->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'stnew'
            ]);

            return;
        }

        $this->flash->success("student was created successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'student'
        ]);
    }

    /**
     * Saves a student edited
     *
     */
    public function stsaveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'student'
            ]);

            return;
        }

        $idStudent = $this->request->getPost("idStudent");
        $student = Student::findFirstByidStudent($idStudent);

        if (!$student) {
            $this->flash->error("student does not exist " . $idStudent);

            $this->dispatcher->forward([
                'controller' => "student",
                'action' => 'index'
            ]);

            return;
        }

        $student->idStudent = $this->request->getPost("idStudent");
        $student->Title = $this->request->getPost("Title");
        $student->FirstName = $this->request->getPost("FirstName");
        $student->LastName = $this->request->getPost("LastName");
        $student->Password = $this->request->getPost("Password");
        $student->year = $this->request->getPost("year");


        if (!$student->save()) {

            foreach ($student->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'stedit',
                'params' => [$student->idStudent]
            ]);

            return;
        }

        $this->flash->success("student was updated successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => 'student'
        ]);
    }

    /**
     * Deletes a student
     *
     * @param string $idStudent
     */
    public function stdeleteAction($idStudent)
    {
        $student = Student::findFirstByidStudent($idStudent);
        if (!$student) {
            $this->flash->error("student was not found");

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'student'
            ]);

            return;
        }

        if (!$student->delete()) {

            foreach ($student->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "admin",
                'action' => 'stsearch'
            ]);

            return;
        }

        $this->flash->success("student was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "admin",
            'action' => "student"
        ]);
    }



}
