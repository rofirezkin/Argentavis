<?php
// Start the session
session_start();

if($_SESSION['status'] !="login"){
	header("location:../login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>D-MAIL Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Poppins -->
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../date/css/bootstrap-datetimepicker.min.css">
    <style>
	* {
	  margin: 0;
	  padding: 0;
	  box-sizing: border-box;
	  -webkit-box-sizing: border-box;
	  -moz-box-sizing: border-box;
	  -webkit-font-smoothing: antialiased;
	  -moz-font-smoothing: antialiased;
	  -o-font-smoothing: antialiased;
	  font-smoothing: antialiased;
	  text-rendering: optimizeLegibility;
	}

	body {
	  font-family: "Roboto", Helvetica, Arial, sans-serif;
	  font-weight: 100;
	  font-size: 12px;
	  line-height: 30px;
	  color: #777;
	  background-image: url("../img/email.jpg");
	  background-position: center;
	  background-repeat: no-repeat;
	  background-size: cover;
	}

	.container {
	  max-width: 550px;
	  width: 100%;
	  margin: 0 auto;
	  position: relative;
	}

	#contact input[type="text"],
	#contact input[type="email"],
	#contact input[type="tel"],
	#contact input[type="url"],
	#contact textarea,
	#contact button[type="submit"] {
	  font: 400 16px/20px "Roboto", Helvetica, Arial, sans-serif;
	}

	#contact {
	  background: #F9F9F9;
	  padding: 25px;
	  margin: 150px 0;
	  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
	}

	#contact h3 {
	  display: block;
	  font-size: 30px;
	  font-weight: 300;
	  margin-bottom: 10px;
	}

	#contact h4 {
	  margin: 5px 0 15px;
	  display: block;
	  font-size: 13px;
	  font-weight: 400;
	}

	fieldset {
	  border: medium none !important;
	  margin: 0 0 10px;
	  min-width: 100%;
	  padding: 0;
	  width: 100%;
	}

	#contact input[type="text"],
	#contact input[type="email"],
	#contact input[type="tel"],
	#contact input[type="date"],
	#contact textarea {
	  width: 100%;
	  border: 1px solid #ccc;
	  background: #FFF;
	  margin: 0 0 5px;
	  padding: 10px;
	}

	#contact input[type="email"]:hover,
	#contact input[type="tel"]:hover,
	#contact input[type="date"]:hover,
	#contact textarea:hover {
	  -webkit-transition: border-color 0.3s ease-in-out;
	  -moz-transition: border-color 0.3s ease-in-out;
	  transition: border-color 0.3s ease-in-out;
	  border: 1px solid #aaa;
	}

	#contact textarea {
	  height: 100px;
	  max-width: 100%;
	  resize: none;
	}

	#contact button[type="submit"] {
	  cursor: pointer;
	  width: 100%;
	  border: none;
	  background: #4CAF50;
	  color: #FFF;
	  margin: 0 0 5px;
	  padding: 10px;
	  font-size: 15px;
	}

	#contact button[type="submit"]:hover {
	  background: #43A047;
	  -webkit-transition: background 0.3s ease-in-out;
	  -moz-transition: background 0.3s ease-in-out;
	  transition: background-color 0.3s ease-in-out;
	}

	#contact button[type="submit"]:active {
	  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
	}

	.copyright {
	  text-align: center;
	}

	#contact input:focus,
	#contact textarea:focus {
	  outline: 0;
	  border: 1px solid #aaa;
	}

	::-webkit-input-placeholder {
	  color: #888;
	}

	:-moz-placeholder {
	  color: #888;
	}

	::-moz-placeholder {
	  color: #888;
	}

	:-ms-input-placeholder {
	  color: #888;
	}
    </style>
  </head>
  <body>
    <div class="container">  
	  <form id="contact" action="proses_editsurat.php" method="post" enctype="multipart/form-data" checkall();>
	    <h3>Ubah Surat Masuk</h3><br>
	    <fieldset>
	    <span>*Masukan No Surat yang ingin di ubah.</span>
	     <input class="form-control" name="tnomersurat" placeholder="No Surat" type="text" onkeypress="return isNumberKey(event)" 
	      id="NoSurat" onkeyup="checkno();" required autofocus>
	    </fieldset>
	    <fieldset id="1" style="display: none;">
	    	<span>Kode Surat</span>
	      <input class="form-control" id="tkodesurat" name="tkodesurat" placeholder="Kode Surat" type="text" required>
	    </fieldset>
	    <fieldset id="3" style="display: none;">
	    	<span>Asal Surat</span>
	      <input class="form-control" id="tasalsurat" name="tasalsurat" placeholder="Asal Surat" type="text" required>
	    </fieldset>
	    <fieldset id="10" style="display: none;">
	    	<span>Subject</span>
	      <input class="form-control" id="tisi" name="tisi" placeholder="Subject" type="text" required>
	    </fieldset>
	    <fieldset id="5" style="display: none;">
	    	<span>Tanggal Surat</span>
	      <input class="form-control" id="ttanggalsurat" name="ttanggalsurat" placeholder="Tanggal Surat" type="date" required>
	    </fieldset>
	    <fieldset id="6" style="display: none;">
	    	<div id="formAlertg" class="alert alert-danger" style="display:none;">
			  User ID Tidak ada.
			</div>
	    	<span>ID User</span>
	      <input class="form-control" id="tiduser" name="tiduser" placeholder="ID User" type="text" onkeypress="return isNumberKey(event)" onkeyup="checkagenda();" required>
	    </fieldset>
	    <fieldset id="7" style="display: none;">
	    	<span>Keterangan</span>
	      <textarea class="form-control" id="tketerangan" name="tketerangan" placeholder="Keterangan" type="comment" required></textarea> 
	    </fieldset>
	    <fieldset id="8" style="display: none;">
	     <span>*Format pdf only, Max Size 3MB. Untuk keamanan upload file kembali.</span>
	      <input id="input-id" class="form-control"	 name="tfupload" placeholder="File Upload" type="file" accept="application/pdf" required>
	      <input type="hidden" name="hiddenid" id="hidden_user_id">
	      <input type="hidden" name="hiddenfile" id="fileselubung">
	    </fieldset><br>
	    <fieldset id="9" style="display: none;">
	      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
	    </fieldset>
	    	<p class="copyright">© 2018 Copyright <a href="https://www.d-mail.epizy.com/"><font color="orange">D-MAIL</font></a> Design By <a href="https://www.instagram.com/d_vyd/" target="_BLANK"><font color="orange">Devid Alfian</font></a></p>
	  </form>
	</div>
    <!-- Javascript files-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../js/charts-home.js"></script>
    <script src="../js/front.js"></script>
    <script src="../date/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="../js/res/js/script.js"></script>
    
    <script type="text/javascript">
    	function isNumberKey(evt){
		    var charCode = (evt.which) ? evt.which : event.keyCode
		    if (charCode > 31 && (charCode < 48 || charCode > 57))
		        return false;
		    return true;
		}

		function checkno()
		{
		 var name=document.getElementById( "NoSurat" ).value;
			
		 if(name)
		 {
		  $.ajax({
		  type: 'post',
		  url: 'cekdata_suratmasuk.php',
		  data: {
		   user_name:name,
		  },
		  success: function (response) {
		   if(response=="OK")	
		   {
		   	 $("#1").slideUp(400);
		     $("#2").slideUp(400);
		     $("#3").slideUp(400);
		     $("#4").slideUp(400);
		     $("#5").slideUp(400);
		     $("#6").slideUp(400);
		     $("#7").slideUp(400);
		     $("#8").slideUp(400);
		     $("#9").slideUp(400);
		     $("#10").slideUp(400);
             $("#carilier").slideUp(400);
			 return true;
		   }
		   else
		   {
		   	var id=document.getElementById( "NoSurat" ).value;
		    // Add User ID to the hidden field for furture usage
		    $.post("../admin/bacasurat.php", {
		            id: id
		        },
		        function (data, status) {
		            // PARSE json data
		            var user = JSON.parse(data);
		            // Assing existing values to the modal popup fields
		            $("#hidden_user_id").val(user.id_surat);
		            $("#tnomersurat").val(user.no_surat);
		            $("#tkodesurat").val(user.kode);
		            $("#tasalsurat").val(user.asal_surat);
		            $("#tisi").val(user.subject);
		            $("#ttanggalsurat").val(user.tgl_surat);
		            $("#tiduser").val(user.id_user);
		            $("#tketerangan").val(user.keterangan);
		            $("#fileselubung").val(user.file);
		        }
		    );
		    $("#1").slideDown(400);
		    $("#2").slideDown(400);
		    $("#3").slideDown(400);
		    $("#4").slideDown(400);
		    $("#5").slideDown(400);
		    $("#6").slideDown(400);
		    $("#7").slideDown(400);
		    $("#8").slideDown(400);
		    $("#9").slideDown(400);
		    $("#10").slideDown(400);
            $("#carilier").slideDown(400);
		    return false;	
		   }
		  }
		  });
		 }
		 else
		 {
		  	 $("#1").slideUp(400);
		     $("#2").slideUp(400);
		     $("#3").slideUp(400);
		     $("#4").slideUp(400);
		     $("#5").slideUp(400);
		     $("#6").slideUp(400);
		     $("#7").slideUp(400);
		     $("#8").slideUp(400);
		     $("#9").slideUp(400);
		     $("#10").slideUp(400);
		  $("#carilier").slideUp(400);
		  return false;
		 }
		}

		function checkagenda()
		{
		 var email=document.getElementById( "tiduser" ).value;
			
		 if(email)
		 {
		  $.ajax({
		  type: 'post',
		  url: 'cekdata_suratmasuk.php',
		  data: {
		   user_email:email,
		  },
		  success: function (response) {
		   if(response=="OK1")	
		   {
             $("#formAlertg").slideDown(400);
			 return true;
		   }
		   else
		   {
            $("#formAlertg").slideUp(400);
		    return false;	
		   }
		  }
		  });
		 }
		 else
		 {
		  $( '#name_status' ).html("");
		  return false;
		 }
		}

		function checkall()
		{
		 var nos=document.getElementById("formAlert").innerHTML;
		 var noa=document.getElementById("formAlertg").innerHTML;

		 if((nos && noa)=="OK")
		 {
		  return true;
		 }
		 else
		 {
		  return false;
		 }
		}

    </script>
    <script type="text/javascript">
    $(function(){
        $("#input-id").on('change', function(event) {
            var file = event.target.files[0];
            if(file.size>=2*1024*1024) {
                alert("Ukuran Pdf maksimal 2MB");
                $("#contact").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return;
            }

            if(!file.type.match('application/pdf')) {
                alert("Hanya format Pdf saja");
                $("#contact").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                return;
            }

            var fileReader = new FileReader();
            fileReader.onload = function(e) {
                var int32View = new Uint8Array(e.target.result);
                //verify the magic number
                // for JPG is 0x25 0x50 0x44 0x46 (see https://en.wikipedia.org/wiki/List_of_file_signatures)
                if(int32View.length>4 && int32View[0]==0x25 && int32View[1]==0x50 && int32View[2]==0x44 && int32View[3]==0x46) {
                    
                } else {
                    alert("Hanya format Pdf saja");
                    $("#contact").get(0).reset(); //the tricky part is to "empty" the input file here I reset the form.
                    return;
                }
            };
            fileReader.readAsArrayBuffer(file);
        });
    });
</script>
  </body>
</html>