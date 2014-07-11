<?php

// Handler for route '/v1/users/:number/dislikes'
class DislikesHandler {

    // List of disliked movies
    function get( $id ) {
        $dislikes = get_dislikes( $id );
        if( $dislikes != "" ) {
            API::status(200);
            API::response( $likes );
        
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }
}

?>