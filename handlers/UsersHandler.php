<?php

// Handler for routes '/v1/' and '/v1/users'
class UsersHandler {

    // List of every users
    function get() {
        $users = get_users();
        API::status(200);
        API::response( $users );

    }

    // Add an user
    function post() {
        if( isset( $_POST['username'] ) ) {
            $username = $_POST['username'];
            $user = create_user( null, $username );
            API::status(200);
            API::response( $user );

        } else {
            API::status(400);
            API::error( 400, "Bad request" );

        }
    }
}

?>