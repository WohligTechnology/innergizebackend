<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");
class Json extends CI_Controller
{function getallcontact()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`innergizebackend_contact`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`innergizebackend_contact`.`company`";
$elements[1]->sort="1";
$elements[1]->header="company";
$elements[1]->alias="company";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`innergizebackend_contact`.`phone`";
$elements[2]->sort="1";
$elements[2]->header="phone";
$elements[2]->alias="phone";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`innergizebackend_contact`.`phone`";
$elements[3]->sort="1";
$elements[3]->header="phone";
$elements[3]->alias="phone";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`innergizebackend_contact`.`email`";
$elements[4]->sort="1";
$elements[4]->header="email";
$elements[4]->alias="email";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`innergizebackend_contact`.`website`";
$elements[5]->sort="1";
$elements[5]->header="website";
$elements[5]->alias="website";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`innergizebackend_contact`.`comments`";
$elements[6]->sort="1";
$elements[6]->header="comments";
$elements[6]->alias="comments";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `innergizebackend_contact`");
$this->load->view("json",$data);
}
public function getsinglecontact()
{
$id=$this->input->get_post("id");
$data["message"]=$this->contact_model->getsinglecontact($id);
$this->load->view("json",$data);
}
function getallcareer()
{
$elements=array();
$elements[0]=new stdClass();
$elements[0]->field="`innergizebackend_career`.`id`";
$elements[0]->sort="1";
$elements[0]->header="id";
$elements[0]->alias="id";

$elements=array();
$elements[1]=new stdClass();
$elements[1]->field="`innergizebackend_career`.`name`";
$elements[1]->sort="1";
$elements[1]->header="name";
$elements[1]->alias="name";

$elements=array();
$elements[2]=new stdClass();
$elements[2]->field="`innergizebackend_career`.`department`";
$elements[2]->sort="1";
$elements[2]->header="department";
$elements[2]->alias="department";

$elements=array();
$elements[3]=new stdClass();
$elements[3]->field="`innergizebackend_career`.`email`";
$elements[3]->sort="1";
$elements[3]->header="email";
$elements[3]->alias="email";

$elements=array();
$elements[4]=new stdClass();
$elements[4]->field="`innergizebackend_career`.`phone`";
$elements[4]->sort="1";
$elements[4]->header="phone";
$elements[4]->alias="phone";

$elements=array();
$elements[5]=new stdClass();
$elements[5]->field="`innergizebackend_career`.`position`";
$elements[5]->sort="1";
$elements[5]->header="position";
$elements[5]->alias="position";

$elements=array();
$elements[6]=new stdClass();
$elements[6]->field="`innergizebackend_career`.`qualification`";
$elements[6]->sort="1";
$elements[6]->header="qualification";
$elements[6]->alias="qualification";

$search=$this->input->get_post("search");
$pageno=$this->input->get_post("pageno");
$orderby=$this->input->get_post("orderby");
$orderorder=$this->input->get_post("orderorder");
$maxrow=$this->input->get_post("maxrow");
if($maxrow=="")
{
}
if($orderby=="")
{
$orderby="id";
$orderorder="ASC";
}
$data["message"]=$this->chintantable->query($pageno,$maxrow,$orderby,$orderorder,$search,$elements,"FROM `innergizebackend_career`");
$this->load->view("json",$data);
}
public function getsinglecareer()
{
$id=$this->input->get_post("id");
$data["message"]=$this->career_model->getsinglecareer($id);
$this->load->view("json",$data);
}

public function careersSubmit()
{
  $data = json_decode(file_get_contents('php://input'), true);
  $name = $data['name'];
  $department = $data['department'];
  $email = $data['name'];
  $phone = $data['phone'];
  $position = $data['position'];
  $qualification = $data['qualification'];
  $resume = $data['resume'];

    // $name = $this->input->get_post('name');
    // $department = $this->input->get_post('department');
    // $email = $this->input->get_post('email');
    // $phone = $this->input->get_post('phone');
    // $position = $this->input->get_post('position');
    // $qualification = $this->input->get_post('qualification');
      // $url = $this->input->get_post('url');
//     $config['upload_path'] = './uploads/';
//     $config['allowed_types'] = '*';
//     $this->load->library('upload', $config);
//     $filename = 'resume';
//     $resume = '';
//     if ($this->upload->do_upload($filename)) {
//         $uploaddata = $this->upload->data();
//         $resume = $uploaddata['file_name'];
//         $config_r['source_pdf'] = './uploads/'.$uploaddata['file_name'];
//
//         $data['message'] = $this->career_model->careersSubmit($name, $department, $email, $phone,$position,$qualification,$resume);
//         // $data['redirect'] = $url;
//         // $this->load->view('redirect3', $data);
// $this->load->view('json', $data);
//     }
$data['message'] = $this->career_model->careersSubmit($name, $department, $email, $phone,$position,$qualification,$resume);
$this->load->view('json', $data);
  }
public function imageUpload()
{
  $config['upload_path'] = './uploads/';
  $config['allowed_types'] = '*';
  $this->load->library('upload', $config);
  $filename = 'image';
  $image = '';
  if ($this->upload->do_upload($filename)) {
      $uploaddata = $this->upload->data();
      $image = $uploaddata['file_name'];
      $config_r['source_pdf'] = './uploads/'.$uploaddata['file_name'];
      $data['message']->name=$image;
      $this->load->view('json', $data);
  }
}
public function contactSubmit()
{
    $data = json_decode(file_get_contents('php://input'), true);
    $name = $data['name'];
    $company = $data['company'];
    $email = $data['email'];
    $phone = $data['phone'];
    $website = $data['website'];
    $comments = $data['comments'];
    $services = $data['services'];
    $data['message'] = $this->contact_model->contactSubmit($name, $company, $email, $phone,$website,$comments,$services);
    $this->load->view('json', $data);

}
} ?>
