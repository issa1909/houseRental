<?php 

$conn = mysqli_connect('localhost', 'root', '', 'renting');

if(isset($_POST['register'])){
   
    $nameOfTenant = $_POST['nameOfTenant'];
    $houseNumber = $_POST['houseNumber'];
    $amountPayed = $_POST['amountPayed'];
{
    $stmt = $conn->prepare('insert into tenants(nameOfTenant, houseNumber, amountPayed)values(?,?,?)');
    $stmt -> bind_param('sss',$nameOfTenant,$houseNumber,$amountPayed);
    $stmt -> execute();
    echo  (    "<script>
    alert('👍 You are successfully Book a house!');
    window.location.href = 'index.html'; 
    </script>");
    $stmt ->close();
    $conn ->close();
}
}
?>
