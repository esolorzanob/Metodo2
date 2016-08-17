angular.module('MensajeService', []).factory('Mensaje', ['$resource',
  function ($resource) {
    return $resource('/api/mensaje/:id', {
      id: '@id',
      mensaje: '@mensaje'
    }, {
        update: {
          method: 'PUT'
        },
        updateAll: {
          method: 'POST',
          url: 'api/mensaje/updateAll'
        }
      });
  }
]);