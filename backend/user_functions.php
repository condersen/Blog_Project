<?php
session_start();
require_once 'database.php';

/**
 * @param $email String User email
 * @param $username String Username
 * @param $password String User password
 * @return bool|string Returns a boolean TRUE if successfully added. Returns a string with error message if not.
 */
function add_user($email, $username, $password)
{
    global $db_link;

    $insert_query = 'INSERT '.TBL_USERS.'(`username`, `email`, `password`)
                        VALUES(
                            "'.addslashes($username).'",
                            "'.addslashes($email).'",
                            "'.addslashes($password).'")';


    if($result = mysql_query($insert_query))
    {
        return true;
    }
    return mysql_error();
}

/**
 * Pass in the username and password to log the user in. Returns an array with the fields user_id, username, email on successful login
 * @param $username String
 * @param $password String
 * @return string|array Returns a string with error messages if any. Otherwise, returns array on successful login.
 */
function login_user($username, $password)
{
    global $db_link;

    $select_query = 'SELECT user_id, username, email FROM '.TBL_USERS.'
                        WHERE `username`="'.addslashes($username).'"
                        AND `password`="'.addslashes($password).'"';

    $result = mysql_query($select_query);
    if(mysql_num_rows($result) == 0)
    {
        return 'Invalid login credentials';
    }

    $row = mysql_fetch_assoc($result);

    // Save the user's data into the 'user' key of our session data
    $_SESSION['user'] = $row;
    return $row;
}

/**
 * Get all users if no id is passed in. Return just the user belonging to id if passed in.
 * @param int $id User id. OPTIONAL
 * @return array Returns an array of all users that are matched
 */
function get_user($id = NULL)
{
    $select_query = 'SELECT user_id, username, email
                      FROM ' . TBL_USERS;

    if ($id !== NULL)
    {
        $select_query .= ' WHERE `user_id`=' . (int)$id;
    }

    $select_query .= ' ORDER BY `user_id` ASC';

    $result = mysql_query($select_query);

    $users = array();
    while ($row = mysql_fetch_array($result))
    {
        $users[] = $row;
    }

    return $users;
}

/**
 * Logs the user out by destroying $_SESSION['user']
 * @return bool
 */
function logout_session()
{
    unset($_SESSION['user']);
    return TRUE;
}