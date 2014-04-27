

		<div class="three">
			<div class="container">
				<div class="row">
					<div class="span12">
       <style>
       #drop_zone {
border: 2px dashed #bbb;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
padding: 25px;
text-align: center;
font: 20pt bold 'Vollkorn';
color: #bbb;
padding-top:50px;
padding-bottom:50px;
height:400px;
line-height:400px;
margin-bottom:20px;
}


     #drop_zone_results {
border: 2px dashed #bbb;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
padding: 25px;
text-align: center;
font: 20pt bold 'Vollkorn';
color: #bbb;
height:100px;
padding-top:30px;
padding-bottom:30px;
margin-top:20px;
margin-bottom:25px;


}


</style>   
        <div id="drop_zone">     
        Create a Gallery Now! Drag & drop files in the box</div>
         <div id="progress_bar"><div class="percent">0%</div></div>
<output id="list"></output>

 <script>
  

 var reader;
  var progress = document.querySelector('.percent');
var filearray = new Array();
var b;
var filetype;
  function abortRead() {
    reader.abort();
  }

  function errorHandler(evt) {
    switch(evt.target.error.code) {
      case evt.target.error.NOT_FOUND_ERR:
        alert('File Not Found!');
        break;
      case evt.target.error.NOT_READABLE_ERR:
        alert('File is not readable');
        break;
      case evt.target.error.ABORT_ERR:
        break; // noop
      default:
        alert('An error occurred reading this file.');
    };
  }

  function updateProgress(evt) {
    // evt is an ProgressEvent.
    if (evt.lengthComputable) {
      var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
      // Increase the progress bar length.
      if (percentLoaded < 100) {
        progress.style.width = percentLoaded + '%';
        progress.textContent = percentLoaded + '%';
      }
    }
  }
  
  function sendForm() {

  var
     oData = new FormData(document.forms.namedItem("selldown"));

  oData.append("CustomField", "This is some extra data");

  var oReq = new XMLHttpRequest();
  oReq.open("POST", "stash.php", true);
  oReq.onload = function(oEvent) {
    if (oReq.status == 200) {
      oOutput.innerHTML = "Uploaded!";
    } else {
      oOutput.innerHTML = "Error " + oReq.status + " occurred uploading your file.<br \/>";
    }
  };

  oReq.send(oData);

}
  
  

    

  
    function handleFileSelect(evt) {
    evt.stopPropagation();
    evt.preventDefault();
	
	   progress.style.width = '0%';
    progress.textContent = '0%';


    
console.log(evt.dataTransfer.files.length);

for (var i = 0; i< evt.dataTransfer.files.length; i++) {

    reader = new FileReader();
    reader.onerror = errorHandler;
    reader.onprogress = updateProgress;
	
	  reader.onabort = function(e) {
      alert('File read cancelled');
    };
    reader.onloadstart = function(e) {
      document.getElementById('progress_bar').className = 'loading';
    };
    reader.onload = function(e) {
      // Ensure that the progress bar displays 100% at the end.
      progress.style.width = '100%';
      progress.textContent = '100%';
	     var data = e.target.result;
                    		//console.log(data);
							//console.log(e.target.result);
					    //alert("-- Data Length --" + data.length);
							 console.log(data);
						 //console.log(data);
				 window.b = data;
				
        $('#drop_zone_results').append('<div id="inputthumb"><span class="close-btn"><a href="#">X</a></span><img width="100" src="'+ data +'"></div>');
				 ///document.getElementById("addproduct").disabled=false;
				 
			///	 $("#producttitle").show();
				 
				 ///$("input[type=file]").val("");		
      setTimeout("document.getElementById('progress_bar').className='';", 2000);
    }

   reader.readAsDataURL(evt.dataTransfer.files[i]);  
    filearray.push(evt.dataTransfer.files[i]);
}
	   
     console.log(filearray);      
	    ///reader.readAsBinaryString(evt.dataTransfer.files[0]); 
	console.log(evt.dataTransfer.files[0]);
	  ///	console.log(reader.readAsDataURL(evt.dataTransfer.files[0]));
		//	console.log(reader.readAsText(evt.dataTransfer.files[0]));
			//console.log(reader.readAsArrayBuffer(evt.dataTransfer.files[0]));
			
				filetype = evt.dataTransfer.files[0].type;
			var files = evt.dataTransfer.files; // FileList object.

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      //console.log('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                //  f.size, ' bytes, last modified: ',
               //   f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
               //   '</li>');
			//console.log(f.name);	
			//console.log(reader.readAsDataURL(f));
			// var reader1 = new FileReader();
			 ///console.log(reader1.readAsDataURL(f));	
			   
				  
    }    
		   var xhr  = new XMLHttpRequest(),
    data = new FormData();

