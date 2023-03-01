<?php

include("connection.php");  
$id = $_GET["id"];
$record=$models->execute_kw($db, $uid, $password, 'customer.details', 'search_read', array(array(array('id', '=', $id))), 
array('fields'=>array('name', 'phone', 'email','username',"user_directory","odoo_cont_name","web_port","db_cont_name",'db_port'), 'limit'=>1));
// print_r($record);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <div class="container-fluid bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand pl-5" href="../">Automation</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ContactUs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">AboutUS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <a class="nav-link" href="#">Log in</a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>



    <div class='container'>
        <br>
        <h3>All details ......</h3><br><br>
        <div class="row">
            <div class="col-4 ml-2 pt-5">
                <table class="table">
                    <thead>
                        <?php   foreach ($record as $r){  ?>
                        <tr>
                            <th>Name</th>
                            <td>
                                <?php  print($r['name']);?>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Phone</th>
                            <td>
                                <?php  print($r['phone']);?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>
                                <?php  print($r['email']);?>
                            </td>
                        </tr>
                        <tr>
                            <th>User ID</th>
                            <td>
                                <?php  print($r['username']);?>
                            </td>
                        </tr>
                        <tr>
                            <th>Folder Location</th>
                            <td>
                                <?php  print($r['user_directory']);?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <th>Odoo Container name</th>
                        <th>Satate</th>
                        <th>DB Container Name</th>
                        <th>Satate</th>
                        <th>Action</th>
                    </thead>
                    <tr>
                        <td>
                            <?php  print($r['odoo_cont_name']);?>
                        </td>
                        <td>Running</td>
                        <td>
                            <?php  print($r['db_cont_name']);}?>
                        </td>
                        <td>Running</td>
                        <td> <button type="button" class="btn btn-primary px-5">Stop</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
            </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
            </script>
</body>
</html>