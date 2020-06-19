<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>iNote - Ghi chú</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <?php
     
    // Nếu tồn tại $user
    if ($user)
    {
        echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom:20px" role="navigation">
            <a class="navbar-brand" href="index.php">
                <img src="./images/notes.png" width="30" height="30" class="d-inline-block align-top" alt="">
                iNote
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tài khoản
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?ac=change_password">Đổi mật khẩu</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signout.php">Thoát</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm</button>
                </form>
            </div>
            </nav>
        ';
    }
    // Ngược lại không tồn tại $user
    else
    {
        echo '
            <nav class="navbar navbar-default" style="margin-bottom:20px" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">           
                        <a class="navbar-brand" href="index.php">
                            <span class="glyphicon glyphicon-edit"></span> iNote
                        </a>
                    </div> 
                </div>
            </nav>
        ';
    }
 
    ?>