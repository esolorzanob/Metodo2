angular.module('RecursoController', []).controller('RecursoController', ['$scope', '$location', '$routeParams', 'Recurso', 'User', '$uibModal', '$timeout',
  function ($scope, $location, $routeParams, Recurso, User, $uibModal, $timeout) {
    $scope.create = function () {
      var recurso = new Recurso($scope.recurso);
      recurso.$save(function (res) {
        //  $location.path('recursos/view/' + res.id);
        $scope.message = "El recurso se ha creado con éxito";
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
          $scope.recursos = Recurso.query();
        }

      });


    };
    

    $scope.remove = function (recurso) {
      recurso.$remove(function (res) {
        if (res) {
          for (var i in $scope.recursos) {
            if ($scope.recursos[i] === recurso) {
              $scope.recursos.splice(i, 1);
            }
          }
        }
      }, function (err) {
        console.log(err);
      })
    };

    $scope.update = function (recurso) {
      recurso.$update(function (res) {
      }, function (err) {
        console.log(err);
      });
    };

    $scope.edit = function () {
      Recurso.updateAll({ recurso: $scope.recurso }, function (response) {
        if (response.message.match(/error/i)){
          $scope.error = response.message;
        }else{
          $scope.message = response.message;
        }
        
        $timeout(function () {
          $location.path('recurso/list/');
        }, 2000);

      });
    }

    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var id = splitPath[splitPath.length - 1];
      $scope.recurso = Recurso.get({ id: id });
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
        Recurso.delete({ idRecurso: id });
        $scope.message = "El recurso fue borrado con éxito";
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
