<?php
$conexao = mysqli_connect('localhost', 'root', '', 'fenix');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
