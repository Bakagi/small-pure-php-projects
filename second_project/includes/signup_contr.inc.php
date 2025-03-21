<?php 

declare(strict_types=1);
// ERROR HANDLING
//check if the form was submitted
function if_input_empty ( string $username,string $email,string $pwd) {
    if (empty($username) || empty($email) || empty($pwd)) {
        return true;
    } else {
        return false;
    }};

function if_email_invalid (string $email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }};
    
function if_username_taken (object $pdo, string $username) {

    if (get_username($pdo, $username) == true) {
        return true;
    } else {
        return false;
    }};

function if_email_taken (object $pdo, string $email) {

    if (get_username($pdo, $email) == true) {
        return true;
    } else {
        return false;
    }};

function create_user (object $pdo , string $username, string $email, string $pwd) {
    set_user($pdo, $username, $email, $pwd);
}
