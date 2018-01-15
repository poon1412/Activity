<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Select;
class TeacherController extends \Phalcon\Mvc\Controller
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
            'controller' => "teacher",
            'action' => 'new'
        ]);

        return;
    }

    $this->flash->success("activity was created successfully");

    $this->dispatcher->forward([
        'controller' => "teacher",
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
                  'controller' => "teacher",
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
              'controller' => "teacher",
              'action' => 'activityList'
          ]);

          return;
      }

      // $idActivity = $this->request->getPost("id");
      $activitys = Activity::findFirst($id);

      if (!$activitys) {
          $this->flashSession->error("activity does not exist " . $idActivity);

          $this->dispatcher->forward([
              'controller' => "teacher",
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
              'controller' => "teacher",
              'action' => 'acedit'
          ]);

          return;
      }

      $this->flashSession->success("Activity was created successfully");

      $this->dispatcher->forward([
          'controller' => "teacher",
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
            'controller' => "teacher",
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
                'controller' => "teacher",
                'action' => 'activityList'
            ]);

            return;
        }
        $this->view->idActivity = $activity->idActivity;
        }
  }

  public function showstdAction($x)
  {
    $numberPage = $this->request->getQuery("page", "int");
    $student = Student::find(
    [
      "year =".$x,
    ]
    );
  
    $paginator = new Paginator([
      'data' => $student,
      'limit'=> 50,
      'page' => $numberPage
    ]);
    $this->view->page = $paginator->getPaginate();

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





  /**
   * Displays the creation form
   */


  /**
   * Edits a teacher
   *
   * @param string $idTeacher
   */

  // Controller about student

}
