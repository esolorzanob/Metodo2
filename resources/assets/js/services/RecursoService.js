angular.module('RecursoService', []).factory('Recurso', ['$resource',
  function ($resource) {
    return $resource('/api/recurso/:idRecurso', {
      idRecurso: '@id'
    }, {
      update: {
        method: 'PUT'
      }
    });
  }
]);