<?php
// print_r($DATA_OBJECT);        
    $name=$DATA_OBJECT->name;
    $sql=false;
    $resultsPerPage=16;

    $sql="SELECT * FROM students WHERE name LIKE '%$name%' ";
    $resultsc=$DB->read($sql,[]);
    if (is_array($resultsc)) {
        $no = (count($resultsc));
    }else {
       $no=1;
        
    }
    $pages = ceil($no / $resultsPerPage);


    if ($DATA_OBJECT->page=="") {
        $page = 1;
    } else {
        $page = $DATA_OBJECT->page;
    }
    $pgFirstResult = ($page - 1) * $resultsPerPage;


    $resultsPerPage=16;
    $sql=false;
    $g=0;
    

    $sql="SELECT * FROM students WHERE name LIKE '%$name%' and  graduated!='$g' LIMIT $pgFirstResult,$resultsPerPage  ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $mess.="
            
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
            <img src='$row->img' style='width: 100px; height: 100px; border-radius: 50%' />
          </div>
          <div style='
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
              '>
            <p style='font-size: 18px'>$row->name</p>
            <p>Grad: $row->yearleft</p>
          </div>
        </div>
      </div>
            ";
        }
        for ($page = 1; $page <= $pages; $page++) {
            $mess2.= " <a class='linksa' href='pupils.php?pg=$page'>$page</a>";
        }
    
        
    }else {
        $mess.="No Pupil with such name";
    }
    $info->message =$mess;
    $info->message2 =$mess2;
    $info->type = "name";
    echo json_encode($info);
   