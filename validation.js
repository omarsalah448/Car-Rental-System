function validateNotEmpty(form) {
  // get all the inputs within the submitted form
  var inputs = form.getElementsByTagName('input');
  for (var i = 0; i < inputs.length; i++) {
      // only validate the inputs that have the required attribute
      if(inputs[i].hasAttribute("required")){
          if(inputs[i].value == ""){
              // found an empty field that is required
              missing_field = form.getElementsByTagName('label')[i].textContent;
              alert("Please fill the "+missing_field+" field");
              return false;
          }
      }
  }
  return true;
}

/* Signup validation using Ajax */
function retype_pass_check(str) {
  if (str == "") {
      document.getElementById("check_retype_password").innerHTML = "";
      return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
      document.getElementById("check_retype_password").innerHTML = this.responseText;
  }
  xhttp.open("POST", "ajax/pass_check.php?type=retype&q="+str);
  xhttp.send();
}
function pass_check(str) {
  if (str == "") {
      document.getElementById("check_retype_password").innerHTML = "";
      return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
      document.getElementById("check_retype_password").innerHTML = this.responseText;
  }
  xhttp.open("POST", "ajax/pass_check.php?type=pass&q="+str);
  xhttp.send();
}
function email_check(str) {
  if (str == "") {
      document.getElementById("check_email").innerHTML = "Email";
      return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
      document.getElementById("check_email").innerHTML = this.responseText;
  }
  xhttp.open("POST", "ajax/email_check.php?q="+str);
  xhttp.send();
}
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("kk").innerHTML = this.responseText;
    }
  xhttp.open("GET", "ajax/validate.php");
  xhttp.send();
}

