angular.module('SolicitudController', []).controller('SolicitudController', ['$scope', '$location', '$routeParams', 'Solicitud', 'User', '$uibModal', '$timeout', 'Aula', 'Recurso',
    function ($scope, $location, $routeParams, Solicitud, User, $uibModal, $timeout, Aula, Recurso) {
        $scope.showReport = false;
        $scope.showReportDia = false;
        $scope.solicitudes = [];
        $scope.guardadas = [];
        $scope.meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Setiembre", "Octubre", "Noviembre", "Diciembre"];
        var mesActual = new Date();
        mesActual = mesActual.getMonth();
        $scope.mesActual = $scope.meses[parseInt(mesActual)];

        $scope.create = function () {
            for (var i = 0; i < $scope.solicitudes.length; i++) {
                var solicitud = new Solicitud($scope.solicitudes[i]);
                solicitud.$save(function (res) {
                    //  $location.path('solicituds/view/' + res.id);
                    $scope.message = "La solicitud se ha creado con éxito";
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
                if (user.rol != "Admin") {
                    $scope.temporal = Solicitud.query({}, function (tempArray) {
                        for (var i = 0; i < tempArray.length; i++) {
                            console.log(tempArray[i]);
                            if (tempArray[i].solicitante == user.nombre) {
                                $scope.guardadas.push(tempArray[i]);
                            }
                        }
                        $scope.show = true;
                    });

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

            for (var i = 0; i < $scope.recursos.length; i++) {
                if ($scope.recursos[i].estado == "Disponible") {
                    if ($scope.solicitud.aula.aireAcondicionado == "Sí" && $scope.recursos[i].tipo == "Aire Acondicionado") {
                        $scope.disponibles.push($scope.recursos[i]);
                    }
                    if ($scope.solicitud.aula.computadora == "Sí" && $scope.recursos[i].tipo == "Periféricos") {
                        $scope.disponibles.push($scope.recursos[i]);
                    }
                    if ($scope.solicitud.aula.proyector == "Sí" && $scope.recursos[i].tipo == "Video Beam") {
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
            solicitud.estado = "Aceptada";
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
            $scope.solicitud = Solicitud.get({ id: id }, function (solicitud) {
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


        $scope.reporteInicial = function () {
            $scope.numeroTotal = 0;
            var lunes = 0;
            var martes = 0
            var miercoles = 0;
            var jueves = 0
            var viernes = 0;
            var sabado = 0
            var aire = 0;
            var proyector = 0;
            var periferico = 0;
            var mesActual = new Date();
            mesActual = mesActual.getMonth();

            for (var i = 0; i < $scope.guardadas.length; i++) {
                var fecha = new Date($scope.guardadas[i].fecha_inicio);
                var mes = fecha.getMonth();
                if (mes = mesActual) {
                    $scope.numeroTotal++;
                }


                var dia = fecha.getDay();
                if (dia == 1) {
                    lunes++;
                }
                if (dia == 2) {
                    martes++;
                }
                if (dia == 3) {
                    miercoles++;
                }
                if (dia == 4) {
                    jueves++;
                }
                if (dia == 5) {
                    viernes++;
                }
                if (dia == 6) {
                    sabado++;
                }


                var tipo = $scope.guardadas[i].recurso;
                if (tipo.match(/aire/)) {
                    aire++;
                } else if (tipo.match(/proyector/)) {
                    proyector++;
                } else {
                    periferico++;
                }

            }
            var mayor = Math.max(lunes, martes, miercoles, jueves, viernes, sabado);

            if (lunes == mayor) {
                $scope.mayorSolicitud = "Lunes";
            }

            if (martes == mayor) {
                $scope.mayorSolicitud = "Martes";
            }
            if (miercoles == mayor) {
                $scope.mayorSolicitud = "Miércoles";
            }
            if (jueves == mayor) {
                $scope.mayorSolicitud = "Jueves";
            }
            if (viernes == mayor) {
                $scope.mayorSolicitud = "Viernes";
            }
            if (sabado == mayor) {
                $scope.mayorSolicitud = "Sábado";
            }

            var menor = Math.min(lunes, martes, miercoles, jueves, viernes, sabado);

            if (lunes == menor) {
                $scope.menorSolicitud = "Lunes";
            }

            if (martes == menor) {
                $scope.menorSolicitud = "Martes";
            }
            if (miercoles == menor) {
                $scope.menorSolicitud = "Miércoles";
            }
            if (jueves == menor) {
                $scope.menorSolicitud = "Jueves";
            }
            if (viernes == menor) {
                $scope.menorSolicitud = "Viernes";
            }
            if (sabado == menor) {
                $scope.menorSolicitud = "Sábado";
            }

            var tipoMenor = Math.min(aire, proyector, periferico);
            var tipoMayor = Math.max(aire, periferico, proyector);
            if (aire == tipoMayor) {
                $scope.tipoMayor = "Aire Acondicionado";
            }
            if (proyector == tipoMayor) {
                $scope.tipoMayor = "Video Beam";
            }
            if (periferico == tipoMayor) {
                $scope.tipoMayor = "Periférico";
            }

            if (aire == tipoMenor) {
                $scope.tipoMenor = "Aire Acondicionado";
            }
            if (proyector == tipoMenor) {
                $scope.tipoMenor = "Video Beam";
            }
            if (periferico == tipoMenor) {
                $scope.tipoMenor = "Periférico";
            }

            $scope.showReport = true;


        }

        $scope.reportePorSemana = function (dia) {
            if (dia == 1) {
                $scope.diaActual = "Lunes";
            }
            if (dia == 2) {
                $scope.diaActual = "Martes";
            }
            if (dia == 3) {
                $scope.diaActual = "Miércoles";
            }
            if (dia == 4) {
                $scope.diaActual = "Jueves";
            }
            if (dia == 5) {
                $scope.diaActual = "Viernes";
            }
            if (dia == 6) {
                $scope.diaActual = "Sábado";
            }
            $scope.showReport = false;
            var porDia = [];
            for (var i = 0; i < $scope.guardadas.length; i++) {
                var fecha = new Date($scope.guardadas[i].fecha_inicio);
                var day = fecha.getDay();
                if (day == dia) {
                    porDia.push($scope.guardadas[i]);
                }
            }

            $scope.numeroTotal = porDia.length;

            var aire = 0;
            var proyector = 0;
            var periferico = 0;

            for (var i = 0; i < porDia.length; i++) {

                var tipo = porDia[i].recurso;
                if (tipo.match(/aire/)) {
                    aire++;
                } else if (tipo.match(/proyector/)) {
                    proyector++;
                } else {
                    periferico++;
                }

            }

            var tipoMenor = Math.min(aire, proyector, periferico);
            var tipoMayor = Math.max(aire, periferico, proyector);
            if (aire == tipoMayor) {
                $scope.tipoMayor = "Aire Acondicionado";
            }
            if (proyector == tipoMayor) {
                $scope.tipoMayor = "Video Beam";
            }
            if (periferico == tipoMayor) {
                $scope.tipoMayor = "Periférico";
            }

            if (aire == tipoMenor) {
                $scope.tipoMenor = "Aire Acondicionado";
            }
            if (proyector == tipoMenor) {
                $scope.tipoMenor = "Video Beam";
            }
            if (periferico == tipoMenor) {
                $scope.tipoMenor = "Periférico";
            }

            $scope.porcentajeAire = (aire / porDia.length * 100).toFixed(2) + "%";
            $scope.porcentajeVideo = (proyector / porDia.length * 100).toFixed(2) + "%";
            $scope.porcentajePeri = (periferico / porDia.length * 100).toFixed(2) + "%";


            $scope.showReportDia = true;


        }

        $scope.imprimirReporte = function () {
            html2canvas(document.getElementById('reporte'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500,
                        }]
                    };
                    var newDate = new Date();
                    var nombreReporte = newDate.getDate() + "/" + (newDate.getMonth() + 1) + "/" + newDate.getFullYear();

                    pdfMake.createPdf(docDefinition).download(nombreReporte + " reporte.pdf");
                }
            });


        }

    }


]);
