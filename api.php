<?php

session_start();

require_once 'initial.php';
$get=file_get_contents("php://input");
$convert=json_decode($get);
//print_r($convert);

if (!(isset($_SESSION['email']))) {
    $logs=(object)[];
    //
    if ((isset($convert->type) && $convert->type!="signin") && (isset($convert->type) && $convert->type!="login")) {

    
        $logs->message="nologin";
        echo json_encode($logs);
        //echo "hi";
        die;
    }
    
}
//die;
$error="";
$info=(object)[];
$call = new database();
if (isset($convert->type) && $convert->type=="signin" ) {
    
    $username=$convert->username;
    $password=$convert->password;
    $email=$convert->email;

    if (!empty($username) && !empty($password) && !empty($email)) {
        $passlen = strlen($password);
        $len = strlen($username);
         
        if (preg_match("/^[a-zA-Z]*$/" , $username) == 1) {
                
            if ($len>3) {
                
                if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
                

                    if ($passlen>8 && $passlen<14) {
                        
                        
                        
                    }
                
                    else{

                        $error.="Password length should be greater than 8 and less than 14";
                    }        
                    

                }
                else{
                    $error.="e-mail id does'nt exists";
                }

            }
            else{
                $error.="Name should be greater than 3";
            }
    
        }
        else{

            $error.=" No special characters and numbers are allowed in username";

        }

    

    
    }
    else{

        $error.="All fields must required";
        
    }
    if ($error=="") {
    
        # code..
        $data=false;
        $data['username']=$convert->username;
        $data['email']=$convert->email;
        $data['password']=$convert->password;
        $rdata=false;
        $rdata['email']=$convert->email;
        $rquery="select email from data_users where email=:email";
        $fuc=$call->read($rquery,$rdata);
        if ($fuc) {
            $info->message="e-mail id already exists";
            $info->type="error";
            echo json_encode($info);
        }
        else 
        {
            $query="insert into data_users(username,email,password)values(:username,:email,:password)";
            $funcall=$call->write($query,$data);
            
            if ($funcall) {
                $_SESSION['email']=$convert->email;
                $info->message ="signed up";
                $info->type ="true";
                echo json_encode($info);
            }  
            else{
                $info->message="Connection fails";
                $info->type="error";
                echo json_encode($info);
            
            }
        }
        
    }
    else
    {
        $info->message=$error;
        $info->type="error";
        echo json_encode($info);
    }

    
    
}
if (isset($convert->type)&& $convert->type=="login") {
    
    $rdata=false;
   
    $rdata['email']=$convert->email;
    
    $password=$convert->password;
    $email=$convert->email;

    if (!empty($password) && !empty($email)) {
        
         
        
                
    }    
    else
    {

        $error.="All fields must required";
        
    }
    if ($error=="") 
    {
      
        $rquery="select email,password from data_users where email=:email";
        $fuc=$call->read($rquery,$rdata);
      // echo($fuc[0]['password']);
        if ($fuc) {
            if ($password==$fuc[0]['password']) {
                $_SESSION['email']=$convert->email;
               $info->message="go on...";
               $info->type="true";
               echo json_encode($info); 
            }
            else 
            {
                $info->message="Password incorrect";
                $info->type="error";
                echo json_encode($info);
            }
           
        }    
        else
        {
            $info->message="your e-mail id never exists";
            $info->type="error";
            echo json_encode($info);
        }
           
    }
    else 
    {
        $info->message=$error;
        $info->type="error";
        echo json_encode($info);
    }
}
elseif (isset($convert->type) && $convert->type=="desire") {
    $desires=$convert->desires;
    $error="";
    $logs=(object)[];
    if (!empty($desires)) {
        
    }
    else
    {
        $error.="Can't be empty";
    }
    
    if ($error=="") {
            $data=false;
            $data['email']=$_SESSION['email'];
            $data['points']=$desires;
            $data['checkornot']=0;
            $query="insert into desire(email,points,checkornot)values(:email,:points,:checkornot)";
            $funcall=$call->write($query,$data);
            
            if ($funcall) {
                $logs->message ="saved successfully";
                $logs->type ="saved";
                echo json_encode($logs);
            }  
            else{
                $logs->message="Connection fails";
                $logs->type="error";
                echo json_encode($logs);
            
            }
    }
    else
    {
        $logs->type="error";
        $logs->message=$error;
        echo json_encode($logs);
    
    }
    
}    
    
   
elseif (isset($convert->type) && $convert->type=="info") {
    // if (isset($_SESSION['username'])) {
        $logs=(object)[];
        $logs->message="infogets";
        $data=false;
        $arr=[];

        $data['email']=$_SESSION['email'];
        $rquery="select title from main where email=:email";
        $fuc=$call->read($rquery,$data);
        if ($fuc) {
            //print_r($fuc);
            foreach ($fuc as $key => $value) {
                array_push($arr,$value['title']);
            }
           $logs->title=$arr;
        }
        else
            $logs->title="none";
        
        echo json_encode($logs);
        
}
elseif (isset($convert->type) && $convert->type=="checkbox") {
   
        $info=(object)[];
       
        $data=false;
        $arr=[];

        $data['email']=$_SESSION['email'];
        $data['points']=$convert->points;
        $data['checkornot']=$convert->check;
        
        $query="update desire set checkornot=:checkornot where email=:email and points=:points";
        
        $fuc=$call->write($query,$data);
        
        if ($fuc) {
            
            $info->message ="updated your list";
            $info->type ="saved";
            echo json_encode($info);
        }  
        else{
            $info->message="Something went wrong";
            $info->type="error";
            echo json_encode($info);
        
        }
        
}
elseif (isset($convert->type) && $convert->type=="desinfo") {
    // if (isset($_SESSION['username'])) {
        $logs=(object)[];
        $logs->message="dinfogets";
        $data=false;
        $arr=[];
        $arr2=[];

        $data['email']=$_SESSION['email'];
        $rquery="select points,checkornot from desire where email=:email";
        $fuc=$call->read($rquery,$data);
        if ($fuc) {
            /*print_r($fuc);
            foreach ($fuc as $key => $value) {
                array_push($arr,$value['points']);
                
                
            }*/
            
           $logs->desire=$fuc;
          // $logs->check=$arr2;
          
        }
        else
            $logs->desire="none";
        
        echo json_encode($logs);
        
}

