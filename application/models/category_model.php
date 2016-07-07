<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class category_model extends CI_Model
{
public function create($name,$description,$order)
{
$data=array("name" => $name,"description" => $description,"order" => $order);
$query=$this->db->insert( "innergizebackend_category", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_category")->row();
return $query;
}
function getsinglecategory($id){
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_category")->row();
return $query;
}
public function edit($id,$name,$description,$order)
{
$data=array("name" => $name,"description" => $description,"order" => $order);
$this->db->where( "id", $id );
$query=$this->db->update( "innergizebackend_category", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `innergizebackend_category` WHERE `id`='$id'");
return $query;
}

public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `innergizebackend_category` ORDER BY `id`
                    ASC")->result();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}


public function categorySubmit($name, $department, $email, $phone,$position,$qualification,$resume)
{
  if(!empty($email)){
    $query = $this->db->query("INSERT INTO `innergizebackend_category`(`name`, `department`, `email`, `phone`, `position`, `qualification`,`resume`) VALUES ('$name','$department','$email','$phone','$position','$qualification','$resume')");
    if(!$query)
    {
      $obj = new stdClass();
      $obj->value= false;
    }
    else
    {
      $obj = new stdClass();
      $obj->value= true;
    }
  }
else {
  $obj = new stdClass();
  $obj->value= "Enter Email ID";
}
  return  $obj;
}
}
?>