data.append("files", f); // You don't need to use a FileReader
// append your post fields

// attach your events
xhr.addEventListener('load', function(e) {});
xhr.upload.addEventListener('progress', function(e) {});

//xhr.open('POST', '/process/upload.php', true);
//xhr.send(data);
	
	
    ////var files = evt.dataTransfer.files; // FileList object.
	
	/////console.log(evt.dataTransfer.files[0]);
		//console.log(files[0].name);
		//	console.log(  files[0].type);
				//console.log( files[0].size);
				
			
				 

 //window.b = files[0];
    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
    
  
    
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }
  
  
  function handleDragOver(evt) {
    evt.stopPropagation();
    evt.preventDefault();
    evt.dataTransfer.dropEffect = 'copy'; // Explicitly show this is a copy.
  }
  
   var dropZone = document.getElementById('drop_zone');
  dropZone.addEventListener('dragover', handleDragOver, false);
  dropZone.addEventListener('drop', handleFileSelect, false);
  
  
   

$(document).ready(function() {

          

   $(document).on( "click",'.close-btn a', function() {
   event.preventDefault();
   
    var $li = $(this).closest("#inputthumb");
  var myIndex = $li.parent().children().index( $li );
  //alert( myIndex );
        $(this).closest("#inputthumb").hide();
        
         filearray.splice(myIndex,1);
              console.log(filearray);
 //alert('AAA');
});  
        
  
});


      




</script>

			</div><!--/span4-->
				</div><!--/row-->
        
        		<div class="row">
					<div class="span12">
              <div id="drop_zone_results">  
              
              </div>
          
          </div>
          </div>
          
          
			</div><!--/container-->
		</div><!--/three-->
		
		<div class="white">
			<div class="container">
			

		        
		        <div class="row">
					<div class="span12 middle-headings" id="center">
						<h1>Create your Gallery Now!<br> It's Free! </h1>
            <p> Start a public or private gallery and share with your friends. </p>
					
                        
                        
	<?php if (isset($current_user->email)) : ?>
		<a href="<?php echo site_url(SITE_AREA) ?>" class="btn btn-large btn-success">Go to the Admin area</a>
	<?php else :?>
		<a href="<?php echo site_url(REGISTER_URL); ?>" class="btn btn-large btn-primary">Create free account</a>
	<?php endif;?>


    
    








  <!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Sign up and create your Account </h3>
  </div>
  <div class="modal-body">    <section id="register">
    <h1 class="page-header">Create An Account</h1>
        <div class="alert alert-info fade in">
        <h4 class="alert-heading">Required fields are in <b>bold</b>.</h4>
        Password must be at least 8 characters long.    </div>
    <div class="row-fluid">
        <div class="span12">
            <form action="http://thescoop.us/index.php/register" method="post" accept-charset="utf-8" class="form-horizontal" autocomplete="off"><div style="display:none">
<input type="hidden" name="ci_csrf_token" value="d40cf323f1dba58c14520b4011e482ca">
</div>				<div class="control-group">
    <label class="control-label required" for="email">Email</label>
    <div class="controls">
        <input class="span6" type="text" id="email" name="email" value="">
        <span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="display_name">Display Name</label>
    <div class="controls">
        <input class="span6" type="text" id="display_name" name="display_name" value="">
        <span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label required" for="username">Username</label>
    <div class="controls">
        <input class="span6" type="text" id="username" name="username" value="">
        <span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label required" for="password">Password</label>
    <div class="controls">
        <input class="span6" type="password" id="password" name="password" value="">
        <span class="help-inline"></span>
        <p class="help-block">Password must be at least 8 characters long.</p>
    </div>
</div>
<div class="control-group">
    <label class="control-label required" for="pass_confirm">Password (again)</label>
    <div class="controls">
        <input class="span6" type="password" id="pass_confirm" name="pass_confirm" value="">
        <span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label required" for="language">Language</label>
    <div class="controls">
        <select name="language" id="language" class="chzn-select span6">
                        <option value="english" selected="selected">
                English            </option>
                        <option value="persian">
                Persian            </option>
                        <option value="portuguese">
                Portuguese            </option>
                    </select>
        <span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label required" for="timezones">Timezone</label>
    <div class="controls">
        <select name="timezones" class="span6">
