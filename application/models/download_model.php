<?php
if ( !defined( "BASEPATH" ) )
exit( "No direct script access allowed" );
class download_model extends CI_Model
{
public function create($name,$category,$order,$pdf)
{
$data=array("name" => $name,"category" => $category,"order" => $order,"pdf" => $pdf);
$query=$this->db->insert( "innergizebackend_download", $data );
$id=$this->db->insert_id();
if(!$query)
return  0;
else
return  $id;
}
public function beforeedit($id)
{
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_download")->row();
return $query;
}
function getsingledownload($id){
$this->db->where("id",$id);
$query=$this->db->get("innergizebackend_download")->row();
return $query;
}
public function edit($id,$name,$category,$order,$pdf)
{
if($pdf=="")
{
$pdf=$this->download_model->getpdfbyid($id);
$pdf=$pdf->pdf;
}
$data=array("name" => $name,"category" => $category,"order" => $order,"pdf" => $pdf);
$this->db->where( "id", $id );
$query=$this->db->update( "innergizebackend_download", $data );
return 1;
}
public function delete($id)
{
$query=$this->db->query("DELETE FROM `innergizebackend_download` WHERE `id`='$id'");
return $query;
}
public function getpdfbyid($id)
{
$query=$this->db->query("SELECT `pdf` FROM `innergizebackend_download` WHERE `id`='$id'")->row();
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


public function downloadsSubmit($name, $department, $email, $phone,$position,$qualification,$resume)
{
  if(!empty($email)){
    $query = $this->db->query("INSERT INTO `innergizebackend_download`(`name`, `department`, `email`, `phone`, `position`, `qualification`,`resume`) VALUES ('$name','$department','$email','$phone','$position','$qualification','$resume')");
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