function handleCheckBox() {
  country = document.getElementById("locationReservation").value
  const xhttp = new XMLHttpRequest();
  str = "(";
  var allFlag = 1;
  if(document.getElementById("sedanCheckbox").checked==true){
    str = str + "'Sedan',";
    allFlag = 0;
  }
  if(document.getElementById("hatchBackCheckbox").checked==true){
    str = str + "'Hatchback',";
    allFlag = 0;
  }
  if(document.getElementById("suvCheckbox").checked==true){
    str = str + "'SUV',";
    allFlag = 0;
  }
  if(document.getElementById("sportsCarCheckbox").checked==true){
    str = str + "'Sports Car',";
    allFlag = 0;
  }
  if(document.getElementById("coupeCheckbox").checked==true){
    str = str + "'Coupe',";
    allFlag = 0;
  }
  str = str.slice(0,-1) + ")";
  if(allFlag == 1){
    str = ""
    if( country != "none"){
      str = "country LIKE '%"+country+"%' AND"
    }
    query = "SELECT * FROM car NATURAL JOIN offices NATURAL JOIN category WHERE "
    query = query + str + " status='Active'";
  }
  else{
    query = "SELECT * FROM car NATURAL JOIN offices NATURAL JOIN category WHERE cat_name IN " 
    if( country != "none"){
      str = str + "and country LIKE '%"+country+"%'"
    }
    query = query + str+ "  AND status='Active';";
  }
  xhttp.onload = function() {
      document.getElementById("allCars").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax/search_check.php?type=checkbox&query="+query);
  xhttp.send();
}

function handleSearch(str) {
  const xhttp = new XMLHttpRequest();
  var status = "Ative"
  if (str == "") {
    query = "SELECT * FROM car NATURAL JOIN offices NATURAL JOIN category WHERE status='Active'"
  }
  else{
    query = "SELECT * FROM car NATURAL JOIN offices NATURAL JOIN category WHERE " 
    query = query +"(brand LIKE '%"+str+"%'"
    query = query +"or model LIKE '%"+str+"%'"
    query = query +"or year LIKE '%"+str+"%'"
    query = query +"or color LIKE '%"+str+"%'"
    query = query +"or country LIKE '%"+str+"%'"
    if(!isNaN(str)){
      // if str is a number convert to a number
      query = query +"or daily_price=" + Number(str) + ' '
    }
    query = query +"or city LIKE '%"+str+"%')"
    query = query +"AND status='Active'"
  }
  xhttp.onload = function() {
      document.getElementById("allCars").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax/search_check.php?type=searchBar&query="+query);
  xhttp.send();
}

function adminRadioButton() {
  const xhttp = new XMLHttpRequest();
  var status = "Ative"
  if(document.getElementById("carsRadioButton").checked == true) {
    query = "SELECT * FROM car"
    xhttp.onload = function() {
      document.getElementById("allAdminCars").innerHTML = this.responseText;
  }
    xhttp.open("GET", "ajax/search_check.php?type=searchAdminBarCar&query="+query);
    xhttp.send();
  }

  else if(document.getElementById("officesRadioButton").checked == true) {
    query = "SELECT * FROM offices"
    xhttp.onload = function() {
      document.getElementById("allAdminCars").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchAdminBarOffice&query="+query);
    xhttp.send();
  }

  else if(document.getElementById("customersRadioButton").checked == true) {
    query = "SELECT * FROM customer"
    xhttp.onload = function() {
      document.getElementById("allAdminCars").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchAdminBarCustomer&query="+query);
    xhttp.send();
  }
}

function handleAdminSearch(str) {
  const xhttp = new XMLHttpRequest();
  if(document.getElementById("carsRadioButton").checked == true) {
    if (str == "") {
      query = "SELECT * FROM car"
    }
    else{
      query = "SELECT * FROM car WHERE " 
      query = query +"(brand LIKE '%"+str+"%'"
      query = query +"or model LIKE '%"+str+"%'"
      query = query +"or year LIKE '%"+str+"%'"
      query = query +"or color LIKE '%"+str+"%') "
    }
    xhttp.onload = function() {
      document.getElementById("allAdminCars").innerHTML = this.responseText;
  }
    xhttp.open("GET", "ajax/search_check.php?type=searchAdminBarCar&query="+query);
    xhttp.send();
  }

  else if(document.getElementById("officesRadioButton").checked == true) {
    if (str == "") {
      query = "SELECT * FROM offices"
    }
    else{
      query = "SELECT * FROM offices WHERE " 
      query = query +"(country LIKE '%"+str+"%'"
      query = query +"or city LIKE '%"+str+"%'"
      query = query +"or street LIKE '%"+str+"%')"
    }
    xhttp.onload = function() {
      document.getElementById("allAdminCars").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchAdminBarOffice&query="+query);
    xhttp.send();
  }

  else if(document.getElementById("customersRadioButton").checked == true) {
    if (str == "") {
      query = "SELECT * FROM customer"
    }
    else{
      query = "SELECT * FROM customer WHERE " 
      query = query +"(fname LIKE '%"+str+"%'"
      query = query +"or lname LIKE '%"+str+"%'"
      query = query +"or email LIKE '%"+str+"%'"
      query = query +"or phone LIKE '%"+str+"%')"
    }
    xhttp.onload = function() {
      document.getElementById("allAdminCars").innerHTML = this.responseText;
    }
    xhttp.open("GET", "ajax/search_check.php?type=searchAdminBarCustomer&query="+query);
    xhttp.send();
  }
}

function handlePrice(str) {
  const xhttp = new XMLHttpRequest();
  if (str == "") {
    query = "SELECT * FROM car WHERE status='Active'";
  }
  minPrice = document.getElementById("minPrice").value
  maxPrice = document.getElementById("maxPrice").value
  if(minPrice == ""){
    minPrice = 0
  }
  if(maxPrice == ""){
    maxPrice = 9999999
  }
  query = "SELECT * FROM car NATURAL JOIN category WHERE daily_price BETWEEN " + minPrice + " AND " + maxPrice;
  query = query + " AND status='Active';"
  xhttp.onload = function() {
      document.getElementById("allCars").innerHTML = this.responseText;
  }
  xhttp.open("GET", "ajax/search_check.php?type=price&query="+query);
  xhttp.send();
}
