<?php
// print_r($DATA_OBJECT);
// die;


$globalGrade=1;
if ($DATA_OBJECT->class=="") {
    $sql = false;

    $class = 1;
    $sql = "SELECT * FROM students where class=$class";

    $Allresults = $DB->read($sql, []);
    $resultsPerPage=16;

    if (is_array($Allresults)) {
        $no = (count($Allresults));
    }
    else {
      $no=1;
    }
    $pages = ceil($no / $resultsPerPage);


    if ($DATA_OBJECT->id=="") {
        $page = 1;
    } else {
        $page = $DATA_OBJECT->id;
    }
    $pgFirstResult = ($page - 1) * $resultsPerPage;
   
    $sql = false;
    $data = false;
    $grade = $globalGrade;

    $sql = "SELECT * FROM students WHERE class = $grade LIMIT $pgFirstResult,$resultsPerPage ";
    $results = $DB->read($sql, []);

    if (is_array($results)) {

        foreach ($results as $row) {
            $mess.= "
            
            <div class='card' style='
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            margin-right: 12px;
            margin-bottom: 10px;
            max-height:130px !important ;
          '>
        <div style='display: flex; margin: 4px 6px'>
          <div>
            <img src='$row->img' style='width: 100x; height: 100px; border-radius: 50%' />
          </div>
          <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
              '>
            <p style='font-size: 18px'>$row->name</p>
            <p>$row->class $row->stream</p>
          </div>
        </div>
      </div>
            
            ";

          
        }
        for ($page = 1; $page <= $pages; $page++) {
            $mess2.= " <a class='linksa' href='grade1.php?pg=$page'>$page</a>";
        }

        $info->message =$mess;
        
        $info->message2 =$mess2;
        $info->type = "grade1";
        echo json_encode($info);
    }
}else {
  
    $sql = false;

    $class = 1;
    $stream=$DATA_OBJECT->class;
  
    $sql = "SELECT * FROM students where class=$class and stream ='$stream' ";

    $Allresults = $DB->read($sql, []);
    $resultsPerPage=16;

    if (is_array($Allresults)) {
        $no = (count($Allresults));
    }else {
      $no=1;
    }
    $pages = ceil($no / $resultsPerPage);


    if ($DATA_OBJECT->id=="") {
        $page = 1;
    } else {
        $page = $DATA_OBJECT->id;
    }
    $pgFirstResult = ($page - 1) * $resultsPerPage;
   
    $sql = false;
    $data = false;
    $grade = $globalGrade;

    $sql = "SELECT * FROM students WHERE class = $grade and stream='$stream' LIMIT $pgFirstResult,$resultsPerPage ";
    $results = $DB->read($sql, []);

    if (is_array($results)) {

        foreach ($results as $row) {
            $mess.= "
            
            <div class='card' style='
            display: flex;
            align-items: stretch;
            justify-content: stretch;
            margin-right: 12px;
            margin-bottom: 10px;
            max-height:130px !important ;
          '>
        <div style='display: flex; margin: 4px 6px'>
          <div>
            <img src='$row->img' style='width: 100x; height: 100px; border-radius: 50%' />
          </div>
          <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
              '>
            <p style='font-size: 18px'>$row->name</p>
            <p>$row->class $row->stream</p>
          </div>
        </div>
      </div>
            
            ";

          
        }
        for ($page = 1; $page <= $pages; $page++) {
            $mess2.= " <a class='linksa' href='grade1.php?pg=$page'>$page</a>";
        }

        $info->message =$mess;
        
        $info->message2 =$mess2;
        $info->type = "grade1";
        echo json_encode($info);
    }
}