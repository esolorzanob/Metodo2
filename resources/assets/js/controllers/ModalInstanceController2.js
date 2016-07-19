angular.module('ModalInstanceController2',[]).controller('ModalInstanceController2',  function ($scope, $uibModalInstance, solicitud) {
  
  $scope.solicitud = solicitud;   

  $scope.ok = function () {   
    $uibModalInstance.close(solicitud);
  };

  $scope.cancel = function () {
    $uibModalInstance.dismiss('cancel');
  };
});
