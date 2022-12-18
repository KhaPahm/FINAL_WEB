$(document).ready(function () {
   $.ajax({
      url: 'http://localhost/final_web/api/user_api.php?logged_in',
      method: 'GET',
      success: (data) => {
         let status = JSON.parse(data).status;
         console.log(data);
         if (status) {
            window.location.replace('index.php');
         } else {
            $(".container").fadeIn(1000);
            $(".s2class").css({ "color": "#748194" });
            $(".s1class").css({ "color": "#EE9BA3" });
            $("#left").addClass("left_hover");
            $("#right").removeClass("right_hover");
            $(".signin").css({ "display": "" });
            $(".signup").css({ "display": "none" });
            $(".forgot").css({ "display": "none" });
         }
      }
   })
});
$("#right").click(function () {
   $("#left").removeClass("left_hover");
   $(".s2class").css({ "color": "#EE9BA3" });
   $(".s1class").css({ "color": "#748194" });
   $("#right").addClass("right_hover");
   $(".signin").css({ "display": "none" });
   $(".signup").css({ "display": "" });
   $(".forgot").css({ "display": "none" });

});
$("#left").click(function () {
   $(".s1class").css({ "color": "#EE9BA3" });
   $(".s2class").css({ "color": "#748194" });
   $("#right").removeClass("right_hover");
   $("#left").addClass("left_hover");
   $(".signup").css({ "display": "none" });
   $(".signin").css({ "display": "" });
   $(".forgot").css({ "display": "none" });
});
$('#forgot_password').click(function () {
   $(".signin").css({ "display": "none" });
   $(".signup").css({ "display": "none" });
   $(".forgot").show(1000);
})

// LOGIN WITH SERVER

$("#btn_login").click(() => {
   console.log($('#login_form').serialize());
   $.ajax({
      url: 'http://localhost/final_web/api/user_api.php',
      method: 'POST',
      data: $('#login_form').serialize(),
      success: (data) => {
         let status = JSON.parse(data).status;
         let role = JSON.parse(data).role;
         console.log(data);
         console.log(role);
         if (status && role < 2) {
            window.location.replace('index.php');
         } else if (status && role == 3) {
            window.location.replace('admin.php');
         } else {
            alert(" Wrong username or password!");
         }
      }
   })
})

$('#btn_sign_up').click(() => {
   checkNull();
   if ($('#password_signup').val() != $('#confirm_password').val()) {
      alert("Your confirm password is wrong! Please entry again!");
   } else {
      let signUpForm = $('#sign_up').serialize();
      console.log(signUpForm);
      $.ajax({
         url: 'http://localhost/final_web/api/user_api.php',
         method: 'POST',
         data: signUpForm,
         success: function (data) {
            let status = JSON.parse(data).status;
            if (data) {
               window.location.href = '#popup1';
            } else {
               alert('Email was registered! Please try again!')
            }
         }
      })

   }
})

function checkNull() {
   if ($("#email_signup").val() == "" || $("#password_signup").val() == "" || $("#fname").val() == "" || $("#lname").val() == ""
      || $("#phone").val() == "" || $("#nationality").val() == "" || $("#confirm_password").val() == "") {
      alert("You missed some information! Please fill this form again!");
      if ($("#email_signup").val() == "") $("#email_signup").addClass("class-null");
      else $("#email_signup").removeClass("class-null");

      if ($("#password_signup").val() == "") $("#password_signup").addClass("class-null");
      else $("#password_signup").removeClass("class-null");

      if ($("#fname").val() == "") $("#fname").addClass("class-null");
      else $("#fname").removeClass("class-null");

      if ($("#lname").val() == "") $("#lname").addClass("class-null");
      else $("#lname").removeClass("class-null");

      if ($("#phone").val() == "") $("#phone").addClass("class-null");
      else $("#phone").removeClass("class-null");

      if ($("#nationality").val() == "") $("#nationality").addClass("class-null");
      else $("#nationality").removeClass("class-null");

      if ($("#confirm_password").val() == "") $("#confirm_password").addClass("class-null");
      else $("#confirm_password").removeClass("class-null");
   }
}

//CHECK CONFIRM PASSWORD HAVE TO MATCH WITH PASSWORD
function checkPassword() {
   if ($('#password_signup').val() != $('#confirm_password').val()) {
      $('#confirm_password').addClass('class-null');
   } else {
      $('#confirm_password').removeClass('class-null');

   }
}

//CALL FUNTCTION CHECK PASSWORD WHEN USER ENTRY TEXT FROM KEYBOARD
$('#confirm_password').keyup(checkPassword)


$('#close_modal').click(() => {
   $('#myModal').hide();
})

$('#verify').click(() => {
   $.ajax({
      url: 'http://localhost/final_web/api/user_api.php',
      method: 'POST',
      data: $('#otp').serialize(),
      success: function (data) {
         console.log(data);
         let status = JSON.parse(data).status;
         if (status) {
            window.location.replace('index.php');
            alert("Now your was became a menber of Airtech! Truy service now!");
         } else {
            alert('Your otp is wrong! Please try again!');
         }
      }
   })
})

$('#btn_forgot').click(() => {

   if ($("#email_forgot").val() == "" || $("#pass_forgot").val() == "" || $("#confirm_pass_forgot").val() == "") {
      alert("You missed some information! Please fill this form again!");
      if ($("#email_forgot").val() == "") $("#email_forgot").addClass("class-null");
      else $("#email_forgot").removeClass("class-null");

      if ($("#pass_forgot").val() == "") $("#pass_forgot").addClass("class-null");
      else $("#pass_forgot").removeClass("class-null");

      if ($("#confirm_pass_forgot").val() == "") $("#confirm_pass_forgot").addClass("class-null");
      else $("#confirm_pass_forgot").removeClass("class-null");
   } else if ($("#pass_forgot").val() != $("#confirm_pass_forgot").val()) {
      alert("Your confirm password is wrong! Please entry again!");
   } else {
      console.log($('#forgot_form').serialize());
      $.ajax({
         url: 'http://localhost/final_web/api/user_api.php',
         method: 'POST',
         data: $('#forgot_form').serialize(),
         success: (data) => {
            let status = JSON.parse(data).status;
            if (data) {
               window.location.href = '#popup2';
            } else {
               alert("Email wasn't registered! Please try again!")
            }
         }
      })
   }
})

$('#verify_forgot').click(() => {
   $.ajax({
      url: 'http://localhost/final_web/api/user_api.php',
      method: 'POST',
      data: {
         otp_forgot: $('#otp_forgot').val()
      },
      success: function (data) {
         console.log(data);
         let status = JSON.parse(data).status;
         if (status) {
            $('#otp_forgot').val(" ");
            alert("GET NEW PASSWORD DON");
            window.location.href = '#';
            window.location.replace("login.php");
            $('#forgot_form')[0].reset();
         } else {
            alert('Your otp is wrong! Please try again!');
         }
      }
   })
})