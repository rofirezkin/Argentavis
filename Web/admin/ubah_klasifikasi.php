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
	  <form id="contact" action="proses_editklasifikasi.php" method="post" enctype="multipart/form-data" checkall();>
	    <h3>Ubah Surat Keluar</h3><br>
	    <fieldset>
	    <span>*Masukan Kode yang ingin di ubah.</span>
	     <input class="form-control" name="tnomersurat" placeholder="Kode" type="text"  
	      id="NoSurat" style="text-transform:uppercase" onkeyup="checkno();" required autofocus>
	    </fieldset>
	    <fieldset id="1" style="display: none;">
	    	<span>Nama</span>
	      <input class="form-control" id="tkodesurat" name="tkodesurat" placeholder="Kode Surat" type="text" required>
	    </fieldset>
	    <fieldset id="3" style="display: none;">
	    	<span>Uraian</span>
	      <input class="form-control" id="tasalsurat" name="tasalsurat" placeholder="Tujuan" type="text" required>
	    </fieldset>
	    <fieldset id="8" style="display: none;">
	      <input type="hidden" name="hiddenid" id="hidden_user_id">
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
		  url: 'cekdata_klasifikasi.php',
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
		    $.post("../admin/bacaklasifikasi.php", {
		            id: id
		        },
		        function (data, status) {
		            // PARSE json data
		            var user = JSON.parse(data);
		            // Assing existing values to the modal popup fields
		            $("#hidden_user_id").val(user.id_klasifikasi);
		            $("#tnomersurat").val(user.kode);
		            $("#tkodesurat").val(user.nama);
		            $("#tasalsurat").val(user.uraian);
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
		  url: 'cekdata_suratkeluar.php',
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

		 if(nos =="OK")
		 {
		  return true;
		 }
		 else
		 {
		  return false;
		 }
		}

    </script>
    
  </body>
</html>