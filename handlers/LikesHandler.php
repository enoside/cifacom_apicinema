<?php

// Handler for route '/v1/users/:number/likes'
class LikesHandler {

    // List of liked movies
    function get( $id ) {
        $likes = get_likes( $id );
        if( $likes != "" ) {
            API::status(200);
            API::response( $likes );
        
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }
}

?>