<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

function obtenerEmpleados($response) {
    $sql = "SELECT * FROM empleados";
    try {
        $stmt = getConnection()->query($sql);
        $employees = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        
        return json_encode($employees);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
};

function obtenerEmpleado(Request $request, Response $response, array $args) {
    $sql = "SELECT * FROM empleados WHERE id = :id";
    $id = $request->getAttribute('id');

    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $db = null;
        return json_encode($stmt->fetchObject());
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
};

function agregarEmpleado(Request $request, Response $response, array $args) {
    $emp = json_decode($request->getBody());
    $sql = "INSERT INTO empleados (nombre, salario, edad) VALUES (:nombre, :salario, :edad)";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombre", $emp->nombre);
        $stmt->bindParam("salario", $emp->salario);
        $stmt->bindParam("edad", $emp->edad);
        $stmt->execute();
        $emp->id = $db->lastInsertId();
        $db = null;
        echo json_encode($emp);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
};

function actualizarEmpleado(Request $request, Response $response, array $args) {
    $emp = json_decode($request->getBody());
    $id = $request->getAttribute('id');
    $sql = "UPDATE empleados SET nombre=:nombre, salario=:salario, edad=:edad WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("nombre", $emp->nombre);
        $stmt->bindParam("salario", $emp->salario);
        $stmt->bindParam("edad", $emp->edad);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $db = null;
        echo json_encode($emp);
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function eliminarEmpleado(Request $request, Response $response, array $args) {
    $id = $request->getAttribute('id');
    $sql = "DELETE FROM empleados WHERE id=:id";
    try {
        $db = getConnection();
        $stmt = $db->prepare($sql);
        $stmt->bindParam("id", $id);
        $stmt->execute();
        $db = null;
        echo '{"error":{"text":"se elimino el empleado"}}';
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

 ?>
