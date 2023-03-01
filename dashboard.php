<?php
session_start();
include("connection.php");
if (! isset($_SESSION['id'])){
  header("Location: index.php");

}
// $id = $_GET["id"];
$record=$models->execute_kw($db, $uid, $password, 'customer.details', 'search_read', array(array(array('id', '=',$_SESSION['id'] ))), 
array('fields'=>array('name', 'phone', 'email','username',"user_directory","odoo_cont_name","web_port","db_cont_name",'db_port','state'), 'limit'=>1));
foreach ($record as $r){
?>

<!doctype html>
<html lang="en">

<head>
  <title>Dashboard </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <section>

    <div class="container-fluid bg-dark">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand pl-5" href="../">Automation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">ContactUs</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">AboutUS</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
            <li class="nav-item">
            <?php if (isset($_SESSION['id'])){
              echo '<a class="nav-link" href="log_out.php">Log Out</a>';
            }else{
                echo '<a class="nav-link" href="#">Log in</a>';

              }?>
            </li>
          </ul>

        </div>
      </nav>
    </div>
  </section>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-3 bg-secondary" style="height: 99vh;">
          <br><br><br>
          <div class="row mt-5 text-light">
            <div class="col-4 ">
              <label for="name">Name</label>
            </div>
            <div class="col-6">
              <label for="name_value"> <?php  print($r['name']);?></label>
            </div>

            <div class="col-4 ">
              <label for="name">User ID</label>
            </div>
            <div class="col-6">
              <label for="name_value"> <?php  print($r['username']);?></label>
            </div>

            <div class="col-4 ">
              <label for="name">Phone</label>
            </div>
            <div class="col-6">
              <label for="name_value"> <?php  print($r['phone']);?></label>
            </div>
            <div class="col-4 ">
              <label for="name">E-mail</label>
            </div>
            <div class="col-6">
              <label for="name_value"> <?php  print($r['email']);?></label>
            </div>
            <div class="col-4 ">
              <label for="name">Folder</label>
            </div>
            
            <div class="col-6">
              <label for="name_value"> <?php  print($r['user_directory']);?></label>
            </div>
          </div>
        </div>

        <div class="col-9 bg-info" style="height: 99vh;">
          <table class="table mt-5">
            <thead class="thead-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Odoo Web</th>
                <th scope="col">Database</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>  <?php  print($r['odoo_cont_name']);?></td>
                <td>  <?php  print($r['db_cont_name']);?></td>
                <td>  <?php  print($r['state']);} ?> </td>
                <td>
                  <?php if ($r['state']=="running"){                 
                    ?> <button type="button" class="btn btn-light mx-auto px-4"
                     onClick="parent.location.href='stop.php'">Stop</button>
                    <?php
                  }else{ 
                    ?> <button type="button" class="btn btn-light mx-auto px-4"
                     onClick="parent.location.href='start.php'">Start</button>
                   <?php }  ?>
                   
                </td>
              </tr>
              <tr>
               
              

              
            </tbody>
          </table>

          
        </div>

      </div>
    </div>

  </section>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>