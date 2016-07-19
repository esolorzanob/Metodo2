angular.module('SolicitudService', []).factory('Solicitud', ['$resource',
  function ($resource) {
    return $resource('/api/solicitud/:id', {
      id: '@id',
      solicitud: '@solicitud'
    }, {
        update: {
          method: 'PUT'
        },
        updateAll: {
          method: 'POST',
          url: 'api/solicitud/updateAll'
        }
      });
  }
]);