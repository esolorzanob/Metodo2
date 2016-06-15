angular.module('UserController', []).controller('UserController', ['$scope', 'User', '$localStorage', '$location', '$uibModal', '$timeout',
  function ($scope, User, $localStorage, $location, $uibModal, $timeout) {
    //caracteres para crear password temporal
    var chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //Tamaño de password temporal
    var length = '8';
    //Variable global de usuario
    $scope.usuario = {};
    //Funcion para loguear usuario
    $scope.login = function () {
      var user = new User($scope.usuario);
      user.$login(function (user) {
        $localStorage.token = user.token;
        $scope.getAuthenticatedUser(user);
        $location.path('users/view/' + user.id);
      }, function (err) {
        console.log(err.data.description);
        $scope.error = "Usuario y/o contraseña incorrectos";
      });
    };
    //Funcion para crear un nuevo usuario - cualquier rol
    $scope.createNew = function () {
      if ($scope.usuario.password != $scope.usuario.passwordConfirmation) {
        $scope.error = "Las contraseñas no coinciden";
      } else if (!$scope.usuario.password.match(/[A-Z]/) || $scope.usuario.password.length < 8 || !$scope.usuario.password.match(/[\d]/)) {
        $scope.error = "La contraseña no cumple con los requerimientos mínimos";
      } else {
        var user = new User($scope.usuario);
        user.$save(function (user) {
          $localStorage.token = user.token;
          $scope.getAuthenticatedUser(user);
          $location.path('users/view/' + user.id);
        }, function (err) {
          console.log(err);
        });
      }
    };

    //Funcion para crear un nuevo usuario - Admin
    $scope.create = function () {

      if ($scope.usuario.password != $scope.usuario.passwordConfirmation) {
        $scope.error = "Las contraseñas no coinciden";
      } else if (!$scope.usuario.password.match(/[A-Z]/) || $scope.usuario.password.length < 8 || !$scope.usuario.password.match(/[\d]/)) {
        $scope.error = "La contraseña no cumple con los requerimientos mínimos";
      } else {
        var user = new User($scope.usuario);
        user.$save(function (user) {
          $scope.message = "El usuario se creó con éxito."
        }, function (err) {
          console.log(err);
        });
      }
    };

    //Funcion para buscar un solo usuario por id
    $scope.findOne = function () {
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.usuario = User.get({ userId: userId }, function (user) {
        if (user.change_password == "Yes") {
          $location.path('users/changePassword/' + user.id);
        }
      });
    };

    $scope.findWithAuthenticate = function () {
      $scope.getUser();
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.usuario = User.get({ userId: userId }, function (user) {
        if ($scope.authenticatedUser.rol != "Admin" && $scope.authenticatedUser.id != user.id){
          $scope.show = false;
          $scope.message = "No esta autorizado para ver esta información."
         
        }else{
          $scope.show = true;
        }
      
      });
    }

    //Funcion para traer todos los usuarios
    $scope.findAll = function () {
      $scope.getUser();
      var splitPath = $location.path().split('/');
      var userId = splitPath[splitPath.length - 1];
      $scope.usuario = User.get({ userId: userId }, function (user) {
        if ($scope.authenticatedUser.rol != "Admin"){
          $scope.show = false;
          $scope.message = "No esta autorizado para ver esta información."
         
        }else{
          $scope.show = true;
           $scope.users = User.query();
        }
      
      });
     

    };

    //Funcion para editar usuario
    $scope.edit = function () {
      User.updateAll({ usuario: $scope.usuario }, function (response) {
        $scope.error = response.message;
        /*
        $timeout(function () {
          $location.path('users/list');
        }, 2000);
        */
      });
    }

    //Funcion para abrir modal de confirmacion para borrar usuario
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
        User.delete({ userId: id });
        $scope.message = "El usuario fue borrado con éxito";
        $scope.findAll();
      }, function () {
        $log.info('Modal dismissed at: ' + new Date());
      });
    };

    //Funcion para mandar password temporal
    $scope.sendPassword = function () {
      $scope.user = User.getByEmail({ email: $scope.usuario.email }, function (user) {
        console.log(user[0]);
        var randomPass = randomString(length, chars);
        User.resetPassword({ userId: user[0].id, password: randomPass }, function (response) {
          $scope.message = response.message;
        });
      });
    };

    //Funcion para crear password temporal
    function randomString(length, chars) {
      var result = '';
      for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
      return result;
    }


    //Funcion para cambiar contraseña
    $scope.changePassword = function changePassword() {
      if (this.password == this.passwordConfirm) {
        if (!$scope.usuario.password.match(/[A-Z]/) || $scope.usuario.password.length < 8 || !$scope.usuario.password.match(/[\d]/)) {
          $scope.message = "La contraseña no cumple con los requerimientos mínimos";
        } else {
          var splitPath = $location.path().split('/');
          var userId = splitPath[splitPath.length - 1];
          User.changePassword({ userId: userId, password: $scope.usuario.password }, function (response) {
            if (response.message.match("error")) {
              $scope.message = response.message;
            } else {
              $scope.message = response.message;
              $timeout(function () {
                $location.path('users/view/' + userId);
              }, 2000);
            }
          });
        }
      } else {
        $scope.message = "Sus contraseñas no coinciden.";
      }
    }

    $scope.getUser = function () {
      new User().$getByToken(function (user) {
        $scope.authenticatedUser = user;
      }, function (err) {
        console.log(err);
      });
    }

  }
]);
