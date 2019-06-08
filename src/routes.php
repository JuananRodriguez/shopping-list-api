<?php

// Routes
// Grupo de rutas para el API





$app->group('/api', function () use ($app) {
    // Version group
    $app->group('/v1', function () use ($app) {
        $app->get('/empleados', 'obtenerEmpleados');
        $app->get('/empleado/{id}', 'obtenerEmpleado');
        $app->post('/empleado', 'agregarEmpleado');
        $app->put('/empleado/{id}', 'actualizarEmpleado');
        $app->delete('/empleado/{id}', 'eliminarEmpleado');


        /** Products CRUD
        $app->get('/product', 'obtenerEmpleados');
        $app->get('/product/{id}', 'obtenerEmpleado');
        $app->post('/product', 'agregarEmpleado');
        $app->put('/product/{id}', 'actualizarEmpleado');
        $app->delete('/product/{id}', 'eliminarEmpleado');

        */

        $app->get('/test', 'workingPage');

    });
});

?>
