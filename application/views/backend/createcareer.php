<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Create career</h4>
</div>
<form class='col s12' method='post' action='<?php echo site_url("site/createcareersubmit");?>' enctype= 'multipart/form-data'>
<div class="row">
<div class="input-field col s6">
<label for="name">name</label>
<input type="text" id="name" name="name" value='<?php echo set_value('name');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="department">department</label>
<input type="text" id="department" name="department" value='<?php echo set_value('department');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="email">email</label>
<input type="text" id="email" name="email" value='<?php echo set_value('email');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="phone">phone</label>
<input type="text" id="phone" name="phone" value='<?php echo set_value('phone');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="position">position</label>
<input type="text" id="position" name="position" value='<?php echo set_value('position');?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="qualification">qualification</label>
<input type="text" id="qualification" name="qualification" value='<?php echo set_value('qualification');?>'>
</div>
</div>

<div class="row">
  <div class="file-field input-field col m6 s12">
    <div class="btn blue darken-4">
      <span>Upload CV </span>
      <input name="cv" type="file" multiple>
    </div>
    <div class="file-path-wrapper">
      <input class="file-path validate" type="text" placeholder="Upload one or more files" value="<?php echo set_value('cv');?>">
    </div>
  </div>
</div>
<div class="row">
<div class="col s12 m6">
<button type="submit" class="btn btn-primary waves-effect waves-light blue darken-4">Save</button>
<a href="<?php echo site_url("site/viewcareer"); ?>" class="btn btn-secondary waves-effect waves-light red">Cancel</a>
</div>
</div>
</form>
</div>