<option value="UM12">(UTC -12:00) Baker/Howland Island</option>
<option value="UM11">(UTC -11:00) Samoa Time Zone, Niue</option>
<option value="UM10">(UTC -10:00) Hawaii-Aleutian Standard Time, Cook Islands, Tahiti</option>
<option value="UM95">(UTC -9:30) Marquesas Islands</option>
<option value="UM9">(UTC -9:00) Alaska Standard Time, Gambier Islands</option>
<option value="UM8" selected="selected">(UTC -8:00) Pacific Standard Time, Clipperton Island</option>
<option value="UM7">(UTC -7:00) Mountain Standard Time</option>
<option value="UM6">(UTC -6:00) Central Standard Time</option>
<option value="UM5">(UTC -5:00) Eastern Standard Time, Western Caribbean Standard Time</option>
<option value="UM45">(UTC -4:30) Venezuelan Standard Time</option>
<option value="UM4">(UTC -4:00) Atlantic Standard Time, Eastern Caribbean Standard Time</option>
<option value="UM35">(UTC -3:30) Newfoundland Standard Time</option>
<option value="UM3">(UTC -3:00) Argentina, Brazil, French Guiana, Uruguay</option>
<option value="UM2">(UTC -2:00) South Georgia/South Sandwich Islands</option>
<option value="UM1">(UTC -1:00) Azores, Cape Verde Islands</option>
<option value="UTC">(UTC) Greenwich Mean Time, Western European Time</option>
<option value="UP1">(UTC +1:00) Central European Time, West Africa Time</option>
<option value="UP2">(UTC +2:00) Central Africa Time, Eastern European Time, Kaliningrad Time</option>
<option value="UP3">(UTC +3:00) Moscow Time, East Africa Time</option>
<option value="UP35">(UTC +3:30) Iran Standard Time</option>
<option value="UP4">(UTC +4:00) Azerbaijan Standard Time, Samara Time</option>
<option value="UP45">(UTC +4:30) Afghanistan</option>
<option value="UP5">(UTC +5:00) Pakistan Standard Time, Yekaterinburg Time</option>
<option value="UP55">(UTC +5:30) Indian Standard Time, Sri Lanka Time</option>
<option value="UP575">(UTC +5:45) Nepal Time</option>
<option value="UP6">(UTC +6:00) Bangladesh Standard Time, Bhutan Time, Omsk Time</option>
<option value="UP65">(UTC +6:30) Cocos Islands, Myanmar</option>
<option value="UP7">(UTC +7:00) Krasnoyarsk Time, Cambodia, Laos, Thailand, Vietnam</option>
<option value="UP8">(UTC +8:00) Australian Western Standard Time, Beijing Time, Irkutsk Time</option>
<option value="UP875">(UTC +8:45) Australian Central Western Standard Time</option>
<option value="UP9">(UTC +9:00) Japan Standard Time, Korea Standard Time, Yakutsk Time</option>
<option value="UP95">(UTC +9:30) Australian Central Standard Time</option>
<option value="UP10">(UTC +10:00) Australian Eastern Standard Time, Vladivostok Time</option>
<option value="UP105">(UTC +10:30) Lord Howe Island</option>
<option value="UP11">(UTC +11:00) Magadan Time, Solomon Islands, Vanuatu</option>
<option value="UP115">(UTC +11:30) Norfolk Island</option>
<option value="UP12">(UTC +12:00) Fiji, Gilbert Islands, Kamchatka Time, New Zealand Standard Time</option>
<option value="UP1275">(UTC +12:45) Chatham Islands Standard Time</option>
<option value="UP13">(UTC +13:00) Phoenix Islands Time, Tonga</option>
<option value="UP14">(UTC +14:00) Line Islands</option>
</select>        <span class="help-inline"></span>
    </div>
</div>                                <!-- Start of User Meta -->
                								
<div class="control-group ">
	<label class="control-label" for="street_name">Street Name</label>
	<div class="controls">
		 <input type="text" name="street_name" value="" id="street_name" maxlength="100" class="span6">
		
	</div>
</div>
											
				<div class="control-group ">
						<label class="control-label" for="state">State</label>
						<div class="controls">

							<select name="state" id="state" class="span6 chzn-select">
<option value="">&nbsp;</option>
<option value="AK">Alaska</option>
<option value="AL">Alabama</option>
<option value="AS">American Samoa</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="GU">Guam</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MH">Marshall Islands</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="MP">Northern Mariana Islands</option>

