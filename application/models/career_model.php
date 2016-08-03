<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class career_model extends CI_Model
{
public function create($name,$department,$email,$phone,$position,$qualification)
{
$data=array("name" => $name,"department" => $department,"email" => $email,"phone" => $phone,"position" => $position,"qualification" => $qualification);
$query=$this->db->insert( "innergizebackend_career", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_career")->row();
return $query;
}
function getsinglecareer($id){
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_career")->row();
return $query;
}
public function edit($id,$name,$department,$email,$phone,$position,$qualification)
{
if($image=="")
{
$image=$this->career_model->getimagebyid($id);
$image=$image->image;
}
$data=array("name" => $name,"department" => $department,"email" => $email,"phone" => $phone,"position" => $position,"qualification" => $qualification);
$this->db->where( "id", $id );
$query=$this->db->update( "innergizebackend_career", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `innergizebackend_career` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `innergizebackend_career` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `innergizebackend_career` ORDER BY `id`
                    ASC")->row();
$return=array(
"" => "Select Option"
);
foreach($query as $row)
{
$return[$row->id]=$row->name;
}
return $return;
}
public function careersSubmit($name, $department, $email, $phone,$position,$qualification,$resume)
{
  if(!empty($email)){
    $query = $this->db->query("INSERT INTO `innergizebackend_career`(`name`, `department`, `email`, `phone`, `position`, `qualification`,`resume`) VALUES ('$name','$department','$email','$phone','$position','$qualification','$resume')");
    if(!$query)
    {
      $obj = new stdClass();
      $obj->value= false;
    }
    else
    {
      $message = "<html><body><div id=':1fn' class='a3s adM' style='overflow: hidden;'>
      <p style='color:#000;font-family:Roboto;font-size:14px'>Name : $name <br/>
    Phone : $phone <br/>
    Department : $department <br/>
    Position : $position <br/>
    Email : $email <br/>
    Qualification : $qualification
      </p>
    </div></body></html>";
      $this->email_model->emailer($message,'Career Form Submission',$email,$username);
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