elseif (isset($convert->type) && $convert->type=="content") {
   $cerror="";
   $x=0;
    $title=$convert->title;
    $tlen=strlen($title);
    $notes=$convert->notes;
    $logs=(object)[];

    if (!empty($title)) {
        
        if (!empty($notes)) {
            if ($tlen<14) {
                
            }
            else
            {
                $cerror .="Title length should be below 14";
            }
        }
        else
            $cerror.="Fill the content";
    }
    else
    {
        $cerror.="Enter the title";
    }
    if ($cerror=="") {
        $rdata=false;
        $rdata['email']=$_SESSION['email'];
        $rquery="select title from main where email=:email";
        $fuc=$call->read($rquery,$rdata);
        if ($fuc) {
            foreach ($fuc as $key => $value) {
                if (strtolower($value['title'])==strtolower($title)) {
                    $x=1;
                    break;
                }
             }
        }
        
        if ($x==1) {
            $info->message="Title already exists";
            $info->type="error";
            echo json_encode($info);
            
        }
        else
        {
            $query="insert into main(email,title,content)values(:email,:title,:content)";
            $data=false;
            $data['email']=$_SESSION['email'];
            $data['title']=$title;
            $data['content']=$notes;
            $funcall=$call->write($query,$data);
            
            if ($funcall) {
               
                $info->message ="saved successfully";
                $info->type ="saved";
                echo json_encode($info);
            }  
            else{
                $info->message="Something went wrong";
                $info->type="error";
                echo json_encode($info);
            
            }
        }
        
    }
    else
    {
        $logs->message=$cerror;
        $logs->type="error";
        echo json_encode($logs);
    }
}
else if (isset($convert->type) && $convert->type=="contentcollector") {
    $rdata=false;
    $logs=(object)[];
    $rdata['title']=$convert->title;
    $rdata['email']=$_SESSION['email'];
    $rquery="select content from main where email:=email and title=:title";
    $fuc=$call->read($rquery,$rdata);
    if ($fuc) {
        $logs->type="received";
        $logs->title=$convert->title;
        $logs->content=$fuc[0]['content'];
        echo json_encode($logs);
        
    }
    
}
else if (isset($convert->type) && $convert->type=="shopget") {
    $rdata=false;
    $logs=(object)[];
    $rdata['title']=$convert->title;
    $rdata['email']=$_SESSION['email'];

    $logs->type="get";
    $rquery="select commodity,quantity,price from shoplist where email=:email and title=:title";
    $fuc=$call->read($rquery,$rdata);
    if ($fuc) {
        $logs->message=$fuc;
        echo json_encode($logs);
       /* $logs->type="get";
        $logs->commodity=$fuc[0]['commodity'];
        $logs->quantity=$fuc[0]['quantity'];
        $logs->price=$fuc[0]['price'];
        echo json_encode($logs);*/
        
    }
    else
    {
        
        $logs->message="empty";
        echo json_encode($logs);
    }
    
}
else if (isset($convert->type) && $convert->type=="secondread") {
    $rdata=false;
    $logs=(object)[];
    $rdata['title']=$convert->title;
    $rdata['email']=$_SESSION['email'];

    $logs->type="secondget";
    $rquery="select commodity,quantity,price from shoplist where email=:email and title=:title";
    $fuc=$call->read($rquery,$rdata);
    if ($fuc) {
        $logs->message=$fuc;
        echo json_encode($logs);
       /* $logs->type="get";
        $logs->commodity=$fuc[0]['commodity'];
        $logs->quantity=$fuc[0]['quantity'];
        $logs->price=$fuc[0]['price'];
        echo json_encode($logs);*/
        
    }
    else
    {
        
        $logs->message="empty";
        echo json_encode($logs);
    }
    
}
elseif (isset($convert->type) && $convert->type=="logout") {
    $logs=(object)[];
    //echo "hi";
    if (isset($_SESSION['email'])) {
        unset($_SESSION['email']);
    }
    $logs->message="nologin";
    echo json_encode($logs);
    
}
elseif (isset($convert->type) && $convert->type=="update") {
    $uerror="";
    $x=0;
     $title=$convert->title;
     $oldtitle=$convert->oldtitle;
     
     $tlen=strlen($title);
     $notes=$convert->notes;
     $logs=(object)[];
 
     if (!empty($title)) {
         
         if (!empty($notes)) {
             if ($tlen<14) {
                 
             }
             else
             {
                 $uerror .="Title length should be below 14";
             }
         }
         else
             $uerror.="Fill the content";
     }
     else
     {
         $uerror.="Enter the title";
     }
     if ($uerror=="") {
         $rdata=false;
         $rdata['email']=$_SESSION['email'];
         $rdata['oldtitle']=$oldtitle;
         $rquery="select title from main where email=:email and title!=:oldtitle";
         $fuc=$call->read($rquery,$rdata);
         if ($fuc) {
            foreach ($fuc as $key => $value) {
                if (strtolower($value['title'])==strtolower($title)) {
                    $x=1;
                    break;
                }
             }
         }
       
         if ($x==1) {
             $info->message="Title already exists";
             $info->type="error";
             echo json_encode($info);
             
         }
         else
         {
             $query="update main set title=:title,content=:content where email=:email and title=:oldtitle";
             $data=false;
             $data['title']=$title;
             $data['content']=$notes;
             $data['email']=$_SESSION['email'];
             $data['oldtitle']=$oldtitle;
             
             
             $funcall=$call->write($query,$data);
             
             if ($funcall) {
                
                 $info->message ="updated successfully";
                 $info->type ="saved";
                 echo json_encode($info);
             }  
             else{
                 $info->message="Something went wrong";
                 $info->type="error";
                 echo json_encode($info);
             
             }
         }
         
     }
     else
     {
         $logs->message=$uerror;
         $logs->type="error";
         echo json_encode($logs);
     }
    
}
elseif (isset($convert->type) && $convert->type=="delete") {
    $logs=(object)[];
    $title=$convert->oldtitle;
    $data['title']=$title;
    $data['email']=$_SESSION['email'];
    $query="delete from main where title=:title and email=:email";
    $fuc=$call->write($query,$data);
    if ($fuc) {
        $logs->message="file deleted successfully";
        $logs->type="saved";

    }
    else
    {
        $logs->message="connection failed";
        $logs->type="error";
    }
    echo json_encode($logs);
}
elseif (isset($convert->type) && $convert->type=="pdelete") {
    $logs=(object)[];
    $points=$convert->content;
    $data['points']=$points;
    $data['email']=$_SESSION['email'];
    $query="delete from desire where points=:points and email=:email";
    $fuc=$call->write($query,$data);
    if ($fuc) {
        $logs->message="file deleted successfully";
        $logs->type="saved";

    }
    else
    {
        $logs->message="connection failed";
        $logs->type="error";
    }
    echo json_encode($logs);
}
elseif (isset($convert->type) && $convert->type=="read") {
    $logs=(object)[];
    $data=false;
    $data['email']=$_SESSION['email'];
    $query="select title from shop where email=:email";
    $fuc=$call->read($query,$data);
    if ($fuc) {
        $logs->message=$fuc;
        $logs->type="read";

    }
    else
    {
        $logs->message=0;
        $logs->type="read";
    }
    echo json_encode($logs);
}
elseif (isset($convert->type) && $convert->type=="shopsave") {
    $info=(object)[];
    $data=false;
    $data['email']=$_SESSION['email'];
    $data['title']=$convert->title;
    $query="insert into shop(email,title)values(:email,:title)";
    $funcall=$call->write($query,$data);
    
    if ($funcall) {
       
        $info->message ="new list created";
        $info->type ="saved";
        echo json_encode($info);
    }  
    else{
        $info->message="Something went wrong";
        $info->type="error";
        echo json_encode($info);
    
    }
}
elseif (isset($convert->type) && $convert->type=="tabsave") {
    $info=(object)[];
    $data=false;
    $data['email']=$_SESSION['email'];
    $data['title']=$convert->title;
    $data['commodity']=$convert->commodity;
    $data['quantity']=$convert->quantity;
    $data['price']=$convert->price;
    $query="insert into shoplist(email,commodity,quantity,price,title)values(:email,:commodity,:quantity,:price,:title)";
    $funcall=$call->write($query,$data);
    
    if ($funcall) {
       
        $info->message ="new row added";
        $info->type ="saved";
        echo json_encode($info);
    }  
    else{
        $info->message="Something went wrong";
        $info->type="error";
        echo json_encode($info);
    
    }
}


