angular.module('SolicitudService', []).factory('Solicitud', ['$resource',
  function ($resource) {
    return $resource('/api/solicitud/:solicitudId', {
      solicitudId: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);