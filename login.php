<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '', 'renting');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_login WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username; 

        header("Location: other.php"); 
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }
    ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 25%;
  background-color: aqua;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: blue;
  color: white;
}

li a:hover:not(.active) {
  background-color: rgb(140, 180, 226);
  color: white;
}
        a{
            text-decoration: none;
        
        } 
body{
    background-image: url(imagEs/photo1.jfif);
    background-size: cover;
    background-position:center ;
}
.container{
    width: 500px;
    background: aqua;
    opacity: 0.9;
    box-shadow: rgba(0,0,0,0.7);
    padding: 50px 0;
    margin: 5% auto;
    border-radius: 4px;

}
.form-content{
    padding-bottom: 5px;
    margin: 30px auto;
    padding-top: 10px;
    width: 80%;
    border-bottom: 1px solid white;
    color: white;

}
::placeholder{
    color: black;
    font-size: 16px;
}

.form-content input{
    width: 70%;
    outline: none;
    border: none;
    background: transparent;
    color: white;
    font-size: 16px;
}

h1{
    text-align: center;
    margin-bottom: 40px;
    color: rgb(27, 27, 27);
}


.logbtn{
    background: transparent;
    margin :30px auto 15px;
    width: 80%;
    display: block;
    border: 1px solid white;
    color: blue;
    cursor: pointer;
    font-size: 18px;
}
.sticky-top {
        position: sticky; 
        top: 0;    
        width: 100%;   
        background-color: #f0f0f0; 
        padding: 10px;   
        z-index: 100;
        box-sizing: border-box;
      }

</style>
<body>
   <div class ="sticky-top" style="color: blue;background-color: white;font-size: 50px;opacity: 0.9;">
    House Rental
    </div>
    <div class="container">
    <h2 style="text-align:center;">Admin Login</h2>
    <?php if(isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-content">     
          <input type="text" id="username" autocomplete=off name="username" placeholder="Username"required><br><br>
        </div>        
        <div class="form-content">
          <input type="password" id="password" placeholder="Password "name="password" required><br><br>
        </div>
        <button type="submit" class="logbtn" name="login">Login</button>
    </form>
    </div>
</body>
</html>