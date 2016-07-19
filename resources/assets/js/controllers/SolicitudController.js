angular.module('SolicitudController', []).controller('SolicitudController', ['$scope', '$location', '$routeParams', 'Solicitud', 'User', '$uibModal', '$timeout', 'Aula', 'Recurso',
    function ($scope, $location, $routeParams, Solicitud, User, $uibModal, $timeout, Aula, Recurso) {

        $scope.solicitudes = [];
        $scope.create = function () {
            for (var i = 0; i < $scope.solicitudes.length; i++) {
                var solicitud = new Solicitud($scope.solicitudes[i]);
                solicitud.$save(function (res) {
                    //  $location.path('solicituds/view/' + res.id);
                    $scope.message = "El solicitud se ha creado con éxito";
                }, function (err) {
                    console.log(err);
                });
            }

        };

        $scope.findAll = function () {
            $scope.getUser();
            var splitPath = $location.path().split('/');
            var userId = splitPath[splitPath.length - 1];
            $scope.usuario = User.get({ userId: $scope.authenticatedUser.id }, function (user) {
                if ($scope.authenticatedUser.rol != "Admin") {
                    $scope.show = false;
                    $scope.message = "No esta autorizado para ver esta información."

                } else {
                    $scope.show = true;
                    $scope.guardadas = Solicitud.query();
                }

            });


        };

        $scope.findEverything = function () {
            $scope.principal = [];
            $scope.ciencias = [];
            $scope.disponibles = [];
            $scope.getUser();
            $scope.aulas = Aula.query({}, function (aulas) {
                for (var i = 0; i < aulas.length; i++) {
                    if (aulas[i].edificio == "Principal") {
                        $scope.principal.push(aulas[i]);
                    } else {
                        $scope.ciencias.push(aulas[i]);
                    }
                }

            });
            $scope.recursos = Recurso.query();
            $scope.guardadas = Solicitud.query();
        }

        $scope.buscar = function () {
            var numero = 0;
            if ($scope.duracion == "Días") {
                numero = $scope.numero;
            }
            if ($scope.duracion == "Semanas") {
                numero = $scope.numero * 7;
            }
            if ($scope.duracion == "Meses") {
                numero = $scope.numero * 30;
            }
            if (numero == 0) {
                numero = 1;
            }
            var devolucion = new Date();
            devolucion.setDate($scope.solicitud.fecha_inicio.getDate() + parseInt(numero));
            $scope.solicitud.fecha_devolucion = devolucion;
            if ($scope.duracion == "Cuatrimestre") {
                $scope.solicitud.fecha_devolucion = new Date(2016, 7, 20);
            }

            for (var i = 0; i < $scope.guardadas.length; i++) {
                if (Date.parse($scope.solicitud.fecha_inicio) >= Date.parse($scope.guardadas[i].fecha_inicio) && Date.parse($scope.solicitud.fecha_inicio) <= Date.parse($scope.guardadas[i].fecha_devolucion)) {
                    var recursoId = $.grep($scope.recursos, function (e) { return e.id == $scope.guardadas[i].recursoId; });
                    $scope.recursos = $scope.recursos.map(function (e) { if (e.id == recursoId[0].id) { e.estado = "Prestado" } return e; });
                    
                }
            }
            console.log($scope.recursos);
            for (var i = 0; i < $scope.recursos.length; i++) {
                if ($scope.recursos[i].estado == "Disponible") {
                    if ($scope.solicitud.aula.aireAcondicionado == "Sí" && $scope.recursos[i].tipo == "Aire Acondicionado") {
                        $scope.disponibles.push($scope.recursos[i]);
                    }
                    if ($scope.solicitud.aula.computadora == "Sí" && $scope.recursos[i].tipo == "Computadora") {
                        $scope.disponibles.push($scope.recursos[i]);
                    }
                    if ($scope.solicitud.aula.proyector == "Sí" && $scope.recursos[i].tipo == "Proyector") {
                        $scope.disponibles.push($scope.recursos[i]);
                    }
                    if ($scope.recursos[i].tipo == "Otro") {
                        $scope.disponibles.push($scope.recursos[i]);
                    }
                }

            }

        }
        var num = 0;
        $scope.agregar = function () {

            var solicitud = {};
            solicitud.num = num;
            solicitud.solicitante = $scope.authenticatedUser.nombre;
            solicitud.fecha_inicio = $scope.solicitud.fecha_inicio;
            solicitud.fecha_devolucion = $scope.solicitud.fecha_devolucion;
            solicitud.recurso = $scope.solicitud.recurso.nombre;
            solicitud.recursoId = $scope.solicitud.recurso.id;
            solicitud.aula = $scope.solicitud.aula.numero;
            solicitud.estado = "Pendiente";
            solicitud.edificio = $scope.edificio;
            $scope.solicitudes.push(solicitud);
            $scope.solicitud = {};
            $scope.edificio = "";
            $scope.duracion = "";
            $scope.disponibles = [];
            num++;
        }


        $scope.remove = function (num) {

            $scope.solicitudes.splice(num, 1);
        };

        $scope.update = function (solicitud) {
            solicitud.$update(function (res) {
            }, function (err) {
                console.log(err);
            });
        };

        $scope.edit = function () {
            Solicitud.updateAll({ solicitud: $scope.solicitud }, function (response) {
                $scope.message = response.message;
                $timeout(function () {
                    $location.path('solicitud/list/');
                }, 2000);

            });
        }

        $scope.findOne = function () {
            var splitPath = $location.path().split('/');
            var id = splitPath[splitPath.length - 1];
            $scope.solicitud = Solicitud.get({ id: id },function(solicitud){
                $scope.solicitud.fecha_inicio = new Date(solicitud.fecha_inicio);
                $scope.solicitud.fecha_devolucion = new Date(solicitud.fecha_devolucion);
            });
        };

        $scope.aceptar = function (solicitud) {
            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: 'myModalContent.html',
                controller: 'ModalInstanceController',
                size: 'sm',
                resolve: {
                    id: function () {
                        return solicitud;
                    }
                }
            });
            modalInstance.result.then(function (solicitud) {
                solicitud.estado = "Aceptada";                
                Solicitud.updateAll({ solicitud: solicitud });
                $scope.message = "La solicitud fue aceptada";
                $scope.findAll();
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };
        
         $scope.rechazar = function (solicitud) {
            var modalInstance = $uibModal.open({
                animation: $scope.animationsEnabled,
                templateUrl: 'myModalContent2.html',
                controller: 'ModalInstanceController',
                size: 'sm',
                resolve: {
                    id: function () {
                        return solicitud;
                    }
                }
            });
            modalInstance.result.then(function (solicitud) {
                solicitud.estado = "Rechazada";                
                Solicitud.updateAll({ solicitud: solicitud });
                $scope.error = "La solicitud fue rechazada";
                $scope.findAll();
            }, function () {
                $log.info('Modal dismissed at: ' + new Date());
            });
        };

        $scope.getUser = function () {
            new User().$getByToken(function (user) {
                $scope.authenticatedUser = user;
            }, function (err) {
                console.log(err);
            });
        }

    }


]);
