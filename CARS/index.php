<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WHERE IS MY CAR?</title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css"/>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body ng-app="App">

<div ng-controller="CarController">

    <!-- Content Section -->
    <div class="container">
        <div class="row">
          <div class="col-md-12">
              <h1><b>WHERE IS MY CAR?</b></h1>
          </div>
          <div class="col-md-12">
              <h2><i><u><b>Coches:</b></u></i></h2>
          </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#search_new_car_modal">Buscar coche</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_car_modal">Añadir coche
                    </button>
                    <a href="../INCIDENTS" class="btn btn-info">Ver incidencias</a>
                </div>
            </div>
        </div>

        <div class="row">
                    <div class="col-md-12">
                        <h3>Búsqueda:</h3>
                        <table ng-if="cars.length > 0" class="table table-bordered table-responsive table-striped">
                            <tr>
                              <th>Matrícula</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th>Color</th>
                              <th>Opciones</th>
                            </tr>
                            <tr ng-repeat="car in cars | orderBy:'matricula'">
                              <td>{{ car.matricula }}</td>
                              <td>{{ car.marca }}</td>
                              <td>{{ car.modelo }}</td>
                              <td>{{ car.color }}</td>
                              <td>
                                    <button ng-click="edit($index)"  class="btn btn-primary btn-xs">Editar</button>
                                    <button ng-click="delete($index)" class="btn btn-danger btn-xs">Borrar</button>
                              </td>
                            </tr>
                        </table>
                    </div>
                </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Listado:</h3>
                <table ng-if="cars.length > 0" class="table table-bordered table-responsive table-striped">
                    <tr>
                        <th>Matrícula</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Opciones</th>
                    </tr>
                    <tr ng-repeat="car in cars | orderBy:'matricula'">
                        <td class="matricula">{{ car.matricula }}</td>
                        <td class="marca">{{ car.marca }}</td>
                        <td class="modelo">{{ car.modelo }}</td>
                        <td class="color">{{ car.color }}</td>
                        <td>
                            <button ng-click="edit($index)"  class="btn btn-primary btn-xs">Editar</button>
                            <button ng-click="delete($index)" class="btn btn-danger btn-xs">Borrar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /Content Section -->

    <!-- Bootstrap Modals -->

    <!-- Modal - Select New Car -->
    <div class="modal fade" id="select_new_car_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buscar coche</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input ng-model="car.matricula" type="text" id="matricula" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="addIncidence()">Buscar incidencia</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal - Add New Task -->
    <div class="modal fade" id="add_new_car_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Añadir coche</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input ng-model="car.matricula" type="text" id="matricula" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input ng-model="car.marca" type="text" id="marca" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input ng-model="car.modelo" type="text" id="modelo" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input ng-model="car.color" type="text" id="color" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="addCar()">Añadir coche</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

    <!-- Modal - Update Task -->
    <div class="modal fade" id="modal_update_car" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detalles coche</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input ng-model="car_details.matricula" type="text" id="matricula" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input ng-model="car_details.marca" type="text" id="marca" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input ng-model="car_details.modelo" type="text" id="modelo" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input ng-model="car_details.color" type="text" id="color" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="updateCar()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

</div>

<!-- Jquery JS file -->
<script type="text/javascript" src="lib/jquery-1.11.3.min.js"></script>

<!-- AngularJS file -->
<script type="text/javascript" src="lib/angular.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="lib/app.js"></script>
</body>
</html>
