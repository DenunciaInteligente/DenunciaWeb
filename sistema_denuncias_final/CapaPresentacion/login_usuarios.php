<?php 
$usuario = "";
$clave = "";
$informacion = "";
$datos = "";

if(isset($_POST['login']))
{
    include_once ("../CapaDatos/conecta.php");
    $usuario = $_POST["user"];
    $clave = $_POST["pass"];

    $sql    = "select count(*) as contar from login where usuario = '$usuario'";
    $rs     = mysqli_query($conx, $sql);
    $datos  = mysqli_fetch_array($rs);
    $contar = $datos["contar"];

    if($contar == 1 )
    {
        $sql    = "select * from login where usuario = '$usuario'";
        $rs     = mysqli_query($conx, $sql);
        $datos  = mysqli_fetch_array($rs);

        if($datos["contrasena"] == $clave)
        {
            header("Location:home.php");
        }else{
?>
<script>
alert("Clave Incorrecta");
</script>
<?php
        }

    }else{
?>
<script>
alert("Usuario incorrecto");
</script>
<?php
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Usuarios</title>
    <script src="../assets/funciones.js"></script>
        <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script>
        function login()
        {
            var user    = document.getElementById("user").value;
            var clave   = document.getElementById("pass").value;

            var parametros = {
                "user"      : user,
                "clave"     : clave,
                "tarea"     : "login"
            }

            $.ajax(
            {
                data:  parametros,
                url:   '../CapaNegocios/login.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                respuesta = response.trim();
                if(respuesta == "ok")
                {
                    window.locationf="CapaPresentacion/home.php";
                }else
                {
                    alert(respuesta);
                }

            }})

        }
        </script>
    <style>
    /*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
    background-repeat: no-repeat;
    background-image: linear-gradient(#CEE3F6, #819FF7);
}

.card-container.card {
    max-width: 350px;
    padding: 40px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;

}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin {
    /*background-color: #4d90fe; */
    background-color: #5858FA;
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-salir {
    /*background-color: #4d90fe; */
    background-color: #FA5858;
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: #2E2EFE;
}

.btn.btn-salir:hover,
.btn.btn-salir:active,
.btn.btn-salir:focus {
    background-color: #FE2E2E;
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}
    </style>
</head>
<body>

    <div class="container">
        <div class="card card-container">

            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action ="" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="user" name="user" class="form-control" placeholder="Ingrese Usuario"  autofocus>
                <input type="password" id="pass" name="pass" class="form-control" placeholder="Ingrese Clave" >
                <div class="row">
                    <div class="col-md-6">
                        <input class="btn btn-lg btn-primary btn-block btn-signin" type="submit" name="login" value="login" >
                    </div>
                    <div class="col-md-6">
                        <a href="../index.php">
                            <button class="btn btn-lg btn-danger btn-block btn-salir" type="button">Volver</button>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</body>
</html>