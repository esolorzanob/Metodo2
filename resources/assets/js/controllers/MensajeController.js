angular.module('MensajeController', []).controller('MensajeController', ['$scope', '$location', '$routeParams', 'Mensaje', 'User', '$uibModal', '$timeout',
  function ($scope, $location, $routeParams, Mensaje, User, $uibModal, $timeout) {
      
    $scope.create = function () {
      $scope.mensaje.idUsuario = $scope.authenticatedUser.id;
      $scope.mensaje.usuario = $scope.authenticatedUser.nombre + " " + $scope.authenticatedUser.apellido1 + " " + $scope.authenticatedUser.apellido2;
      $scope.mensaje.estado = "Nuevo"; 
      var mensaje = new Mensaje($scope.mensaje);
      mensaje.$save(function (res) {
        //  $location.path('mensajes/view/' + res.id);
        $scope.message = "El mensaje se ha enviado con éxito";
      }, function (err) {
        console.log(err);
      });
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
          $scope.mensajes = Mensaje.query();
        }

      });


    };
    

    $scope.remove = function (mensaje) {
      mensaje.$remove(function (res) {
        if (res) {
          for (var i in $scope.mensajes) {
            if ($scope.mensajes[i] === mensaje) {
              $scope.mensajes.splice(i, 1);
            }
          }
        }
      }, function (err) {
        console.log(err);
      })
    };

    $scope.update = function (mensaje) {
      mensaje.$update(function (res) {
      }, function (err) {
        console.log(err);
      });
    };

    $scope.updateAll = function () {
      Mensaje.updateAll({ mensaje: $scope.mensaje }, function (response) {
          console.log(response);
        if (response.message.match(/error/i)){
          $scope.error = response.message;
        }else{
          $scope.message = response.message;
        }
        
        $timeout(function () {
          $location.path('mensaje/list/');
        }, 2000);

      });
    }

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var id = splitPath[splitPath.length - 1];
      $scope.mensaje = Mensaje.get({ id: id });
    };

    $scope.open = function (id) {
      var modalInstance = $uibModal.open({
        animation: $scope.animationsEnabled,
        templateUrl: 'myModalContent.html',
        controller: 'ModalInstanceController',
        size: 'sm',
        resolve: {
          id: function () {
            return id;
          }
        }
      });
      modalInstance.result.then(function (id) {
        console.log(id);
        Mensaje.delete({ idMensaje: id });
        $scope.message = "El mensaje fue borrado con éxito";
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
