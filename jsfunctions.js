    function display_content(formID){
        var form = document.getElementsByClassName("form");
    for (var i = 0; i < form.length; i++) {
        form[i].style.display = "none";
    }
    document.getElementById(formID).style.display = "block";
    
    }
    

  function validateAdmin() {
    // Get the values of the inputs
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    // Validate the inputs
    if (username == "") {
      alert("Username must be filled out");
      return false;
    }

    if (password == "") {
      alert("Password must be filled out");
      return false;
    }

    if (confirmPassword == "") {
      alert("Confirm password must be filled out");
      return false;
    }

    if (password != confirmPassword) {
      alert("Passwords do not match");
      return false;
    }

    // Return true if the form is valid
    return true;
  }





    
