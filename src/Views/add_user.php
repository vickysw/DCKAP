<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User Management!</title>
    <style type="text/css">
        .error{
            color: darkred;
            font-weight: bold;
        }
    </style>
  </head>
  <body>
    <div class="container p-3 my-3 border">
        <?php
        $id = isset($users['id']) ? $users['id']: '';
        $email = isset($users['email']) ? $users['email']: '';
        $name = isset($users['name']) ? $users['name']: '';
        $dob = isset($users['dob']) ? $users['dob']: '';
        $education_id = isset($users['education_id']) ? $users['education_id']: '';
        $country_id = isset($users['country_id']) ? $users['country_id']: '';
        $city_id = isset($users['city_id']) ? $users['city_id']: '';
        $address = isset($users['address']) ? $users['address']: '';
        $zip = isset($users['pincode']) ? $users['pincode']: '';
        $status = (isset($users['status']) && $users['status'] != 0) ? 'active':'inactive';
        $profile_pic = isset($users['profile_pic']) ? '/'.UPLOAD_PATH.'/'.$users['profile_pic']: '';

        ?>
        <div class="row">
             <div class="col align-self-start">
                <h1>Add/Edit User</h1>
            </div>
            <div class="col-auto mr-auto">
                <a href="<?php echo ACTION_PATH.'/test/getUser' ?>" type="button" class="btn btn-info">User List</a>
            </div> 
        </div>
        <div class="row">
            <div class="col-auto">
            <form action="<?php if(empty($id)) { echo ACTION_PATH.'/test/addUser'; }else{  echo ACTION_PATH.'/test/editUser/'.$id; } ?>" id="add_user" method="post" enctype="multipart/form-data">
                   <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required value="<?php echo $name; ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="dob">Date Of Birth</label>
                      <input type="date" name="dob" class="form-control" id="dob" placeholder="Date Of birth" required value="<?php echo $dob; ?>">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="education">Education</label>
                      <select id="education" name="education_id" class="form-control">
                        <option selected>Choose...</option>
                        <?php  if(isset($education)) {?>
                            <?php foreach($education as $key=>$value){ 
                                 $selected_edu = ""; 
                                 if($value['id'] == $education_id)
                                    $selected_edu = "selected";
                                ?>
                                <option value="<?php echo $value['id']?>" <?php echo $selected_edu; ?> ><?php echo $value['degree_name']?></option>
                            <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea  class="form-control" name="address" id="address" placeholder="Apartment, studio, or floor"><?php echo $address; ?></textarea>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="country">Country</label>
                      <select id="country" name="country_id" onchange="getCityList(this)" class="form-control">
                        <option selected>Choose...</option>
                        <?php  if(isset($country)) {?>
                            <?php foreach($country as $k=>$v){
                                 $selected_country = ""; 
                                 if($v['id'] == $country_id)
                                    $selected_country = "selected";
                                ?>
                                <option value="<?php echo $v['id']?>" <?php echo $selected_country; ?>><?php echo $v['country_name']?></option>
                            <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="city">City</label>
                      <select id="city" name="city_id"  class="form-control">
                       <?php  if(isset($city)) { ?>
                            <?php foreach($city as $ck=>$cv){ 
                                 $selected_city = ""; 
                                 if($cv['id'] == $city_id)
                                    $selected_city = "selected";
                                ?>
                                <option value="<?php echo $cv['id']?>" <?php echo $selected_city; ?>><?php echo $cv['city_name']?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                    </div>
                    
                    <div class="form-group col-md-2">
                      <label for="inputZip">Zip</label>
                      <input type="text" name="pincode" class="form-control" id="inputZip" value="<?php echo $zip; ?>">
                    </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="form-check">
                       <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                          <label class="form-check-label" for="status">
                            Active
                          </label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" id="status1" value="0" <?php if(($status == 'inactive')){?> checked <?php } ?>>
                          <label class="form-check-label" for="status1">
                            Inactive
                          </label>
                        </div>
                  </div>
                   <div class="form-group col-md-6">
                    <div class="form-check">
                       <input type="file" name="profile_pic"  accept="image/gif, image/jpeg, image/png" class="custom-file-input <?php if(empty($profile_pic)){ echo 'required'; }?>" id="customFile"  onchange="loadFile(event)">
                            <label class="custom-file-label" for="customFile" >Profile pic</label>
                     <p><img id="output" width="200" src="<?php echo $profile_pic; ?>" /></p>
                    </div>
                  </div>
              </div>
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="reset" class="btn btn-danger">Reset</button>
            </form>
        </div>
     </div>
    </div>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</html>
<script>
var PATH = '<?php echo $_SERVER['SCRIPT_NAME'];?>';
var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
$(document).ready( function () {
    $("#add_user").validate();
} );

function getCityList(obj)
{
    var country_id = obj.value;
    if(country_id)
    {
        $.ajax({
            url :PATH + "/test/get_city", 
            data: {id:country_id},
            type: "post",        
            error: function(){
            },
            success: function ( json ) 
            {
                if(json){
                    $('#city').html(json);
                }else{
                    $('#city').empty();
                }
            }
        });
    }
}
</script>