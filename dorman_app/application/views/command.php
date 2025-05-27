<html>
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600);

* {
	margin:0;
	padding:0;
	box-sizing:border-box;
	-webkit-box-sizing:border-box;
	-moz-box-sizing:border-box;
	-webkit-font-smoothing:antialiased;
	-moz-font-smoothing:antialiased;
	-o-font-smoothing:antialiased;
	font-smoothing:antialiased;
	text-rendering:optimizeLegibility;
}

body {
	font-family:"Open Sans", Helvetica, Arial, sans-serif;
	font-weight:300;
	font-size: 12px;
	line-height:30px;
	color:#777;
	background:#0CF;
}

.container {
	max-width:400px;
	width:100%;
	margin:0 auto;
	position:relative;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea, #contact button[type="submit"] { font:400 12px/16px "Open Sans", Helvetica, Arial, sans-serif; }

#contact {
	background:#F9F9F9;
	padding:25px;
	margin:50px 0;
}

#contact h3 {
	color: #F96;
	display: block;
	font-size: 30px;
	font-weight: 400;
}

#contact h4 {
	margin:5px 0 15px;
	display:block;
	font-size:13px;
}

fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact input[type="text"], #contact input[type="email"], #contact input[type="tel"], #contact input[type="url"], #contact textarea {
	width:100%;
	border:1px solid #CCC;
	background:#FFF;
	margin:0 0 5px;
	padding:10px;
}

#contact input[type="text"]:hover, #contact input[type="email"]:hover, #contact input[type="tel"]:hover, #contact input[type="url"]:hover, #contact textarea:hover {
	-webkit-transition:border-color 0.3s ease-in-out;
	-moz-transition:border-color 0.3s ease-in-out;
	transition:border-color 0.3s ease-in-out;
	border:1px solid #AAA;
}

#contact textarea {
	height:100px;
	max-width:100%;
  resize:none;
}

#contact button[type="submit"] {
	cursor:pointer;
	width:100%;
	border:none;
	background:#0CF;
	color:#FFF;
	margin:0 0 5px;
	padding:10px;
	font-size:15px;
}

#contact button[type="submit"]:hover {
	background:#09C;
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }

#contact input:focus, #contact textarea:focus {
	outline:0;
	border:1px solid #999;
}
::-webkit-input-placeholder {
 color:#888;
}
:-moz-placeholder {
 color:#888;
}
::-moz-placeholder {
 color:#888;
}
:-ms-input-placeholder {
 color:#888;
}

</style>

<head>

</head>
<body>
<div class="container">
<form id="contact" action="Command_sequence/save_command" method="post">
	<input name="contacts" id="contacts_hidden" style="display:none">
	<h3>Command Sequence</h3>
    <h4>Select vehicle and add commands</h4>
    <h4 style="color:red"><?php if(isset($error_msg) && $error_msg != ""){
    	echo $error_msg;
    } ?></h4>
    <h4 style="color:green"><?php if(isset($message) && $message != ""){
    	echo $message;
    } ?></h4>
    <fieldset>
    <select id="cars" tabindex="1" name="vehicle_id" required>
    	<option value="">Select Vehicle</option>
    	<?php foreach($vehicles as $vehicle){ ?> 
         <option value="<?php echo $vehicle->id; ?>"><?php echo $vehicle->make; ?></option>
    	<?php } ?>
    </select>
    </fieldset>

    <fieldset>
      <input placeholder="Command Number" name="cmd_no" type="text" tabindex="2" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="Command" name="cmd" type="text" tabindex="3" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="Response" name="response" type="text" tabindex="4" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="Delay" name="delay" type="text" tabindex="5" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="CMD to Redirect" name="cmd_to_redirect" type="text" tabindex="6" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="Check Response" name="check_response" type="text" tabindex="7" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="Message Display" name="message_display" type="text" tabindex="8" autofocus>
    </fieldset>
     <fieldset>
      <input placeholder="Image Show" name="img_show" type="text" tabindex="9" autofocus required>
    </fieldset>
     <fieldset>
      <input placeholder="Skip Check Response" name="skip_check_response" type="text" tabindex="10" autofocus required>
    </fieldset>
    <fieldset>
      <input placeholder="CMD Multi" name = "cmd_multi" id="cmd_multi" type="text" tabindex="11" autofocus>
      <input placeholder="Result to Show" name = "result_to_show" id="result_to_show" type="text" tabindex="12" autofocus>
      <input placeholder="Next CMD" name = "next_cmd" id="next_cmd" type="text" tabindex="13" autofocus>
      <input type="button" value="ADD" id="add" onclick="javascript:addContact();">
    </fieldset>
		<div id="contacts"></div>
	<fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
</form>
</div>
<script>
contacts=[];
function addContact(){
var cmd_multi=document.getElementById("cmd_multi");
var result_to_show=document.getElementById("result_to_show");
var next_cmd=document.getElementById("next_cmd");
contacts.push(cmd_multi.value+"|"+result_to_show.value+"|"+next_cmd.value);
cmd_multi.value="";   
result_to_show.value="";  
next_cmd.value="";  
render();
}

function deletes(i){
contacts.splice(i,1);
render();
}
//this takes the contacts array and adds it to the page + hidden submit field
function render(){
hidden=document.getElementById("contacts_hidden");
all=document.getElementById("contacts");
content="";
for(i=0;i<contacts.length;i++){
//add a delete button
content+=contacts[i]+"<a href='javascript:deletes("+i+")'>Delete</a>";
}
all.innerHTML=content;
hidden.value=contacts.join(";");
}
</script>
</body>