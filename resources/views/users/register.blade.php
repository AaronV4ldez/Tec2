<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{asset('css/sb-admin-2.min.css')}}" >
    <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
</head>

<body class="fondo">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea una cuenta</h1>
                            </div>
                            <form class="user" method="POST" action="/registro">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" id="exampleFirstName"
                                            placeholder="Nombres" name="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="exampleLastName"
                                            placeholder="Apellidos" name="lastName">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail"
                                        placeholder="Correo" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control"
                                            id="exampleInputPassword" placeholder="Contraseña" name="p1">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control"
                                            id="exampleRepeatPassword" placeholder="Repetir Contraseña" name="p2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="level" class="form-control" placeholder="Selecciona el tipo de usuario">
                                        <option value="" selected disabled hidden>Seleccione el tipo de usuario</option>
                                        <option value="Docente">Docente</option>
                                        <option value="Alumno">Alumno</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-general btn-user btn-block">Regístrate ahora</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="">¿Ya tienes una cuenta? ¡Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
</body>

</html>