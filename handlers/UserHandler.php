<?php

// Handler for route '/v1/users/:number'
class UserHandler {

    // Get user infos
    function get( $id ) {
        $user = get_user( $id );
        if( $user != '' ) {
            API::status(200);
            API::response( $user );
        
        } else {
            API::error(400, "Bad request");
            
        }
    }


    // Update user's username
    function put( $id ) {
        parse_str(file_get_contents("php://input"),$post_vars);
        $username = $post_vars['username'];
        if (isset($_post_vars['username'])) {
            $user = update_user( $id, $username );
       
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }

    
    // Delete an user
    function delete( $id ) {
        $user = delete_user( $id );
        
    }
}

?>