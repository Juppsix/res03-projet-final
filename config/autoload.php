<?php  
  
// models  
require "models/Programmation.php";  
require "models/Artist.php"; 
require "models/User.php";
require "models/Media.php";
require "models/RandomStringGenerator.php";
require "models/Uploader.php";
  
// managers  
require "managers/AbstractManager.php";  
require "managers/ProgrammationManager.php";  
require "managers/ArtistManager.php";  
require "managers/UserManager.php";

// controllers  
require "controllers/AbstractController.php";  
require "controllers/ArtistController.php";
require "controllers/ProgrammationController.php";
require "controllers/AuthController.php";
require "controllers/HomeController.php";
// services  
require "services/Router.php";
