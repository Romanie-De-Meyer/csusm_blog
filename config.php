<?php
session_start();
// connect to database
$conn = mysqli_connect("localhost", "team_2", "8xkm98eb", "team_2");

if (!$conn) {
  die("Error connecting to database: " . mysqli_connect_error());
}
// define global constants
define('ROOT_PATH', realpath(dirname(__FILE__)));
define('BASE_URL', 'https://cis444.cs.csusm.edu/team_2/csusm_blog/');
