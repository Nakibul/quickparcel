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
  	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	
	<?php
        session_start();

        if(empty($_SESSION["IdValidation"]))
        {
             header('Location: '.'index.php');
        }
    ?>
    <style>
    	th,td{
     text-align: center;
    }
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
						    <li class="active"><a href="currierPortal.php">My portal</a></li>
						    <li><a href="currierProfile.php">Your profile</a></li>
                <li><a href="finalorder2.php">Final Order</a></li>
                
						    
                <li><a href="currierOrderDetails.php">Activity Details</a></li>
                <li><a href="currierRequestedOrders.php">Requested order&nbsp&nbsp&nbsp&nbsp<span class="badge"  style="background: red;">


              <?php 
      include 'connection.php';
      $lids=$_SESSION["Id"];
      $sql_one="SELECT * FROM senderactivity WHERE carrier_id='$lids'";
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
						    <li><a href="currierPasswordChange.php">Change Password</a></li>
						    <li><a href="logout.php">Log out</a></li>
						</ul>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</div>


			<div class="col-xs-9">
				<div class="row">
					<div class="well well-md">
						<h2 style="text-align: center;">Fill up your details when you're active</h2>
					</div>
					<div class="col-xs-3"></div>
					<div class="col-xs-6">
						<form action="" method="POST">
								<label for="">Where from:</label><br>
  <div class="autocomplete" style="width:477px;">
    <input required="" id="myInput" type="text" name="district1" placeholder="Select a district">
  </div><br><br><br>

							<label for="">Where to:</label><br>
  <div class="autocomplete" style="width:477px;">
    <input required="" id="myInput2" type="text" name="district2" placeholder="Select a district">
  </div><br><br><br>
							<div class="row">
								<div class="col-xs-7">
									<label for="">Choose journey date:</label><br>
									<div class="input-group input-append date" id="dateRangePicker">

										<input type="text" class="form-control" name="date" required="required">
										<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
									</div>
								</div>
								
								<div class="col-xs-5">
								<label for="">Time:</label><br>
									<select name="times" class="form-control">
									<option value="1 AM">1 AM</option>
									<option value="2 AM">2 AM</option>
                  <option value="3 AM">3 AM</option>
                  <option value="4 AM">4 AM</option>
                  <option value="5 AM">5 AM</option>
                  <option value="6 AM">6 AM</option>
                  <option value="7 AM">7 AM</option>
                  <option value="8 AM">8 AM</option>
                  <option value="9 AM">9 AM</option>
                  <option value="10 AM">10 AM</option>
                  <option value="11 AM">11 AM</option>
									<option value="12 AM">12 AM</option>

                  <option value="1 PM">1 PM</option>
                  <option value="2 PM">2 PM</option>
                  <option value="3 PM">3 PM</option>
                  <option value="4 PM">4 PM</option>
                  <option value="5 PM">5 PM</option>
                  <option value="6 PM">6 PM</option>
                  <option value="7 PM">7 PM</option>
                  <option value="8 PM">8 PM</option>
                  <option value="9 PM">9 PM</option>
                  <option value="10 PM">10 PM</option>
                  <option value="11 PM">11 PM</option>
                  <option value="12 PM">12 PM</option>
								</select>
								</div>
							</div>
							<script>
								$(document).ready(function(){
									$('#dateRangePicker')
										.datepicker({
											format: 'dd/mm/yyyy',
											startDate: '+1d',
											endDate: '12/30/2025'
										});
								});
							</script><br><br>
							<div class="row">
								<div class="col-xs-7">
									
									
								</div>
								
								
							</div>
							
							
							<br>
							<input type="submit" value="submit" name="submit" class="btn btn-info">
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


<?php

include'connection.php';


$cid=$_SESSION["Id"];




if (isset($_POST["submit"])) {
        $start=$_POST["district1"];
		$end=$_POST["district2"];
		$date=$_POST["date"];
		$times=$_POST["times"];
		


		$sql= "INSERT INTO currieractivedetail (start,ends,dates,timesJourney,cid) values('$start', '$end','$date','$times','$cid')";
		
		
	if ($conn->query($sql)=== TRUE) {
    	 echo "<script>window.alert('Your Activity Recorded Successfully');</script>";
    	 //header('Location: '.'index.php');
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}


?>