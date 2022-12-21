<?php

  class Usuario {
  
    private $con;

    public function __construct() {
      $this->con = new mysqli('localhost', 'root' , '', 'subasta');
    }

    // Obtener todos los usuarios
    public function getUsuarios() {

      $selectUsers = $this->con->query("SELECT * FROM usuario");

      while ($row = mysqli_fetch_array($selectUsers)) { $usuarios[] = $row; }

      return $usuarios;
    }

    // Añadir un usuario
    public function addUsuarios($nombre, $ape, $correo, $passw, $inicio) {

      $insertUsers = $this->con->query("INSERT INTO usuario(nomUsu, apeUsu, user, password, fechaUnion, permiso) VALUES (nomUsu=$nombre, apeUsu=$ape, user=$correo, password=$passw, fechaUnion=$inicio, permiso=0)");

      while ($row = mysqli_fetch_array($insertUsers)) { $usuarios[] = $row; }

      return $usuarios;
    }

    // Eliminar un usuario
    public function deleteUsuarios($correo) {
      
      $deleteUsers = $this->con->query("DELETE FROM usuario WHERE user=$correo");

      while ($row = mysqli_fetch_array($deleteUsers)) { $usuarios[] = $row; }

      return $usuarios;
    }

    // Actualizar un usuario
    public function updateUsuarios($nombre, $ape, $correo, $passw) {

      $updateUsers = $this->con->query("UPDATE usuario SET nomUsu=$nombre, apeUsu=$ape, user=$correo, password=$passw WHERE user=$correo AND password=$passw");

      while ($row = mysqli_fetch_array($updateUsers)) { $usuarios[] = $row; }

      return $usuarios;
    }
  }
  
?>