<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PW">Palau</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="RI">Rhode Island</option>
<option value="SC" selected="selected">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VI">Virgin Islands</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
</select>

						</div>
					</div>

															
					<div class="control-group ">
						<label class="control-label" for="country">Country</label>
						<div class="controls">
							<select name="country" id="country" class="span6 chzn-select"><option value="">&nbsp;</option>
<option value="AF">Afghanistan</option>
<option value="AL">Albania</option>
<option value="DZ">Algeria</option>
<option value="AS">American Samoa</option>
<option value="AD">Andorra</option>
<option value="AO">Angola</option>
<option value="AI">Anguilla</option>
<option value="AQ">Antarctica</option>
<option value="AG">Antigua and Barbuda</option>
<option value="AR">Argentina</option>
<option value="AM">Armenia</option>
<option value="AW">Aruba</option>
<option value="AU">Australia</option>
<option value="AT">Austria</option>
<option value="AZ">Azerbaijan</option>
<option value="BS">Bahamas</option>
<option value="BH">Bahrain</option>
<option value="BD">Bangladesh</option>
<option value="BB">Barbados</option>
<option value="BY">Belarus</option>
<option value="BE">Belgium</option>
<option value="BZ">Belize</option>
<option value="BJ">Benin</option>
<option value="BM">Bermuda</option>
<option value="BT">Bhutan</option>
<option value="BO">Bolivia</option>
<option value="BA">Bosnia and Herzegovina</option>
<option value="BW">Botswana</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazil</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="BN">Brunei Darussalam</option>
<option value="BG">Bulgaria</option>
<option value="BF">Burkina Faso</option>
<option value="BI">Burundi</option>
<option value="KH">Cambodia</option>
<option value="CM">Cameroon</option>
<option value="CA">Canada</option>
<option value="CV">Cape Verde</option>
<option value="KY">Cayman Islands</option>
<option value="CF">Central African Republic</option>
<option value="TD">Chad</option>
<option value="CL">Chile</option>
<option value="CN">China</option>
<option value="CX">Christmas Island</option>
<option value="CC">Cocos (Keeling) Islands</option>
<option value="CO">Colombia</option>
<option value="KM">Comoros</option>
<option value="CG">Congo</option>
<option value="CD">Congo, the Democratic Republic of the</option>
<option value="CK">Cook Islands</option>
<option value="CR">Costa Rica</option>
<option value="CI">Cote D'Ivoire</option>
<option value="HR">Croatia</option>
<option value="CU">Cuba</option>
<option value="CY">Cyprus</option>
<option value="CZ">Czech Republic</option>
<option value="DK">Denmark</option>
<option value="DJ">Djibouti</option>
<option value="DM">Dominica</option>
<option value="DO">Dominican Republic</option>
<option value="EC">Ecuador</option>
<option value="EG">Egypt</option>
<option value="SV">El Salvador</option>
<option value="GQ">Equatorial Guinea</option>
<option value="ER">Eritrea</option>
<option value="EE">Estonia</option>
<option value="ET">Ethiopia</option>
<option value="FK">Falkland Islands (Malvinas)</option>
<option value="FO">Faroe Islands</option>
<option value="FJ">Fiji</option>
<option value="FI">Finland</option>
<option value="FR">France</option>
<option value="GF">French Guiana</option>
<option value="PF">French Polynesia</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabon</option>
<option value="GM">Gambia</option>
<option value="GE">Georgia</option>
<option value="DE">Germany</option>
<option value="GH">Ghana</option>
<option value="GI">Gibraltar</option>
<option value="GR">Greece</option>
<option value="GL">Greenland</option>
<option value="GD">Grenada</option>
<option value="GP">Guadeloupe</option>
<option value="GU">Guam</option>
<option value="GT">Guatemala</option>
<option value="GN">Guinea</option>
<option value="GW">Guinea-Bissau</option>
<option value="GY">Guyana</option>
<option value="HT">Haiti</option>
<option value="HM">Heard Island and Mcdonald Islands</option>
<option value="VA">Holy See (Vatican City State)</option>
<option value="HN">Honduras</option>
<option value="HK">Hong Kong</option>
<option value="HU">Hungary</option>
<option value="IS">Iceland</option>
<option value="IN">India</option>
<option value="ID">Indonesia</option>
<option value="IR">Iran, Islamic Republic of</option>
<option value="IQ">Iraq</option>
<option value="IE">Ireland</option>
<option value="IL">Israel</option>
<option value="IT">Italy</option>
<option value="JM">Jamaica</option>
<option value="JP">Japan</option>
<option value="JO">Jordan</option>
<option value="KZ">Kazakhstan</option>
<option value="KE">Kenya</option>
<option value="KI">Kiribati</option>
<option value="KP">Korea, Democratic People's Republic of</option>
<option value="KR">Korea, Republic of</option>
<option value="KW">Kuwait</option>
<option value="KG">Kyrgyzstan</option>
<option value="LA">Lao People's Democratic Republic</option>
<option value="LV">Latvia</option>
<option value="LB">Lebanon</option>
<option value="LS">Lesotho</option>
<option value="LR">Liberia</option>
<option value="LY">Libyan Arab Jamahiriya</option>
<option value="LI">Liechtenstein</option>
<option value="LT">Lithuania</option>
<option value="LU">Luxembourg</option>
<option value="MO">Macao</option>
<option value="MK">Macedonia, the Former Yugoslav Republic of</option>
<option value="MG">Madagascar</option>
<option value="MW">Malawi</option>
<option value="MY">Malaysia</option>
<option value="MV">Maldives</option>
<option value="ML">Mali</option>
<option value="MT">Malta</option>
<option value="MH">Marshall Islands</option>
<option value="MQ">Martinique</option>
<option value="MR">Mauritania</option>
<option value="MU">Mauritius</option>
<option value="YT">Mayotte</option>
<option value="MX">Mexico</option>
<option value="FM">Micronesia, Federated States of</option>
<option value="MD">Moldova, Republic of</option>
<option value="MC">Monaco</option>
<option value="MN">Mongolia</option>
<option value="MS">Montserrat</option>
<option value="MA">Morocco</option>
<option value="MZ">Mozambique</option>
<option value="MM">Myanmar</option>
<option value="NA">Namibia</option>
<option value="NR">Nauru</option>
<option value="NP">Nepal</option>
<option value="NL">Netherlands</option>
<option value="AN">Netherlands Antilles</option>
<option value="NC">New Caledonia</option>
<option value="NZ">New Zealand</option>
<option value="NI">Nicaragua</option>
<option value="NE">Niger</option>
<option value="NG">Nigeria</option>
<option value="NU">Niue</option>
<option value="NF">Norfolk Island</option>
<option value="MP">Northern Mariana Islands</option>
<option value="NO">Norway</option>
<option value="OM">Oman</option>
<option value="PK">Pakistan</option>
<option value="PW">Palau</option>
<option value="PS">Palestinian Territory, Occupied</option>
<option value="PA">Panama</option>
<option value="PG">Papua New Guinea</option>
<option value="PY">Paraguay</option>
<option value="PE">Peru</option>
<option value="PH">Philippines</option>
<option value="PN">Pitcairn</option>
<option value="PL">Poland</option>
<option value="PT">Portugal</option>
<option value="PR">Puerto Rico</option>
<option value="QA">Qatar</option>
<option value="RE">Reunion</option>
<option value="RO">Romania</option>
<option value="RU">Russian Federation</option>
<option value="RW">Rwanda</option>
<option value="SH">Saint Helena</option>
<option value="KN">Saint Kitts and Nevis</option>
<option value="LC">Saint Lucia</option>
<option value="PM">Saint Pierre and Miquelon</option>
<option value="VC">Saint Vincent and the Grenadines</option>
<option value="WS">Samoa</option>
<option value="SM">San Marino</option>
<option value="ST">Sao Tome and Principe</option>
<option value="SA">Saudi Arabia</option>
<option value="SN">Senegal</option>
<option value="CS">Serbia and Montenegro</option>
<option value="SC">Seychelles</option>
<option value="SL">Sierra Leone</option>
<option value="SG">Singapore</option>
<option value="SK">Slovakia</option>
<option value="SI">Slovenia</option>
<option value="SB">Solomon Islands</option>
<option value="SO">Somalia</option>
<option value="ZA">South Africa</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="ES">Spain</option>
<option value="LK">Sri Lanka</option>
<option value="SD">Sudan</option>
<option value="SR">Suriname</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swaziland</option>
<option value="SE">Sweden</option>
<option value="CH">Switzerland</option>
<option value="SY">Syrian Arab Republic</option>
<option value="TW">Taiwan, Province of China</option>
<option value="TJ">Tajikistan</option>
<option value="TZ">Tanzania, United Republic of</option>
<option value="TH">Thailand</option>
<option value="TL">Timor-Leste</option>
<option value="TG">Togo</option>
<option value="TK">Tokelau</option>
<option value="TO">Tonga</option>
<option value="TT">Trinidad and Tobago</option>
<option value="TN">Tunisia</option>
<option value="TR">Turkey</option>
<option value="TM">Turkmenistan</option>
<option value="TC">Turks and Caicos Islands</option>
<option value="TV">Tuvalu</option>
<option value="UG">Uganda</option>
<option value="UA">Ukraine</option>
<option value="AE">United Arab Emirates</option>
<option value="GB">United Kingdom</option>
<option value="US" selected="selected">United States</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguay</option>
<option value="UZ">Uzbekistan</option>
<option value="VU">Vanuatu</option>
<option value="VE">Venezuela</option>
<option value="VN">Viet Nam</option>
<option value="VG">Virgin Islands, British</option>
<option value="VI">Virgin Islands, U.s.</option>
<option value="WF">Wallis and Futuna</option>
<option value="EH">Western Sahara</option>
<option value="YE">Yemen</option>
<option value="ZM">Zambia</option>
<option value="ZW">Zimbabwe</option>
</select>

						</div>
					</div>

														                <!-- End of User Meta -->
                <div class="control-group">
                    <div class="controls">
                        <input class="btn btn-primary" type="submit" name="register" id="submit" value="Register">
                    </div>
                </div>
            </form>            <p class="already-registered">
                Already registered?                <a href="http://thescoop.us/index.php/login">Sign In</a>            </p>
        </div>
    </div>
