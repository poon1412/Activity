<?php
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\Select;
class StudentController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {

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
}
