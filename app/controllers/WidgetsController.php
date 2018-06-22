<?php
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Db\Column;
class WidgetsController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	$this->view->setRenderLevel(View::LEVEL_LAYOUT);
    }
    public function widgetsAction()
    {
    	
    }
    public function LoadAction()
    {
        $data = array();
        $config = [
        "host"     => "localhost",
        "dbname"   => "gdien",
        "port"     => 3306,
        "username" => "root",
        "password" => "",'charset'   =>'utf8'];
        $connection = new Mysql($config);
        $result = $connection->fetchall("SELECT * FROM events ORDER BY id");
        foreach ($result as $row) {
             $data[] = array(
              'id'      => $row["id"],
              'title'   => $row["title"],
              'start'   => $row["start_event"],
              'end'     => $row["end_event"]
             );
            }
        echo json_encode($data);
        $this ->view->disable();
    }
    public function InsertAction()
    {
        $connect = new Events();
        $title = $this ->request->getPOST('title');
        if($title !== "" )
        {
          $array=array(
           'title'  => $this ->request->getPOST('title'),
           'start_event' => $this ->request->getPOST('start'),
           'end_event' => $this ->request->getPOST('end')
          );
         $connect ->assign($array);
         $connect->save();
        }
    }
    public function UpdateAction()
    {
        $config = [
        "host"     => "localhost",
        "dbname"   => "gdien",
        "port"     => 3306,
        "username" => "root",
        "password" => "",'charset'   =>'utf8'];
        $connection = new Mysql($config);
        $id = $this->request->getPOST("id");
        if($id)
        {
           $title       = $this->request->getPOST('title');
           $start_event = $this->request->getPOST('start');
           $end_event   = $this->request->getPOST('end');
           $id          = $this->request->getPOST('id');
             $query = "UPDATE events 
             SET title='$title', start_event='$start_event', end_event='$end_event'
             WHERE id='$id'";
             $statement= $connection->query($query);
        }
    }
    public function DeleteAction()
    {
        $config = [
        "host"     => "localhost",
        "dbname"   => "gdien",
        "port"     => 3306,
        "username" => "root",
        "password" => "",'charset'   =>'utf8'];
        $connection = new Mysql($config);
        $id = $this->request->getPOST("id");
        if($id)
        {
        $query = "DELETE from events WHERE id='$id'";
        $statement= $connection->query($query);
    }
    
}

}

