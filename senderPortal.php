<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	
  <style>
    #show_msg2{
      position: absolute;
      top: 105px;
      right:60px;
      padding: 20px;
    background-color: #f44336;
    color: white;
    }

    #show_msg1{
      position: absolute;
      top: 105px;
      right:60px;
      padding: 20px;
    background-color: #f44336;
    color: white;
    }
  </style>
  <script>
    $(document).ready(function(){
        
        
            $("#show_msg1").fadeOut(4000);
    });
  </script>

  <script>
    $(document).ready(function(){
        
        
            $("#show_msg2").fadeOut(4000);
    });
    
  </script>
  
  
	<?php
        session_start();
    if(isset($_SESSION["msg2"]))
        {
            echo " <p id='show_msg2'>Your order succesfully inserted</p>";
            unset($_SESSION["msg2"]);
        }
            
        

    if(isset($_SESSION["msg1"]))
        {
            echo " <p id='show_msg1'>Login succesfully as a Sender</p>";
            unset($_SESSION["msg1"]);
        }
            if(empty($_SESSION["IdValidation"]))
            {
                 header('Location: '.'index.php');
            }
  ?>
    <style>
    	li>a{
	    	color: white;
	    	font-size: 16px;
		}
    </style>
    <style>
* {
  box-sizing: border-box;
}
body {
  font: 16px Arial;  
}
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
}
input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}
input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
    
</head>
<body>



	<div class="banner" style=" margin-bottom: 0px;">
	  <img src="logo.jpg" style="width: 100%; height: 80px;" alt="">
    <div class="banner-left" style="width: 250px;position: absolute; right: 25px; top: 24px;">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </div>
	</div>


	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3" style="background: #5F5F5F; height: 700px;">
				<div class="row">
					<div class="col-xs-2"></div>
					<div class="col-xs-8" style="margin-top:20px; ">
						<ul class="nav nav-pills nav-stacked">
						    <li class="active"><a href="senderPortal.php">My portal</a></li>
						    <li><a href="senderProfile.php">Your profile</a></li>
                <li><a href="finalorder.php">Final Order</a></li>
                
                <li><a href="senderConfirmOrder.php">Update Order&nbsp&nbsp&nbsp&nbsp<span class="badge"  style="background: red; color: white;">


              <?php 
                  include 'connection.php';
                  $lids=$_SESSION["Id"];
                  $sql_one="SELECT * FROM currierconfirm WHERE sender_id='$lids'";
                  $i=0;
                  $result_one = $conn->query($sql_one);
                  if ($result_one->num_rows > 0) { 
                     while($row_one = $result_one->fetch_assoc()) {
                      $i++;
                      

                      }
                      echo $i;
                    }

                ?>

                </span></a></li>
                
						    <li><a href="#">Previous history</a></li>
						    <li><a href="senderPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>

						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>
			<div class="well well-md">
						<h2 style="text-align: center;">Search your desire query</h2>
				</div>
			<div class="col-xs-9">
				
				<div class="row">
					<div class="col-xs-3">

					</div>
					<div class="col-xs-6">
					<form autocomplete="off" onsubmit="return Validate()" name="vform" action="senderSearchResult.php" method="POST">
	
	<label for="">Where from:</label><br>
  <div class="autocomplete" style="width:477px;">
    <input required="" id="myInput" type="text" name="district1" placeholder="Select a district">
  </div>
	
	
  <br><br><br>

	<label for="">Where to:</label><br>
  <div class="autocomplete" style="width:477px;">
    <input required="" id="myInput2" type="text" name="district2" placeholder="Select a district">
  </div><br><br><br>

  

<label for="">Journey dates:</label><br>
							<div class="input-group input-append date" id="dateRangePicker">
								<input type="text" required="required" class="form-control" name="dates">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</div>
							
							<script>
								$(document).ready(function(){
									$('#dateRangePicker')
										.datepicker({
											format: 'dd/mm/yyyy',
											startDate: '+1d',
											endDate: '+100d'
										});
								});
							</script><br><br>

  <input type="submit" name="submit" value="Search">
  &nbsp&nbsp<a style="text-decoration: none; color: red;" href="" style="color: red" id="name_error" class="val_error"></a>
  <script>
	var district_one = document.forms["vform"]["district1"];
	var district_two = document.forms["vform"]["district2"];

	var name_error = document.getElementById("name_error");

	district_one.addEventListener("blur",name_verify,true);
	function Validate(){
		if (district_one.value == district_two.value) {
		name_error.innerHTML= ("You select same district");
		return false;
	}
	}

	function name_verify(){
		name_error.innerHTML="";
		return true;
	}

</script>
</form>



<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the country names in the world:*/
var districts = ["Dhaka","Chittagong","Sylhet","Rajshahi","Rangpur","Barishal","Khulna"];

/*initiate the autocomplete function on the "myInput" element, and pass along the districts array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), districts);
</script>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}

/*An array containing all the country names in the world:*/
var districts = ["Dhaka","Chittagong","Sylhet","Rajshahi","Rangpur","Barishal","Khulna"];

/*initiate the autocomplete function on the "myInput" element, and pass along the districts array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput2"), districts);
</script>
						<!--<form action="senderSearchResult.php" method="POST">
							<p>Select your starting point:
							<select name="start" class="form-control">
								<option value="Dhaka">Dhaka</option>
								<option value="Rajshahi">Rajshahi</option>
								<option value="Sylhet">Sylhet</option>
							</select></p><br>

							<p>Select your destination:
							<select name="ends" class="form-control">
								<option value="Dhaka">Dhaka</option>
								<option value="Rajshahi">Rajshahi</option>
								<option value="Sylhet">Sylhet</option>
							</select></p><br>

							<p>Select date:
							<div class="input-group input-append date" id="dateRangePicker">
								<input type="text" required="required" class="form-control" name="dates">
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</div></p>
							<script>
								$(document).ready(function(){
									$('#dateRangePicker')
										.datepicker({
											format: 'dd/mm/yyyy',
											startDate: '+1d',
											endDate: '+100d'
										});
								});
							</script><br>
							<input type="submit" name="submit" value="Search" class="btn btn-danger">
						</form>-->
					</div>
					<div class="col-xs-3"></div>
				</div>
			</div>
			
		</div>
	</div>

  <div class="container-fluid">
    <div class="row" style="background:#181818; padding: 20px;">
      <p style="text-align: center; color: white;"> &copy Copyright | 2018 @ quickpercel.com</p>
    </div>
  </div>

</body>
</html>