</section>


  </div>
  <div class="modal-footer">
    <button  href="#myModallogin" class="btn btn-info" data-toggle="modal" aria-hidden="true">Looking for the Login ?</button>
    
  </div>
</div>














<div id="myModallogin" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Log in to your Account</h3>
  </div>
  
  <div class="modal-body">
<div id="login">
	<h2>Please sign in</h2>

	
	
	<form action="http://thescoop.us/index.php/login" method="post" accept-charset="utf-8" autocomplete="off"><div style="display:none">
<input type="hidden" name="ci_csrf_token" value="d40cf323f1dba58c14520b4011e482ca">
</div>
		<div class="control-group ">
			<div class="controls">
				<input style="width: 95%" type="text" name="login" id="login_value" value="" tabindex="1" placeholder="Email">
			</div>
		</div>

		<div class="control-group ">
			<div class="controls">
				<input style="width: 95%" type="password" name="password" id="password" value="" tabindex="2" placeholder="Password">
			</div>
		</div>

					<div class="control-group">
				<div class="controls">
					<label class="checkbox" for="remember_me">
						<input type="checkbox" name="remember_me" id="remember_me" value="1" tabindex="3">
						<span class="inline-help">Remember me</span>
					</label>
				</div>
			</div>
		
		<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-primary" type="submit" name="log-me-in" id="submit" value="Sign In" tabindex="5">
			</div>
		</div>
	</form>
		<!-- Activation Block -->
			<p style="text-align: left" class="well">
				Need to activate your account?<br>
				<b>Have an activation code to enter to activate your membership?</b> Enter it on the <a href="http://thescoop.us/index.php/activate">Activate</a> page.<br><br>    <b>Need your code again?</b> Request it again on the <a href="http://thescoop.us/index.php/resend_activation">Resend Activation</a> page.			</p>
	
	<p style="text-align: center">
					<a href="http://thescoop.us/index.php/register">Create An Account</a>		
		<br><a href="http://thescoop.us/index.php/forgot_password">Forgot Your Password?</a>	</p>

</div>
  </div>
  
  <div class="modal-footer">
  <button  href="#myModallogin" class="btn btn-info" data-toggle="modal" aria-hidden="true">Need to Register?</button>  
  
  <!-- <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>-->
    
  </div>
  </div>

    
       <script type="text/javascript">
	$( document ).ready(function() {
		console.log("GGG");
		
		
    $('#myModallogin').on('show', function (e) {
		console.log("SHOW");
  $('#myModal').modal('hide')
})
	
	  $('#myModal').on('show', function (e) {
		console.log("SHOW");
  $('#myModallogin').modal('hide')
})
	
	$('.tooltip-test').tooltip();
	$(".popover-test").popover(); 
	
	console.log("GGG");
	
});

		</script>
    
    
    
    
    
					</div><!--/span12-->					
				</div><!--/row-->
				
				<div class="row-fluid">
		            <ul class="thumbnails">
		         
                       
                      
                      
		            </ul>
		        </div><!--/row fluid-->




			</div><!--/container-->
		</div><!--/white--><!--/testimonials-->



