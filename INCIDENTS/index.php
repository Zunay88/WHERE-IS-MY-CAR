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

<div ng-controller="IncidenceController">

    <!-- Content Section -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><b>WHERE IS MY CAR?</b></h1>
            </div>
            <div class="col-md-12">
                <h2><b><span class=" glyphicon glyphicon-folder-open"></span>  Incidencias:</b></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#search_new_incidence_modal"><span class="glyphicon glyphicon-search"></span> Buscar incidencia</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#add_new_incidence_modal"><span class="glyphicon glyphicon-plus"></span> Añadir incidencia
                    </button>
                    <a href="../CARS" class="btn btn-info"><span class="glyphicon glyphicon-wrench"></span> Ver coches</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Búsqueda:</h3>
                <table ng-if="search_incidents.length > 0" class="table table-bordered table-responsive table-striped">
                    <tr>
                        <th>No</th>
                        <th>Matrícula</th>
                        <th>Descripción</th>
                        <th>Depósito</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                    <tr ng-repeat="search_incidence in search_incidents | orderBy:'fecha'">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ search_incidence.matricula }}</td>
                        <td>{{ search_incidence.descripcion }}</td>
                        <td>{{ search_incidence.deposito }}</td>
                        <td class="fecha">{{ search_incidence.fecha }}</td>
                        <td>{{ search_incidence.estado }}</td>
                        <td>
                            <button ng-click="edit($index)"  class="btn btn-primary btn-xs"><span class= "glyphicon glyphicon-pencil"></span> Editar</button>
                            <button ng-click="delete($index)" class="btn btn-danger btn-xs"><span class= "glyphicon glyphicon-trash"></span> Borrar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Listado:</h3>
                <table ng-if="incidents.length > 0" class="table table-bordered table-responsive table-striped">
                    <tr>
                        <th>No</th>
                        <th>Matrícula</th>
                        <th>Descripción</th>
                        <th>Depósito</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                    <tr ng-repeat="incidence in incidents | orderBy:'fecha'">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ incidence.matricula }}</td>
                        <td>{{ incidence.descripcion }}</td>
                        <td>{{ incidence.deposito }}</td>
                        <td class="fecha">{{ incidence.fecha }}</td>
                        <td>{{ incidence.estado }}</td>
                        <td>
                            <button ng-click="edit($index)"  class="btn btn-primary btn-xs"><span class= "glyphicon glyphicon-pencil"></span> Editar</button>
                            <button ng-click="delete($index)" class="btn btn-danger btn-xs"><span class= "glyphicon glyphicon-trash"></span> Borrar</button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- /Content Section -->

    <!-- Bootstrap Modals -->

<!-- Modal - Search New Incidence -->
<div class="modal fade" id="search_new_incidence_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buscar incidencia</h4>
            </div>
            <div class="modal-body">

                <ul class="alert alert-danger" ng-if="errors.length > 0">
                    <li ng-repeat="error in errors">
                        {{ error }}
                    </li>
                </ul>

                <div class="form-group">
                    <label for="matricula">Matrícula</label>
                    <input ng-model="search_incidence.matricula" type="text" id="matricula" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" ng-click="searchIncidents()">Buscar incidencia</button>
            </div>
        </div>
    </div>
</div>



    <!-- Modal - Add New Incidence -->
    <div class="modal fade" id="add_new_incidence_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Añadir incidencia</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input ng-model="incidence.matricula" type="text" id="matricula" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea ng-model="incidence.descripcion" class="form-control" name="descripcion"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deposito">Depósito</label>
                        <input ng-model="incidence.deposito" type="text" id="deposito" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input ng-model="incidence.fecha" type="text" id="fecha" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input ng-model="incidence.estado" type="text" id="estado" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="addIncidence()">Añadir incidencia</button>
                </div>
            </div>
        </div>
    </div>
    <!-- // Modal -->

    <!-- Modal - Update Incidence -->
    <div class="modal fade" id="modal_update_incidence" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detalles incidencia</h4>
                </div>
                <div class="modal-body">

                    <ul class="alert alert-danger" ng-if="errors.length > 0">
                        <li ng-repeat="error in errors">
                            {{ error }}
                        </li>
                    </ul>

                    <div class="form-group">
                        <label for="matricula">Matrícula</label>
                        <input ng-model="incidence_details.matricula" type="text" id="matricula" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea ng-model="incidence_details.descripcion" class="form-control" name="descripcion"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="deposito">Depósito</label>
                        <input ng-model="incidence_details.deposito" type="text" id="deposito" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input ng-model="incidence_details.fecha" type="text" id="fecha" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input ng-model="incidence_details.estado" type="text" id="estado" class="form-control"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" ng-click="updateIncidence()">Guardar cambios</button>
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
