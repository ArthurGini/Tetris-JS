<html>
<body>
    <form method="POST" id="my_form">
       Name:<input type='text' name='name'>
       E-mail:<input type='text' name='email'>
       Gender:<select name='gender'>
       <option value='male'>male</option>
       <option value='female'>female</option>
       </select>
       Message:<textarea name='about'></textarea>
       <input type="button" value="Send" onclick="sendForm()"/>
 </form>

<?php
function sendForm(){
    var form = new FormData($('#form_step4')[0]);
    form.append('view_type','addtemplate');
    $.ajax({
    type: "POST",
    url: "savedata.php",
    data: form,
    cache: false,
    contentType: false,
    processData: false,
        success:  function(data){
            //alert("---"+data);
            alert("Settings has been updated successfully.");
            window.location.reload(true);
        }
    });
}
    echo "
    $_POST['name'];
    $_POST['email'];
    $_POST['gender'];
    $_POST['about'];
    ";  

?>

</body>
<html>
