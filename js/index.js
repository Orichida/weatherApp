function flip() {
  var k = document.getElementById("login");
  k.style.transform = "rotateY(360deg)";
  setTimeout(() => {
    document.getElementById("login").innerHTML = `
<h2>Sign Up</h2>
<form onsubmit="event.preventDefault();signup()">
    <input type="text" name="nom" placeholder="Name" class="nom" required>
    <input type="text" name="prenom" placeholder="Surname" class="prenom" required>
    <input type="text" name="user" placeholder="Username" class="user" required>
    <input type="password" name="password" placeholder="Password" class="password" required>
    <input type="password" name="verifPassword" placeholder="Confirm Password" class="verifPassword" required>
    <input type="submit" value="Sign Up">
    <p><a onclick="flipL()"><- Return to login</a></p>
</form>
      `;
  }, 150);
}
function flipL() {
  var k = document.getElementById("login");
  k.style.transform = "rotateY(0deg)";
  setTimeout(() => {
    document.getElementById("login").innerHTML = `
      <h2>Login</h2>
<form method="post">
    <input type="text" name="login" placeholder="Username" class="login" required>
    <input type="password" name="password" placeholder="Password" class="password" required>
    <input type="submit" value="Login">
    <p>New ? click here to <a onclick="flip()">create an account</a></p>
</form>
      `;
  }, 150);
}
function signup() {
  if ($(".password").val() !== $(".verifPassword").val()) {
    $("#msgBox").fadeIn();
    $("#msgBox").html(
      "The passwords you entered do not match. Please try again."
    );
    setTimeout(() => {
      $("#msgBox").fadeOut();
    }, 5000);
    return false;
  }
  $.ajax({
    type: "POST",
    url: "signup.php",
    data: {
      nom: $(".nom").val(),
      prenom: $(".prenom").val(),
      user: $(".user").val(),
      password: $(".password").val(),
    },
    success: function (data) {
      data = Number(data);
      switch (data) {
        case -1:
          $("#msgBox").fadeIn();
          $("#msgBox").html("User already exist");
          setTimeout(() => {
            $("#msgBox").fadeOut();
          }, 5000);
          break;
        case 0:
          $("#msgBox").removeClass("error").addClass("success");
          $("#msgBox").fadeIn();
          $("#msgBox").html("Account created successfully");
          flipL();
          setTimeout(() => {
            $("#msgBox").fadeOut();
            setTimeout(() => {
              $("#msgBox").removeClass("success").addClass("error");
            }, 1000);
          }, 2000);
          break;
        case 1:
          $("#msgBox").fadeIn();
          $("#msgBox").html("Please fill all fields with valid data");
          setTimeout(() => {
            $("#msgBox").fadeOut();
          }, 5000);
          break;
      }
    },
    error: function (xhr, status, error) {
      $("#msgBox").fadeIn();
      $("#msgBox").html("An error occurred :" + error + " Try again later");
      setTimeout(() => {
        $("#msgBox").fadeOut();
      }, 5000);
    },
  });
}
function throwErr(text) {
  $("#msgBox").fadeIn();
  $("#msgBox").html(text);
  setTimeout(() => {
    $("#msgBox").fadeOut();
  }, 5000);
}
function edit() {
  var old = $(".oldPassword").val().trim();
  var newP = $(".newPassword").val().trim();
  var confP = $(".confPassword").val().trim();
  if (old === "" || newP === "" || confP === "") {
    $("#msgBox").fadeIn();
    $("#msgBox").html("Please fill all password fields with valid data");
    setTimeout(() => {
      $("#msgBox").fadeOut();
    }, 5000);
  } else if (newP !== confP) {
    $("#msgBox").fadeIn();
    $("#msgBox").html(
      "The passwords you entered do not match. Please try again."
    );
    setTimeout(() => {
      $("#msgBox").fadeOut();
    }, 5000);
  } else {
    $.ajax({
      type: "POST",
      url: "editP.php",
      data: {
        oldPass: old,
        newPass: newP,
      },
      success: function (data) {
        data = Number(data);
        switch (data) {
          case -1:
            $("#msgBox").fadeIn();
            $("#msgBox").html("The old password you entered is incorrect.");
            setTimeout(() => {
              $("#msgBox").fadeOut();
            }, 5000);
            break;

          case 0:
            $("#msgBox").removeClass("error").addClass("success");
            $("#msgBox").fadeIn();
            $("#msgBox").html("Password changed");
            setTimeout(() => {
              $("#msgBox").fadeOut();
              setTimeout(() => {
                $("#msgBox").removeClass("success").addClass("error");
              }, 1000);
            }, 2000);
            break;
        }
      },
      error: function (xhr, status, error) {},
    });
  }
}
function resetHist() {
  var confirmation = confirm("Are you sure you want to reset all history ?");
  if (confirmation) {
    $.ajax({
      type: "POST",
      url: "resetH.php",
      success: function (response) {
        $("#msgBox").removeClass("error").addClass("success");
        $("#msgBox").fadeIn();
        $("#msgBox").html(response);
        setTimeout(() => {
          $("#msgBox").fadeOut();
          setTimeout(() => {
            $("#msgBox").removeClass("success").addClass("error");
          }, 1000);
        }, 2000);
      },
    });
  }
}
function deleteAcc() {
  var confirmation = confirm(
    "Are you sure you want to delete your account permanently ? you will be automatically signed out "
  );
  if (confirmation) {
    $.ajax({
      type: "POST",
      url: "delete.php",
      success: function (response) {
        window.location.href = "/site/logout.php";
      },
    });
  }
}
