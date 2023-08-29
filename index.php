<?php
session_start();
include 'connection.php';
if (isset($_POST['login']) && isset($_POST['username'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $r = "select username, password from user";
    $result = mysqli_query($conn, $r)or die(mysqli_error($conn));
    while ($row = $result->fetch_assoc()) {
        $username = $row['username'];
        $id = $row['id'];
        $firstname = $row['firstname'];
        $lasttname = $row['lasttname'];
    if (mysqli_num_rows($result)==1) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['id'] = $id;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lasttname'] = $lasttname;
        header("location:posts.php");

    }else{
        echo "Wrong Username or Password";
        header("location:index.php");
    }
}
}
?>

<html>

<head>
    <title>Login</title>
   <link rel="javascript" type="text/javascript" href="
cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
   <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <style type="text/css">
        *, *:before, *:after {
  box-sizing: border-box;
}

html {
  overflow-y: scroll;
}

body {
  background: lightcyan;
  font-family: 'Titillium Web', sans-serif;
}

a {
  text-decoration: none;
  color: black;
  transition: .5s ease;
}
a:hover {
  color: black;
}

.form {
  background: mintcream;
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
}

.tab-group {
  list-style: none;
  padding: 0;
  margin: 0 0 40px 0;
}
.tab-group:after {
  content: "";
  display: table;
  clear: both;
}
.tab-group li a {
  display: block;
  text-decoration: none;
  padding: 15px;
  background: rgba(160, 179, 176, 0.25);
  color: #a0b3b0;
  font-size: 20px;
  float: left;
  width: 50%;
  text-align: center;
  cursor: pointer;
  transition: .5s ease;
}
.tab-group li a:hover {
  background: #179b77;
  color: #ffffff;
}
.tab-group .active a {
  background: #1ab188;
  color: #ffffff;
}

.tab-content > div:last-child {
  display: none;
}

h1 {
  text-align: center;
  color: black;
  font-weight: 300;
  margin: 0 0 40px;
}

label {
  position: absolute;
  transform: translateY(6px);
  left: -20px;
  color: black;
  transition: all 0.25s ease;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
  font-size: 22px;
}
label .req {
  margin: 2px;
  color: black;
}

label.active {
  transform: translateY(50px);
  left: 2px;
  font-size: 14px;
}
label.active .req {
  opacity: 100%;
}

label.highlight {
  color: black;
}

input, textarea {
  font-size: 22px;
  display: block;
  width: 430px;
  height: 30px;
  padding: 5px 10px;
  background: none;
  background-image: none;
  border: 1px solid #a0b3b0;
  color: black;
  border-radius: 5px;
  transition: border-color .25s ease, box-shadow .25s ease;
}
input:focus, textarea:focus {
  outline: 0;
  border-color: #1ab188;
}

textarea {
  border: 2px solid #a0b3b0;
  resize: vertical;
}

.field-wrap {
  position: relative;
  margin-bottom: 40px;
}

.top-row:after {
  content: "";
  display: table;
  clear: both;
}
.top-row > div {
  float: left;
  width: 48%;
  margin-right: 4%;
}
.top-row > div:last-child {
  margin: 0;
}

.button {
  border: 0;
  outline: none;
  border-radius: 0;
  padding: 15px 0;
  font-size: 2rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .1em;
  background: #1ab188;
  color: #ffffff;
  transition: all 0.5s ease;
  -webkit-appearance: none;
}
.button:hover, .button:focus {
  background: #179b77;
}

.button-block {
  display: block;
  width: 100%;
}

.forgot {
  margin-top: -20px;
  text-align: right;
}
    </style>
</head>

<body>
    <script type="text/javascript">
      /* $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

    if (e.type === 'keyup') {
      if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
      if( $this.val() === '' ) {
        label.removeClass('active highlight'); 
      } else {
        label.removeClass('highlight');   
      }   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
        label.removeClass('highlight'); 
      } 
      else if( $this.val() !== '' ) {
        label.addClass('highlight');
      }
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});*/
    </script>
    <div class="form">
      
      
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="" method="post">
          
            <div class="field-wrap">
            
            <input type="text"name="username"required autocomplete="off"/ placeholder="Username">
          </div>
          
          <div class="field-wrap">
            
            <input type="password"name="password"required autocomplete="off"/ placeholder="Password">
          </div>
          
          <p class="forgot"><a href="#">Forgot Password?</a></p>
          
          <button class="button button-block"/ type="submit" name="login">Log In</button>
          
          </form>

        </div>
        
      
      
</div> <!-- /form -->
</body>

</html>