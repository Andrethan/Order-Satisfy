<?php
ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $surname = $password = $confirm_password = "";
$name_err = $surname_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
  if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a name.";
	} if(empty(trim($_POST["Sur"]))){
		    $surname_err = "Please enter a surname.";
    } elseif(!preg_match('/^[а-яА-Яa-zA-Z0-9_]+$/u', trim($_POST["name"]))){
        $name_err = "Name can only contain letters, numbers, and underscores.";
	} elseif(!preg_match('/^[а-яА-Яa-zA-Z0-9_]+$/u', trim($_POST["Sur"]))){
		$surname_err = "Surname can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE name = ? AND surname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_surname);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
			      $param_surname = trim($_POST["Sur"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
				          	$surname_err = "This surname is already taken.";
                } else{
                    $name = trim($_POST["name"]);
					          $surname = trim($_POST["Sur"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    //Validate Email
    /*if (empty(trim($_POST["email"]))) {
      $emailErr = "Email is required";
    } else {
      $email = trim($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }*/

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, surname, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_surname, $param_password);
            
            // Set parameters
            $param_name = $name;
			      $param_surname = $surname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/4.0/examples/sign-in/ -->
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html" charset="utf-8"></head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Регистрация специалиста</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="index.css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="index.css/signin.css" rel="stylesheet">
  <style type="text/css">/* Themes */
.theme--light.v-card {
  background-color: #fff;
  border-color: #fff;
  color: rgba(0,0,0,0.87);
}
.theme--dark.v-card {
  background-color: #424242;
  border-color: #424242;
  color: #fff;
}
.v-card {
  box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2), 0px 2px 2px 0px rgba(0,0,0,0.14), 0px 1px 5px 0px rgba(0,0,0,0.12);
  text-decoration: none;
}
.v-card > *:first-child:not(.v-btn):not(.v-chip) {
  border-top-left-radius: inherit;
  border-top-right-radius: inherit;
}
.v-card > *:last-child:not(.v-btn):not(.v-chip) {
  border-bottom-left-radius: inherit;
  border-bottom-right-radius: inherit;
}
.v-card--flat {
  box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.2), 0px 0px 0px 0px rgba(0,0,0,0.14), 0px 0px 0px 0px rgba(0,0,0,0.12);
}
.v-card--hover {
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
  transition-property: box-shadow;
}
.v-card--hover:hover {
  box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12);
}
.v-card__title {
  align-items: center;
  display: flex;
  flex-wrap: wrap;
  padding: 16px;
}
.v-card__title--primary {
  padding-top: 24px;
}
.v-card__text {
  padding: 16px;
  width: 100%;
}
.v-card__actions {
  align-items: center;
  display: flex;
  padding: 8px;
}
.v-card__actions > *,
.v-card__actions .v-btn {
  margin: 0;
}
.v-card__actions .v-btn + .v-btn {
  margin-left: 8px;
}
</style><style type="text/css">/* Themes */
.theme--light.v-sheet {
  background-color: #fff;
  border-color: #fff;
  color: rgba(0,0,0,0.87);
}
.theme--dark.v-sheet {
  background-color: #424242;
  border-color: #424242;
  color: #fff;
}
.v-sheet {
  display: block;
  border-radius: 2px;
  position: relative;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-sheet--tile {
  border-radius: 0;
}
</style><style type="text/css">.v-autocomplete.v-input > .v-input__control > .v-input__slot {
  cursor: text;
}
.v-autocomplete input {
  align-self: center;
}
.v-autocomplete--is-selecting-index input {
  opacity: 0;
}
.v-autocomplete.v-text-field--enclosed:not(.v-text-field--solo):not(.v-text-field--single-line) .v-select__slot > input {
  margin-top: 24px;
}
.v-autocomplete:not(.v-input--is-disabled).v-select.v-text-field input {
  pointer-events: inherit;
}
.v-autocomplete__content.v-menu__content {
  border-radius: 0;
}
.v-autocomplete__content.v-menu__content .v-card {
  border-radius: 0;
}
</style><style type="text/css">.theme--light.v-text-field > .v-input__control > .v-input__slot:before {
  border-color: rgba(0,0,0,0.42);
}
.theme--light.v-text-field:not(.v-input--has-state) > .v-input__control > .v-input__slot:hover:before {
  border-color: rgba(0,0,0,0.87);
}
.theme--light.v-text-field.v-input--is-disabled > .v-input__control > .v-input__slot:before {
  border-image: repeating-linear-gradient(to right, rgba(0,0,0,0.38) 0px, rgba(0,0,0,0.38) 2px, transparent 2px, transparent 4px) 1 repeat;
}
.theme--light.v-text-field.v-input--is-disabled > .v-input__control > .v-input__slot:before .v-text-field__prefix,
.theme--light.v-text-field.v-input--is-disabled > .v-input__control > .v-input__slot:before .v-text-field__suffix {
  color: rgba(0,0,0,0.38);
}
.theme--light.v-text-field__prefix,
.theme--light.v-text-field__suffix {
  color: rgba(0,0,0,0.54);
}
.theme--light.v-text-field--solo > .v-input__control > .v-input__slot {
  border-radius: 2px;
  background: #fff;
}
.theme--light.v-text-field--solo-inverted.v-text-field--solo > .v-input__control > .v-input__slot {
  background: rgba(0,0,0,0.16);
}
.theme--light.v-text-field--solo-inverted.v-text-field--solo.v-input--is-focused > .v-input__control > .v-input__slot {
  background: #424242;
}
.theme--light.v-text-field--solo-inverted.v-text-field--solo.v-input--is-focused > .v-input__control > .v-input__slot .v-label,
.theme--light.v-text-field--solo-inverted.v-text-field--solo.v-input--is-focused > .v-input__control > .v-input__slot input {
  color: #fff;
}
.theme--light.v-text-field--box > .v-input__control > .v-input__slot {
  background: rgba(0,0,0,0.06);
}
.theme--light.v-text-field--box .v-text-field__prefix {
  max-height: 32px;
  margin-top: 22px;
}
.theme--light.v-text-field--box.v-input--is-dirty .v-text-field__prefix,
.theme--light.v-text-field--box.v-input--is-focused .v-text-field__prefix,
.theme--light.v-text-field--box.v-text-field--placeholder .v-text-field__prefix {
  margin-top: 22px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.theme--light.v-text-field--box:not(.v-input--is-focused) > .v-input__control > .v-input__slot:hover {
  background: rgba(0,0,0,0.12);
}
.theme--light.v-text-field--outline > .v-input__control > .v-input__slot {
  border: 2px solid rgba(0,0,0,0.54);
}
.theme--light.v-text-field--outline:not(.v-input--is-focused):not(.v-input--has-state) > .v-input__control > .v-input__slot:hover {
  border: 2px solid rgba(0,0,0,0.87);
}
.theme--dark.v-text-field > .v-input__control > .v-input__slot:before {
  border-color: rgba(255,255,255,0.7);
}
.theme--dark.v-text-field:not(.v-input--has-state) > .v-input__control > .v-input__slot:hover:before {
  border-color: #fff;
}
.theme--dark.v-text-field.v-input--is-disabled > .v-input__control > .v-input__slot:before {
  border-image: repeating-linear-gradient(to right, rgba(255,255,255,0.5) 0px, rgba(255,255,255,0.5) 2px, transparent 2px, transparent 4px) 1 repeat;
}
.theme--dark.v-text-field.v-input--is-disabled > .v-input__control > .v-input__slot:before .v-text-field__prefix,
.theme--dark.v-text-field.v-input--is-disabled > .v-input__control > .v-input__slot:before .v-text-field__suffix {
  color: rgba(255,255,255,0.5);
}
.theme--dark.v-text-field__prefix,
.theme--dark.v-text-field__suffix {
  color: rgba(255,255,255,0.7);
}
.theme--dark.v-text-field--solo > .v-input__control > .v-input__slot {
  border-radius: 2px;
  background: #424242;
}
.theme--dark.v-text-field--solo-inverted.v-text-field--solo > .v-input__control > .v-input__slot {
  background: rgba(255,255,255,0.16);
}
.theme--dark.v-text-field--solo-inverted.v-text-field--solo.v-input--is-focused > .v-input__control > .v-input__slot {
  background: #fff;
}
.theme--dark.v-text-field--solo-inverted.v-text-field--solo.v-input--is-focused > .v-input__control > .v-input__slot .v-label,
.theme--dark.v-text-field--solo-inverted.v-text-field--solo.v-input--is-focused > .v-input__control > .v-input__slot input {
  color: rgba(0,0,0,0.87);
}
.theme--dark.v-text-field--box > .v-input__control > .v-input__slot {
  background: rgba(0,0,0,0.1);
}
.theme--dark.v-text-field--box .v-text-field__prefix {
  max-height: 32px;
  margin-top: 22px;
}
.theme--dark.v-text-field--box.v-input--is-dirty .v-text-field__prefix,
.theme--dark.v-text-field--box.v-input--is-focused .v-text-field__prefix,
.theme--dark.v-text-field--box.v-text-field--placeholder .v-text-field__prefix {
  margin-top: 22px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.theme--dark.v-text-field--box:not(.v-input--is-focused) > .v-input__control > .v-input__slot:hover {
  background: rgba(0,0,0,0.2);
}
.theme--dark.v-text-field--outline > .v-input__control > .v-input__slot {
  border: 2px solid rgba(255,255,255,0.7);
}
.theme--dark.v-text-field--outline:not(.v-input--is-focused):not(.v-input--has-state) > .v-input__control > .v-input__slot:hover {
  border: 2px solid #fff;
}
.application--is-rtl .v-text-field .v-label {
  transform-origin: top right;
}
.application--is-rtl .v-text-field .v-counter {
  margin-left: 0;
  margin-right: 8px;
}
.application--is-rtl .v-text-field--enclosed .v-input__append-outer {
  margin-left: 0;
  margin-right: 16px;
}
.application--is-rtl .v-text-field--enclosed .v-input__prepend-outer {
  margin-left: 16px;
  margin-right: 0;
}
.application--is-rtl .v-text-field--reverse input {
  text-align: left;
}
.application--is-rtl .v-text-field--reverse .v-label {
  transform-origin: top left;
}
.application--is-rtl .v-text-field__prefix {
  text-align: left;
  padding-right: 0;
  padding-left: 4px;
}
.application--is-rtl .v-text-field__suffix {
  padding-left: 0;
  padding-right: 4px;
}
.application--is-rtl .v-text-field--reverse .v-text-field__prefix {
  text-align: right;
  padding-left: 0;
  padding-right: 4px;
}
.application--is-rtl .v-text-field--reverse .v-text-field__suffix {
  padding-left: 0;
  padding-right: 4px;
}
.v-text-field {
  padding-top: 12px;
  margin-top: 4px;
}
.v-text-field input {
  flex: 1 1 auto;
  line-height: 20px;
  padding: 8px 0 8px;
  max-width: 100%;
  min-width: 0px;
  width: 100%;
}
.v-text-field .v-input__prepend-inner,
.v-text-field .v-input__append-inner {
  align-self: flex-start;
  display: inline-flex;
  margin-top: 4px;
  line-height: 1;
  user-select: none;
}
.v-text-field .v-input__prepend-inner {
  margin-right: auto;
  padding-right: 4px;
}
.v-text-field .v-input__append-inner {
  margin-left: auto;
  padding-left: 4px;
}
.v-text-field .v-counter {
  margin-left: 8px;
  white-space: nowrap;
}
.v-text-field .v-label {
  max-width: 90%;
  overflow: hidden;
  text-overflow: ellipsis;
  top: 6px;
  transform-origin: top left;
  white-space: nowrap;
  pointer-events: none;
}
.v-text-field .v-label--active {
  max-width: 133%;
  transform: translateY(-18px) scale(0.75);
}
.v-text-field > .v-input__control > .v-input__slot {
  cursor: text;
  transition: background 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-text-field > .v-input__control > .v-input__slot:before,
.v-text-field > .v-input__control > .v-input__slot:after {
  bottom: -1px;
  content: '';
  left: 0;
  position: absolute;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  width: 100%;
}
.v-text-field > .v-input__control > .v-input__slot:before {
  border-style: solid;
  border-width: thin 0 0 0;
}
.v-text-field > .v-input__control > .v-input__slot:after {
  border-color: currentColor;
  border-style: solid;
  border-width: thin 0 thin 0;
  transform: scaleX(0);
}
.v-text-field__details {
  display: flex;
  flex: 1 0 auto;
  max-width: 100%;
  overflow: hidden;
}
.v-text-field__prefix,
.v-text-field__suffix {
  align-self: center;
  cursor: default;
}
.v-text-field__prefix {
  text-align: right;
  padding-right: 4px;
}
.v-text-field__suffix {
  padding-left: 4px;
  white-space: nowrap;
}
.v-text-field--reverse .v-text-field__prefix {
  text-align: left;
  padding-right: 0;
  padding-left: 4px;
}
.v-text-field--reverse .v-text-field__suffix {
  padding-left: 0;
  padding-right: 4px;
}
.v-text-field > .v-input__control > .v-input__slot > .v-text-field__slot {
  display: flex;
  flex: 1 1 auto;
  position: relative;
}
.v-text-field--box,
.v-text-field--full-width,
.v-text-field--outline {
  position: relative;
}
.v-text-field--box > .v-input__control > .v-input__slot,
.v-text-field--full-width > .v-input__control > .v-input__slot,
.v-text-field--outline > .v-input__control > .v-input__slot {
  align-items: stretch;
  min-height: 56px;
}
.v-text-field--box input,
.v-text-field--full-width input,
.v-text-field--outline input {
  margin-top: 22px;
}
.v-text-field--box.v-text-field--single-line input,
.v-text-field--full-width.v-text-field--single-line input,
.v-text-field--outline.v-text-field--single-line input {
  margin-top: 12px;
}
.v-text-field--box .v-label,
.v-text-field--full-width .v-label,
.v-text-field--outline .v-label {
  top: 18px;
}
.v-text-field--box .v-label--active,
.v-text-field--full-width .v-label--active,
.v-text-field--outline .v-label--active {
  transform: translateY(-6px) scale(0.75);
}
.v-text-field--box > .v-input__control > .v-input__slot {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
.v-text-field--box > .v-input__control > .v-input__slot:before {
  border-style: solid;
  border-width: thin 0 thin 0;
}
.v-text-field.v-text-field--enclosed {
  margin: 0;
  padding: 0;
}
.v-text-field.v-text-field--enclosed:not(.v-text-field--box) .v-progress-linear__background {
  display: none;
}
.v-text-field.v-text-field--enclosed .v-input__prepend-outer,
.v-text-field.v-text-field--enclosed .v-input__prepend-inner,
.v-text-field.v-text-field--enclosed .v-input__append-inner,
.v-text-field.v-text-field--enclosed .v-input__append-outer {
  margin-top: 16px;
}
.v-text-field.v-text-field--enclosed .v-text-field__details,
.v-text-field.v-text-field--enclosed > .v-input__control > .v-input__slot {
  padding: 0 12px;
}
.v-text-field.v-text-field--enclosed .v-text-field__details {
  margin-bottom: 8px;
}
.v-text-field--reverse input {
  text-align: right;
}
.v-text-field--reverse .v-label {
  transform-origin: top right;
}
.v-text-field--reverse > .v-input__control > .v-input__slot,
.v-text-field--reverse .v-text-field__slot {
  flex-direction: row-reverse;
}
.v-text-field--solo > .v-input__control > .v-input__slot:before,
.v-text-field--outline > .v-input__control > .v-input__slot:before,
.v-text-field--full-width > .v-input__control > .v-input__slot:before,
.v-text-field--solo > .v-input__control > .v-input__slot:after,
.v-text-field--outline > .v-input__control > .v-input__slot:after,
.v-text-field--full-width > .v-input__control > .v-input__slot:after {
  display: none;
}
.v-text-field--outline {
  margin-bottom: 16px;
  transition: border 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-text-field--outline > .v-input__control > .v-input__slot {
  background: transparent !important;
  border-radius: 4px;
}
.v-text-field--outline .v-text-field__prefix {
  margin-top: 22px;
  max-height: 32px;
}
.v-text-field--outline .v-input__prepend-outer,
.v-text-field--outline .v-input__append-outer {
  margin-top: 18px;
}
.v-text-field--outline.v-input--is-dirty .v-text-field__prefix,
.v-text-field--outline.v-input--is-focused .v-text-field__prefix,
.v-text-field--outline.v-text-field--placeholder .v-text-field__prefix {
  margin-top: 22px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-text-field--outline.v-input--is-focused > .v-input__control > .v-input__slot,
.v-text-field--outline.v-input--has-state > .v-input__control > .v-input__slot {
  border: 2px solid currentColor;
  transition: border 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-text-field.v-text-field--solo .v-label {
  top: calc(50% - 10px);
}
.v-text-field.v-text-field--solo .v-input__control {
  min-height: 48px;
  padding: 0;
}
.v-text-field.v-text-field--solo:not(.v-text-field--solo-flat) > .v-input__control > .v-input__slot {
  box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2), 0px 2px 2px 0px rgba(0,0,0,0.14), 0px 1px 5px 0px rgba(0,0,0,0.12);
}
.v-text-field.v-text-field--solo .v-text-field__slot {
  align-items: center;
}
.v-text-field.v-text-field--solo .v-input__append-inner,
.v-text-field.v-text-field--solo .v-input__prepend-inner {
  align-self: center;
  margin-top: 0;
}
.v-text-field.v-text-field--solo .v-input__prepend-outer,
.v-text-field.v-text-field--solo .v-input__append-outer {
  margin-top: 12px;
}
.v-text-field.v-input--is-focused > .v-input__control > .v-input__slot:after {
  transform: scaleX(1);
}
.v-text-field.v-input--has-state > .v-input__control > .v-input__slot:before {
  border-color: currentColor;
}
</style><style type="text/css">.theme--light.v-select .v-select__selections {
  color: rgba(0,0,0,0.87);
}
.theme--light.v-select.v-input--is-disabled .v-select__selections {
  color: rgba(0,0,0,0.38);
}
.theme--light.v-select .v-chip--disabled,
.theme--light.v-select .v-select__selection--disabled {
  color: rgba(0,0,0,0.38);
}
.theme--light.v-select.v-text-field--solo-inverted.v-input--is-focused .v-select__selections {
  color: #fff;
}
.theme--dark.v-select .v-select__selections {
  color: #fff;
}
.theme--dark.v-select.v-input--is-disabled .v-select__selections {
  color: rgba(255,255,255,0.5);
}
.theme--dark.v-select .v-chip--disabled,
.theme--dark.v-select .v-select__selection--disabled {
  color: rgba(255,255,255,0.5);
}
.theme--dark.v-select.v-text-field--solo-inverted.v-input--is-focused .v-select__selections {
  color: rgba(0,0,0,0.87);
}
.v-select {
  position: relative;
}
.v-select > .v-input__control > .v-input__slot {
  cursor: pointer;
}
.v-select .v-chip {
  flex: 0 1 auto;
}
.v-select .fade-transition-leave-active {
  position: absolute;
  left: 0;
}
.v-select.v-input--is-dirty ::placeholder {
  color: transparent !important;
}
.v-select:not(.v-input--is-dirty):not(.v-input--is-focused) .v-text-field__prefix {
  line-height: 20px;
  position: absolute;
  top: 7px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-select.v-text-field--enclosed:not(.v-text-field--single-line) .v-select__selections {
  padding-top: 24px;
}
.v-select.v-text-field input {
  flex: 1 1;
  margin-top: 0;
  min-width: 0;
  pointer-events: none;
  position: relative;
}
.v-select.v-select--is-menu-active .v-input__icon--append .v-icon {
  transform: rotate(180deg);
}
.v-select.v-select--chips input {
  margin: 0;
}
.v-select.v-select--chips .v-select__selections {
  min-height: 42px;
}
.v-select.v-select--chips.v-select--chips--small .v-select__selections {
  min-height: 32px;
}
.v-select.v-select--chips:not(.v-text-field--single-line).v-text-field--box .v-select__selections,
.v-select.v-select--chips:not(.v-text-field--single-line).v-text-field--enclosed .v-select__selections {
  min-height: 68px;
}
.v-select.v-select--chips:not(.v-text-field--single-line).v-text-field--box.v-select--chips--small .v-select__selections,
.v-select.v-select--chips:not(.v-text-field--single-line).v-text-field--enclosed.v-select--chips--small .v-select__selections {
  min-height: 56px;
}
.v-select.v-text-field--reverse .v-select__slot,
.v-select.v-text-field--reverse .v-select__selections {
  flex-direction: row-reverse;
}
.v-select__selections {
  align-items: center;
  display: flex;
  flex: 1 1 auto;
  flex-wrap: wrap;
  line-height: 18px;
}
.v-select__selection {
  max-width: 90%;
}
.v-select__selection--comma {
  align-items: center;
  display: inline-flex;
  margin: 7px 4px 7px 0;
}
.v-select__slot {
  position: relative;
  align-items: center;
  display: flex;
  width: 100%;
}
.v-select:not(.v-text-field--single-line) .v-select__slot > input {
  align-self: flex-end;
}
</style><style type="text/css">.theme--light.v-chip {
  background: #e0e0e0;
  color: rgba(0,0,0,0.87);
}
.theme--light.v-chip--disabled {
  color: rgba(0,0,0,0.38);
}
.theme--dark.v-chip {
  background: #555;
  color: #fff;
}
.theme--dark.v-chip--disabled {
  color: rgba(255,255,255,0.5);
}
.application--is-rtl .v-chip__close {
  margin: 0 8px 0 2px;
}
.application--is-rtl .v-chip--removable .v-chip__content {
  padding: 0 12px 0 4px;
}
.application--is-rtl .v-chip--select-multi {
  margin: 4px 0 4px 4px;
}
.application--is-rtl .v-chip .v-avatar {
  margin-right: -12px;
  margin-left: 8px;
}
.application--is-rtl .v-chip .v-icon--right {
  margin-right: 12px;
  margin-left: -8px;
}
.application--is-rtl .v-chip .v-icon--left {
  margin-right: -8px;
  margin-left: 12px;
}
.v-chip {
  align-items: center;
  border-radius: 28px;
  display: inline-flex;
  font-size: 13px;
  margin: 4px;
  outline: none;
  position: relative;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  vertical-align: middle;
}
.v-chip .v-chip__content {
  align-items: center;
  border-radius: 28px;
  cursor: default;
  display: inline-flex;
  height: 32px;
  justify-content: space-between;
  padding: 0 12px;
  vertical-align: middle;
  white-space: nowrap;
  z-index: 1;
}
.v-chip--removable .v-chip__content {
  padding: 0 4px 0 12px;
}
.v-chip .v-avatar {
  height: 32px !important;
  margin-left: -12px;
  margin-right: 8px;
  min-width: 32px;
  width: 32px !important;
}
.v-chip .v-avatar img {
  height: 100%;
  width: 100%;
}
.v-chip:focus:not(.v-chip--disabled),
.v-chip--active,
.v-chip--selected {
  border-color: rgba(0,0,0,0.13);
  box-shadow: 0px 3px 1px -2px rgba(0,0,0,0.2), 0px 2px 2px 0px rgba(0,0,0,0.14), 0px 1px 5px 0px rgba(0,0,0,0.12);
}
.v-chip:focus:not(.v-chip--disabled):after,
.v-chip--active:after,
.v-chip--selected:after {
  background: currentColor;
  border-radius: inherit;
  content: '';
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  transition: inherit;
  width: 100%;
  pointer-events: none;
  opacity: 0.13;
}
.v-chip--label {
  border-radius: 2px;
}
.v-chip--label .v-chip__content {
  border-radius: 2px;
}
.v-chip.v-chip.v-chip--outline {
  background: transparent !important;
  border: 1px solid currentColor;
  color: #9e9e9e;
  height: 32px;
}
.v-chip.v-chip.v-chip--outline .v-avatar {
  margin-left: -13px;
}
.v-chip--small {
  height: 24px !important;
}
.v-chip--small .v-avatar {
  height: 24px !important;
  min-width: 24px;
  width: 24px !important;
}
.v-chip--small .v-icon {
  font-size: 20px;
}
.v-chip__close {
  align-items: center;
  color: inherit;
  display: flex;
  font-size: 20px;
  margin: 0 2px 0 8px;
  text-decoration: none;
  user-select: none;
}
.v-chip__close > .v-icon {
  color: inherit !important;
  font-size: 20px;
  cursor: pointer;
  opacity: 0.5;
}
.v-chip__close > .v-icon:hover {
  opacity: 1;
}
.v-chip--disabled .v-chip__close {
  pointer-events: none;
}
.v-chip--select-multi {
  margin: 4px 4px 4px 0;
}
.v-chip .v-icon {
  color: inherit;
}
.v-chip .v-icon--right {
  margin-left: 12px;
  margin-right: -8px;
}
.v-chip .v-icon--left {
  margin-left: -8px;
  margin-right: 12px;
}
</style><style type="text/css">/* Themes */
.theme--light.v-icon {
  color: rgba(0,0,0,0.54);
}
.theme--light.v-icon.v-icon--disabled {
  color: rgba(0,0,0,0.38) !important;
}
.theme--dark.v-icon {
  color: #fff;
}
.theme--dark.v-icon.v-icon--disabled {
  color: rgba(255,255,255,0.5) !important;
}
.v-icon {
  align-items: center;
  display: inline-flex;
  font-feature-settings: 'liga';
  font-size: 24px;
  justify-content: center;
  line-height: 1;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  vertical-align: text-bottom;
}
.v-icon--right {
  margin-left: 16px;
}
.v-icon--left {
  margin-right: 16px;
}
.v-icon.v-icon.v-icon--link {
  cursor: pointer;
}
.v-icon--disabled {
  pointer-events: none;
  opacity: 0.6;
}
.v-icon--is-component {
  height: 24px;
}
</style><style type="text/css">.v-menu {
  display: block;

}
.v-menu--inline {
  display: inline-block;
}
.v-menu__activator {
  align-items: center;
  cursor: pointer;
  display: flex;
}
.v-menu__activator * {
  cursor: pointer;
}
.v-menu__content {
  position: absolute;
  display: inline-block;
  border-radius: 2px;
  max-width: 80%;
  overflow-y: auto;
  overflow-x: hidden;
  contain: content;
  will-change: transform;
  box-shadow: 0px 5px 5px -3px rgba(0,0,0,0.2), 0px 8px 10px 1px rgba(0,0,0,0.14), 0px 3px 14px 2px rgba(0,0,0,0.12);
}
.v-menu__content--active {
  pointer-events: none;
}
.v-menu__content--fixed {
  position: fixed;
}
.v-menu__content > .card {
  contain: content;
  backface-visibility: hidden;
}
.v-menu > .v-menu__content {
  max-width: none;
}
.v-menu-transition-enter .v-list__tile {
  min-width: 0;
  pointer-events: none;
}
.v-menu-transition-enter-to .v-list__tile {
  pointer-events: auto;
  transition-delay: 0.1s;
}
.v-menu-transition-leave-active,
.v-menu-transition-leave-to {
  pointer-events: none;
}
.v-menu-transition-enter,
.v-menu-transition-leave-to {
  opacity: 0;
}
.v-menu-transition-enter-active,
.v-menu-transition-leave-active {
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.v-menu-transition-enter.v-menu__content--auto {
  transition: none !important;
}
.v-menu-transition-enter.v-menu__content--auto .v-list__tile {
  opacity: 0;
  transform: translateY(-15px);
}
.v-menu-transition-enter.v-menu__content--auto .v-list__tile--active {
  opacity: 1;
  transform: none !important;
  pointer-events: auto;
}
</style><style type="text/css">/** Theme */
.theme--light.v-input--selection-controls.v-input--is-disabled .v-icon {
  color: rgba(0,0,0,0.26) !important;
}
.theme--dark.v-input--selection-controls.v-input--is-disabled .v-icon {
  color: rgba(255,255,255,0.3) !important;
}
.application--is-rtl .v-input--selection-controls .v-input--selection-controls__input {
  margin-right: 0;
  margin-left: 8px;
}
.v-input--selection-controls {
  margin-top: 16px;
  padding-top: 4px;
}
.v-input--selection-controls .v-input__append-outer,
.v-input--selection-controls .v-input__prepend-outer {
  margin-top: 0;
  margin-bottom: 0;
}
.v-input--selection-controls .v-input__control {
  flex-grow: 0;
  width: auto;
}
.v-input--selection-controls:not(.v-input--hide-details) .v-input__slot {
  margin-bottom: 12px;
}
.v-input--selection-controls__input {
  color: inherit;
  display: inline-flex;
  flex: 0 0 auto;
  height: 24px;
  position: relative;
  margin-right: 8px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  transition-property: color, transform;
  width: 24px;
  user-select: none;
}
.v-input--selection-controls__input input {
  position: absolute;
  opacity: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
  user-select: none;
}
.v-input--selection-controls__input + .v-label {
  cursor: pointer;
  user-select: none;
}
.v-input--selection-controls__ripple {
  border-radius: 50%;
  cursor: pointer;
  height: 34px;
  position: absolute;
  transition: inherit;
  width: 34px;
  left: -12px;
  top: calc(50% - 24px);
  margin: 7px;
}
.v-input--selection-controls__ripple:before {
  border-radius: inherit;
  bottom: 0;
  content: '';
  position: absolute;
  opacity: 0.2;
  left: 0;
  right: 0;
  top: 0;
  transform-origin: center center;
  transform: scale(0.2);
  transition: inherit;
}
.v-input--selection-controls__ripple .v-ripple__container {
  transform: scale(1.4);
}
.v-input--selection-controls.v-input .v-label {
  align-items: center;
  display: inline-flex;
  top: 0;
  height: auto;
}
.v-input--selection-controls.v-input--is-focused .v-input--selection-controls__ripple:before,
.v-input--selection-controls .v-radio--is-focused .v-input--selection-controls__ripple:before {
  background: currentColor;
  transform: scale(0.8);
}
</style><style type="text/css">/* Theme */
.theme--light.v-input:not(.v-input--is-disabled) input,
.theme--light.v-input:not(.v-input--is-disabled) textarea {
  color: rgba(0,0,0,0.87);
}
.theme--light.v-input input::placeholder,
.theme--light.v-input textarea::placeholder {
  color: rgba(0,0,0,0.38);
}
.theme--light.v-input--is-disabled .v-label,
.theme--light.v-input--is-disabled input,
.theme--light.v-input--is-disabled textarea {
  color: rgba(0,0,0,0.38);
}
.theme--dark.v-input:not(.v-input--is-disabled) input,
.theme--dark.v-input:not(.v-input--is-disabled) textarea {
  color: #fff;
}
.theme--dark.v-input input::placeholder,
.theme--dark.v-input textarea::placeholder {
  color: rgba(255,255,255,0.5);
}
.theme--dark.v-input--is-disabled .v-label,
.theme--dark.v-input--is-disabled input,
.theme--dark.v-input--is-disabled textarea {
  color: rgba(255,255,255,0.5);
}
.v-input {
  align-items: flex-start;
  display: flex;
  flex: 1 1 auto;
  font-size: 16px;
  text-align: left;
}
.v-input .v-progress-linear {
  top: calc(100% - 1px);
  left: 0;
  margin: 0;
  position: absolute;
}
.v-input input {
  max-height: 32px;
}
.v-input input:invalid,
.v-input textarea:invalid {
  box-shadow: none;
}
.v-input input:focus,
.v-input textarea:focus,
.v-input input:active,
.v-input textarea:active {
  outline: none;
}
.v-input .v-label {
  height: 20px;
  line-height: 20px;
}
.v-input__append-outer,
.v-input__prepend-outer {
  display: inline-flex;
  margin-bottom: 4px;
  margin-top: 4px;
  line-height: 1;
}
.v-input__append-outer .v-icon,
.v-input__prepend-outer .v-icon {
  user-select: none;
}
.v-input__append-outer {
  margin-left: 9px;
}
.v-input__prepend-outer {
  margin-right: 9px;
}
.v-input__control {
  display: flex;
  flex-direction: column;
  height: auto;
  flex-grow: 1;
  flex-wrap: wrap;
  width: 100%;
}
.v-input__icon {
  align-items: center;
  display: inline-flex;
  height: 24px;
  flex: 1 0 auto;
  justify-content: center;
  min-width: 24px;
  width: 24px;
}
.v-input__icon--clear {
  border-radius: 50%;
}
.v-input__slot {
  align-items: center;
  color: inherit;
  display: flex;
  margin-bottom: 8px;
  min-height: inherit;
  position: relative;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  width: 100%;
}
.v-input--is-disabled:not(.v-input--is-readonly) {
  pointer-events: none;
}
.v-input--is-loading > .v-input__control > .v-input__slot:before,
.v-input--is-loading > .v-input__control > .v-input__slot:after {
  display: none;
}
.v-input--hide-details > .v-input__control > .v-input__slot {
  margin-bottom: 0;
}
.v-input--has-state.error--text .v-label {
  animation: shake 0.6s cubic-bezier(0.25, 0.8, 0.5, 1);
}
</style>
<style type="text/css">.theme--light.v-label {
  color: rgba(0,0,0,0.54);
}
.theme--light.v-label--is-disabled {
  color: rgba(0,0,0,0.38);
}
.theme--dark.v-label {
  color: rgba(255,255,255,0.7);
}
.theme--dark.v-label--is-disabled {
  color: rgba(255,255,255,0.5);
}
.v-label {
  font-size: 16px;
  line-height: 1;
  min-height: 8px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
</style><style type="text/css">/* Theme */
.theme--light.v-messages {
  color: rgba(0,0,0,0.54);
}
.theme--dark.v-messages {
  color: rgba(255,255,255,0.7);
}
.application--is-rtl .v-messages {
  text-align: right;
}
.v-messages {
  flex: 1 1 auto;
  font-size: 12px;
  min-height: 12px;
  min-width: 1px;
  position: relative;
}
.v-messages__message {
  line-height: normal;
  word-break: break-word;
  overflow-wrap: break-word;
  word-wrap: break-word;
  hyphens: auto;
}
</style><style type="text/css">.theme--light.v-divider {
  border-color: rgba(0,0,0,0.12);
}
.theme--dark.v-divider {
  border-color: rgba(255,255,255,0.12);
}
.v-divider {
  display: block;
  flex: 1 1 0px;
  max-width: 100%;
  height: 0px;
  max-height: 0px;
  border: solid;
  border-width: thin 0 0 0;
  transition: inherit;
}
.v-divider--inset:not(.v-divider--vertical) {
  margin-left: 72px;
  max-width: calc(100% - 72px);
}
.v-divider--vertical {
  align-self: stretch;
  border: solid;
  border-width: 0 thin 0 0;
  display: inline-flex;
  height: inherit;
  min-height: 100%;
  max-height: 100%;
  max-width: 0px;
  width: 0px;
  vertical-align: text-bottom;
}
.v-divider--vertical.v-divider--inset {
  margin-top: 8px;
  min-height: 0;
  max-height: calc(100% - 16px);
}
</style><style type="text/css">.theme--light.v-subheader {
  color: rgba(0,0,0,0.54);
}
.theme--dark.v-subheader {
  color: rgba(255,255,255,0.7);
}
.v-subheader {
  align-items: center;
  display: flex;
  height: 48px;
  font-size: 14px;
  font-weight: 500;
  padding: 0 16px 0 16px;
}
.v-subheader--inset {
  margin-left: 56px;
}
</style><style type="text/css">/* Themes */
.theme--light.v-list {
  background: #fff;
  color: rgba(0,0,0,0.87);
}
.theme--light.v-list .v-list--disabled {
  color: rgba(0,0,0,0.38);
}
.theme--light.v-list .v-list__tile__sub-title {
  color: rgba(0,0,0,0.54);
}
.theme--light.v-list .v-list__tile__mask {
  color: rgba(0,0,0,0.38);
  background: #eee;
}
.theme--light.v-list .v-list__tile--link:hover,
.theme--light.v-list .v-list__tile--highlighted,
.theme--light.v-list .v-list__group__header:hover {
  background: rgba(0,0,0,0.04);
}
.theme--light.v-list .v-list__group--active:before,
.theme--light.v-list .v-list__group--active:after {
  background: rgba(0,0,0,0.12);
}
.theme--light.v-list .v-list__group--disabled .v-list__tile {
  color: rgba(0,0,0,0.38) !important;
}
.theme--light.v-list .v-list__group--disabled .v-list__group__header__prepend-icon .v-icon {
  color: rgba(0,0,0,0.38) !important;
}
.theme--dark.v-list {
  background: #424242;
  color: #fff;
}
.theme--dark.v-list .v-list--disabled {
  color: rgba(255,255,255,0.5);
}
.theme--dark.v-list .v-list__tile__sub-title {
  color: rgba(255,255,255,0.7);
}
.theme--dark.v-list .v-list__tile__mask {
  color: rgba(255,255,255,0.5);
  background: #494949;
}
.theme--dark.v-list .v-list__tile--link:hover,
.theme--dark.v-list .v-list__tile--highlighted,
.theme--dark.v-list .v-list__group__header:hover {
  background: rgba(255,255,255,0.08);
}
.theme--dark.v-list .v-list__group--active:before,
.theme--dark.v-list .v-list__group--active:after {
  background: rgba(255,255,255,0.12);
}
.theme--dark.v-list .v-list__group--disabled .v-list__tile {
  color: rgba(255,255,255,0.5) !important;
}
.theme--dark.v-list .v-list__group--disabled .v-list__group__header__prepend-icon .v-icon {
  color: rgba(255,255,255,0.5) !important;
}
.application--is-rtl .v-list__tile__title {
  text-align: right;
}
.application--is-rtl .v-list__tile__content {
  text-align: right;
}
.v-list {
  list-style-type: none;
  padding: 8px 0 8px;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-list > div {
  transition: inherit;
}
.v-list__tile {
  align-items: center;
  color: inherit;
  display: flex;
  font-size: 16px;
  font-weight: 400;
  height: 48px;
  margin: 0;
  padding: 0 16px;
  position: relative;
  text-decoration: none;
  transition: background 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
}
.v-list__tile--link {
  cursor: pointer;
  user-select: none;
}
.v-list__tile__content,
.v-list__tile__action {
  height: 100%;
}
.v-list__tile__title,
.v-list__tile__sub-title {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  width: 100%;
}
.v-list__tile__title {
  height: 24px;
  line-height: 24px;
  position: relative;
  text-align: left;
}
.v-list__tile__sub-title {
  font-size: 14px;
}
.v-list__tile__avatar {
  display: flex;
  justify-content: flex-start;
  min-width: 56px;
}
.v-list__tile__action {
  display: flex;
  justify-content: flex-start;
  min-width: 56px;
  align-items: center;
}
.v-list__tile__action .v-btn {
  padding: 0;
  margin: 0;
}
.v-list__tile__action .v-btn--icon {
  margin: -6px;
}
.v-list__tile__action .v-radio.v-radio {
  margin: 0;
}
.v-list__tile__action .v-input--selection-controls {
  padding: 0;
  margin: 0;
}
.v-list__tile__action .v-input--selection-controls .v-messages {
  display: none;
}
.v-list__tile__action .v-input--selection-controls .v-input__slot {
  margin: 0;
}
.v-list__tile__action-text {
  color: #9e9e9e;
  font-size: 12px;
}
.v-list__tile__action--stack {
  align-items: flex-end;
  justify-content: space-between;
  padding-top: 8px;
  padding-bottom: 8px;
  white-space: nowrap;
  flex-direction: column;
}
.v-list__tile__content {
  text-align: left;
  flex: 1 1 auto;
  overflow: hidden;
  display: flex;
  align-items: flex-start;
  justify-content: center;
  flex-direction: column;
}
.v-list__tile__content ~ .v-list__tile__avatar {
  justify-content: flex-end;
}
.v-list__tile__content ~ .v-list__tile__action:not(.v-list__tile__action--stack) {
  justify-content: flex-end;
}
.v-list__tile--active .v-list__tile__action:first-of-type .v-icon {
  color: inherit;
}
.v-list__tile--avatar {
  height: 56px;
}
.v-list--dense {
  padding-top: 4px;
  padding-bottom: 4px;
}
.v-list--dense .v-subheader {
  font-size: 13px;
  height: 40px;
}
.v-list--dense .v-list__group .v-subheader {
  height: 40px;
}
.v-list--dense .v-list__tile {
  font-size: 13px;
}
.v-list--dense .v-list__tile--avatar {
  height: 48px;
}
.v-list--dense .v-list__tile:not(.v-list__tile--avatar) {
  height: 40px;
}
.v-list--dense .v-list__tile .v-icon {
  font-size: 22px;
}
.v-list--dense .v-list__tile__sub-title {
  font-size: 13px;
}
.v-list--disabled {
  pointer-events: none;
}
.v-list--two-line .v-list__tile {
  height: 72px;
}
.v-list--two-line.v-list--dense .v-list__tile {
  height: 60px;
}
.v-list--three-line .v-list__tile {
  height: 88px;
}
.v-list--three-line .v-list__tile__avatar {
  margin-top: -18px;
}
.v-list--three-line .v-list__tile__sub-title {
  white-space: initial;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  display: -webkit-box;
}
.v-list--three-line.v-list--dense .v-list__tile {
  height: 76px;
}
.v-list > .v-list__group:before {
  top: 0;
}
.v-list > .v-list__group:before .v-list__tile__avatar {
  margin-top: -14px;
}
.v-list__group {
  padding: 0;
  position: relative;
  transition: inherit;
}
.v-list__group:before,
.v-list__group:after {
  content: '';
  height: 1px;
  left: 0;
  position: absolute;
  transition: 0.3s cubic-bezier(0.25, 0.8, 0.5, 1);
  width: 100%;
}
.v-list__group--active ~ .v-list__group:before {
  display: none;
}
.v-list__group__header {
  align-items: center;
  cursor: pointer;
  display: flex;
  list-style-type: none;
}
.v-list__group__header > div:not(.v-list__group__header__prepend-icon):not(.v-list__group__header__append-icon) {
  flex: 1 1 auto;
  overflow: hidden;
}
.v-list__group__header .v-list__group__header__append-icon,
.v-list__group__header .v-list__group__header__prepend-icon {
  padding: 0 16px;
  user-select: none;
}
.v-list__group__header--sub-group {
  align-items: center;
  display: flex;
}
.v-list__group__header--sub-group div .v-list__tile {
  padding-left: 0;
}
.v-list__group__header--sub-group .v-list__group__header__prepend-icon {
  padding: 0 0 0 40px;
  margin-right: 8px;
}
.v-list__group__header .v-list__group__header__prepend-icon {
  display: flex;
  justify-content: flex-start;
  min-width: 56px;
}
.v-list__group__header--active .v-list__group__header__append-icon .v-icon {
  transform: rotate(-180deg);
}
.v-list__group__header--active .v-list__group__header__prepend-icon .v-icon {
  color: inherit;
}
.v-list__group__header--active.v-list__group__header--sub-group .v-list__group__header__prepend-icon .v-icon {
  transform: rotate(-180deg);
}
.v-list__group__items {
  position: relative;
  padding: 0;
  transition: inherit;
}
.v-list__group__items > div {
  display: block;
}
.v-list__group__items--no-action .v-list__tile {
  padding-left: 72px;
}
.v-list__group--disabled {
  pointer-events: none;
}
.v-list--subheader {
  padding-top: 0;
}
</style><style type="text/css">.v-avatar {
  align-items: center;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  position: relative;
  text-align: center;
  vertical-align: middle;
}
.v-avatar img,
.v-avatar .v-icon,
.v-avatar .v-image {
  border-radius: 50%;
  display: inline-flex;
  height: inherit;
  width: inherit;
}
.v-avatar--tile {
  border-radius: 0;
}
.v-avatar--tile img,
.v-avatar--tile .v-icon,
.v-avatar--tile .v-image {
  border-radius: 0;
}
</style><style type="text/css">/* Theme */
.theme--light.v-counter {
  color: rgba(0,0,0,0.54);
}
.theme--dark.v-counter {
  color: rgba(255,255,255,0.7);
}
.v-counter {
  flex: 0 1 auto;
  font-size: 12px;
  min-height: 12px;
  line-height: 1;
}
</style><style type="text/css">.v-progress-linear {
  background: transparent;
  margin: 1rem 0;
  overflow: hidden;
  width: 100%;
  position: relative;
}
.v-progress-linear__bar {
  width: 100%;
  height: inherit;
  position: relative;
  transition: 0.2s cubic-bezier(0.4, 0, 0.6, 1);
  z-index: 1;
}
.v-progress-linear__bar__determinate {
  height: inherit;
  transition: 0.2s cubic-bezier(0.4, 0, 0.6, 1);
}
.v-progress-linear__bar__indeterminate .long,
.v-progress-linear__bar__indeterminate .short {
  height: inherit;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  will-change: left, right;
  width: auto;
  background-color: inherit;
}
.v-progress-linear__bar__indeterminate--active .long {
  animation: indeterminate;
  animation-duration: 2.2s;
  animation-iteration-count: infinite;
}
.v-progress-linear__bar__indeterminate--active .short {
  animation: indeterminate-short;
  animation-duration: 2.2s;
  animation-iteration-count: infinite;
}
.v-progress-linear__background {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  transition: 0.3s ease-in;
}
.v-progress-linear__content {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
}
.v-progress-linear--query .v-progress-linear__bar__indeterminate--active .long {
  animation: query;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}
.v-progress-linear--query .v-progress-linear__bar__indeterminate--active .short {
  animation: query-short;
  animation-duration: 2s;
  animation-iteration-count: infinite;
}
@-moz-keyframes indeterminate {
  0% {
    left: -90%;
    right: 100%;
  }
  60% {
    left: -90%;
    right: 100%;
  }
  100% {
    left: 100%;
    right: -35%;
  }
}
@-webkit-keyframes indeterminate {
  0% {
    left: -90%;
    right: 100%;
  }
  60% {
    left: -90%;
    right: 100%;
  }
  100% {
    left: 100%;
    right: -35%;
  }
}
@-o-keyframes indeterminate {
  0% {
    left: -90%;
    right: 100%;
  }
  60% {
    left: -90%;
    right: 100%;
  }
  100% {
    left: 100%;
    right: -35%;
  }
}
@keyframes indeterminate {
  0% {
    left: -90%;
    right: 100%;
  }
  60% {
    left: -90%;
    right: 100%;
  }
  100% {
    left: 100%;
    right: -35%;
  }
}
@-moz-keyframes indeterminate-short {
  0% {
    left: -200%;
    right: 100%;
  }
  60% {
    left: 107%;
    right: -8%;
  }
  100% {
    left: 107%;
    right: -8%;
  }
}
@-webkit-keyframes indeterminate-short {
  0% {
    left: -200%;
    right: 100%;
  }
  60% {
    left: 107%;
    right: -8%;
  }
  100% {
    left: 107%;
    right: -8%;
  }
}
@-o-keyframes indeterminate-short {
  0% {
    left: -200%;
    right: 100%;
  }
  60% {
    left: 107%;
    right: -8%;
  }
  100% {
    left: 107%;
    right: -8%;
  }
}
@keyframes indeterminate-short {
  0% {
    left: -200%;
    right: 100%;
  }
  60% {
    left: 107%;
    right: -8%;
  }
  100% {
    left: 107%;
    right: -8%;
  }
}
@-moz-keyframes query {
  0% {
    right: -90%;
    left: 100%;
  }
  60% {
    right: -90%;
    left: 100%;
  }
  100% {
    right: 100%;
    left: -35%;
  }
}
@-webkit-keyframes query {
  0% {
    right: -90%;
    left: 100%;
  }
  60% {
    right: -90%;
    left: 100%;
  }
  100% {
    right: 100%;
    left: -35%;
  }
}
@-o-keyframes query {
  0% {
    right: -90%;
    left: 100%;
  }
  60% {
    right: -90%;
    left: 100%;
  }
  100% {
    right: 100%;
    left: -35%;
  }
}
@keyframes query {
  0% {
    right: -90%;
    left: 100%;
  }
  60% {
    right: -90%;
    left: 100%;
  }
  100% {
    right: 100%;
    left: -35%;
  }
}
@-moz-keyframes query-short {
  0% {
    right: -200%;
    left: 100%;
  }
  60% {
    right: 107%;
    left: -8%;
  }
  100% {
    right: 107%;
    left: -8%;
  }
}
@-webkit-keyframes query-short {
  0% {
    right: -200%;
    left: 100%;
  }
  60% {
    right: 107%;
    left: -8%;
  }
  100% {
    right: 107%;
    left: -8%;
  }
}
@-o-keyframes query-short {
  0% {
    right: -200%;
    left: 100%;
  }
  60% {
    right: 107%;
    left: -8%;
  }
  100% {
    right: 107%;
    left: -8%;
  }
}
@keyframes query-short {
  0% {
    right: -200%;
    left: 100%;
  }
  60% {
    right: 107%;
    left: -8%;
  }
  100% {
    right: 107%;
    left: -8%;
  }
}
</style>
<style type="text/css">
  .vue-slider-dot{position:absolute;
  -webkit-transition:all 0s;
  transition:all 0s;z-index:5}
  .vue-slider-dot:focus{outline:none}
  .vue-slider-dot-tooltip{position:absolute;visibility:hidden}
  .vue-slider-dot-hover:hover .vue-slider-dot-tooltip,.vue-slider-dot-tooltip-show{visibility:visible}
  .vue-slider-dot-tooltip-top{top:-10px;left:50%;-webkit-transform:translate(-50%,-100%);transform:translate(-50%,-100%)}
  .vue-slider-dot-tooltip-bottom{bottom:-10px;left:50%;-webkit-transform:translate(-50%,100%);transform:translate(-50%,100%)}
  .vue-slider-dot-tooltip-left{left:-10px;top:50%;-webkit-transform:translate(-100%,-50%);transform:translate(-100%,-50%)}
  .vue-slider-dot-tooltip-right{right:-10px;top:50%;-webkit-transform:translate(100%,-50%);transform:translate(100%,-50%)}</style>
<style type="text/css">
.vue-slider-marks{position:relative;width:100%;height:100%}
.vue-slider-mark{position:absolute;z-index:1}
.vue-slider-ltr .vue-slider-mark,.vue-slider-rtl .vue-slider-mark{width:0;height:100%;top:50%}
.vue-slider-ltr .vue-slider-mark-step,.vue-slider-rtl .vue-slider-mark-step{top:0}.vue-slider-ltr .vue-slider-mark-label,.vue-slider-rtl .vue-slider-mark-label{top:100%;margin-top:10px}.vue-slider-ltr .vue-slider-mark{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vue-slider-ltr .vue-slider-mark-step{left:0}.vue-slider-ltr .vue-slider-mark-label{left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%)}.vue-slider-rtl .vue-slider-mark{-webkit-transform:translate(50%,-50%);transform:translate(50%,-50%)}.vue-slider-rtl .vue-slider-mark-step{right:0}.vue-slider-rtl .vue-slider-mark-label{right:50%;-webkit-transform:translateX(50%);transform:translateX(50%)}.vue-slider-btt .vue-slider-mark,.vue-slider-ttb .vue-slider-mark{width:100%;height:0;left:50%}.vue-slider-btt .vue-slider-mark-step,.vue-slider-ttb .vue-slider-mark-step{left:0}.vue-slider-btt .vue-slider-mark-label,.vue-slider-ttb .vue-slider-mark-label{left:100%;margin-left:10px}.vue-slider-btt .vue-slider-mark{-webkit-transform:translate(-50%,50%);transform:translate(-50%,50%)}.vue-slider-btt .vue-slider-mark-step{top:0}.vue-slider-btt .vue-slider-mark-label{top:50%;-webkit-transform:translateY(-50%);transform:translateY(-50%)}.vue-slider-ttb .vue-slider-mark{-webkit-transform:translate(-50%,-50%);transform:translate(-50%,-50%)}.vue-slider-ttb .vue-slider-mark-step{bottom:0}.vue-slider-ttb .vue-slider-mark-label{bottom:50%;-webkit-transform:translateY(50%);transform:translateY(50%)}.vue-slider-mark-label,.vue-slider-mark-step{position:absolute}</style><style type="text/css">.vue-slider{position:relative;-webkit-box-sizing:content-box;box-sizing:content-box;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;display:block;-webkit-tap-highlight-color:rgba(0,0,0,0)}.vue-slider-rail{position:relative;width:100%;height:100%;-webkit-transition-property:width,height,left,right,top,bottom;transition-property:width,height,left,right,top,bottom}.vue-slider-process{position:absolute;z-index:1}
</style>
<style>
  @font-face{font-family:Gilroy;
    src: url("/fonts/OpenSans-Regular-webfont.woff2") format("woff2"),
        url("/fonts/OpenSans-Regular-webfont.woff") format("woff");
   font-weight:600;
   font-style:normal} 
  </style>

  </head>

  <body class="text-center footer-back-reg">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-signin" method="post">
      <img class="mb-4" src="https://img.icons8.com/plasticine/100/000000/barcode.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>

      <div class="form-group">
        <input type="text" name="name" placeholder="Введите своё имя" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" autocomplete="off">
        <span class="invalid-feedback"><?php echo $name_err; ?></span>
      </div>
      <div class="form-group">
        <input type="text" name="Sur" placeholder="Введите свою фамилию" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $surname; ?>" autocomplete="off">
        <span class="invalid-feedback"><?php echo $surname_err; ?></span>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Введите пароль" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" autocomplete="off">
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
      </div>
      <div class="form-group">
        <input type="password" name="confirm_password" placeholder="Подтвердите введенный пароль" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" autocomplete="off">
        <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
      </div>

      <br>
      <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Зарегистрироваться">
          <input type="reset" class="btn btn-secondary ml-2" value="Очистить">
      </div>
      <div class="form-group">У вас уже есть аккаунт? <a href="login.php">Авторизируйтесь</a>.</div>
      <br><br><br><br><br><br>
      <p> <a href="index.html">Вернуться назад</a>.</p>
      <p class="mt-2 mb-1 text-muted">© 2021-2022</p>
    </form>
  

<div class="mallbery-caa" style="z-index: 2147483647 !important; text-transform: none !important; position: fixed;"></div></body><div id="sm-wrapper"></div>
</html>