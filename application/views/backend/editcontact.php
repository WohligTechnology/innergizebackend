<div class="row">
<div class="col s12">
<h4 class="pad-left-15 capitalize">Edit contact</h4>
</div>
</div>
<div class="row">
<form class='col s12' method='post' action='<?php echo site_url("site/editcontactsubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="row">
<div class="input-field col s6">
<label for="company">company</label>
<input type="text" id="company" name="company" value='<?php echo set_value('company',$before->company);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="phone">phone</label>
<input type="text" id="phone" name="phone" value='<?php echo set_value('phone',$before->phone);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="phone">phone</label>
<input type="text" id="phone" name="phone" value='<?php echo set_value('phone',$before->phone);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="email">email</label>
<input type="text" id="email" name="email" value='<?php echo set_value('email',$before->email);?>'>
</div>
</div>
<div class="row">
<div class="input-field col s6">
<label for="website">website</label>
<input type="text" id="website" name="website" value='<?php echo set_value('website',$before->website);?>'>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>comments</label>
<textarea id="some-textarea" name="comments" placeholder="Enter text ..."><?php echo set_value( 'comments',$before->comments);?></textarea>
</div>
</div>
<div class="row">
<div class="col s12 m6">
<label>services</label>
<textarea id="some-textarea" name="services" placeholder="Enter text ..."><?php echo set_value( 'services',$before->services);?></textarea>
</div>
</div>
<div class="row">
<div class="col s6">
<button type="submit" class="btn btn-primary waves-effect waves-light  blue darken-4">Save</button>
<a href='<?php echo site_url("site/viewcontact"); ?>' class='btn btn-secondary waves-effect waves-light red'>Cancel</a>
</div>
</div>
</form>
</div>
