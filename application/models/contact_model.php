<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class contact_model extends CI_Model
{
public function create($company,$phone,$email,$website,$comments)
{
$data=array("company" => $company,"phone" => $phone,"email" => $email,"website" => $website,"comments" => $comments);
$query=$this->db->insert( "innergizebackend_contact", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_contact")->row();
return $query;
}
function getsinglecontact($id){
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_contact")->row();
return $query;
}
public function edit($id,$company,$phone,$email,$website,$comments)
{
if($image=="")
{
$image=$this->contact_model->getimagebyid($id);
$image=$image->image;
}
$data=array("company" => $company,"phone" => $phone,"email" => $email,"website" => $website,"comments" => $comments);
$this->db->where( "id", $id );
$query=$this->db->update( "innergizebackend_contact", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `innergizebackend_contact` WHERE `id`='$id'");
return $query;
}
public function getimagebyid($id)
{
$query=$this->db->query("SELECT `image` FROM `innergizebackend_contact` WHERE `id`='$id'")->row();
return $query;
}
public function getdropdown()
{
$query=$this->db->query("SELECT * FROM `innergizebackend_contact` ORDER BY `id`
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
public function contactSubmit($name, $company, $email, $phone,$website,$comments)
{
  if(!empty($email)){
    $query = $this->db->query("INSERT INTO `innergizebackend_contact`(`name`,`company`, `phone`, `email`, `website`, `comments`) VALUES ('$name','$company','$phone','$email','$website','$comments')");
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
