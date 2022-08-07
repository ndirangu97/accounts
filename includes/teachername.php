<?php

// print_r($DATA_OBJECT);

if ($DATA_OBJECT->chaser=="") {
        
    $name=$DATA_OBJECT->name;
    $sql=false;
   
    

    $sql="SELECT * FROM teachers WHERE name LIKE '%$name%'   ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $mess.="
            <a href='moreteacher.php?id=$row->userid' style='text-decoration:none;color:inherit'>
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
            <p style='font-size: 18px'>$row->name </p>
            <p></p>
          </div>
        </div>
      </div>
      </a>
            ";
        }
       
    
        
    }else {
        $mess.="No teacher with such name";
    }
    $info->message =$mess;
    $info->message2 =$mess2;
    $info->type = "name";
    echo json_encode($info);
    
}elseif($DATA_OBJECT->chaser=="admin") {
        
    $name=$DATA_OBJECT->name;
    $sql=false;
    $resultsPerPage=16;
    // $admin=$DATA_OBJECT->chaser;

    $sql="SELECT * FROM teachers WHERE name LIKE '%$name%' and admin=1 ";
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
    

    $sql="SELECT * FROM teachers WHERE name LIKE '%$name%' and admin=1 LIMIT $pgFirstResult,$resultsPerPage  ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $mess.="
            <a href='moreteacher.php?id=$row->userid' style='text-decoration:none;color:inherit'>
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
            <p></p>
          </div>
        </div>
      </div>
      </a>
            ";
        }
        for ($page = 1; $page <= $pages; $page++) {
            $mess2.= " <a class='linksa' href='admins.php?pg=$page'>$page</a>";
        }
    
        
    }else {
        $mess.="No admin with such name";
    }
    $info->message =$mess;
    $info->message2 =$mess2;
    $info->type = "name";
    echo json_encode($info);
    
}
elseif($DATA_OBJECT->chaser=="classteacher") {
        
    $name=$DATA_OBJECT->name;
    $sql=false;


    
    $sql=false;
    

    $sql="SELECT * FROM teachers WHERE name LIKE '%$name%' and classteacher=1 ";
    $results=$DB->read($sql,[]);
    if (is_array($results)) {
        foreach ($results as $row) {
            $mess.="
            <a href='moreteacher.php?id=$row->userid' style='text-decoration:none;color:inherit'>
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
            <p style='font-size: 18px'>$row->name </p>
            <p></p>
          </div>
        </div>
      </div>
      </a>
            ";
        }
        for ($page = 1; $page <= $pages; $page++) {
            $mess2.= " <a class='linksa' href='admins.php?pg=$page'>$page</a>";
        }
    
        
    }else {
        $mess.="No classteacher with such name";
    }
    $info->message =$mess;
    $info->message2 =$mess2;
    $info->type = "name";
    echo json_encode($info);
    
}