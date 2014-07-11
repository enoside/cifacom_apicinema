<?php

// Handler for route '/v1/users/:number/watched'
class WatchedAllHandler {

    // List of watched movies
    function get( $id ) {
        $watched = get_watched( $id );
        if( $watched != "" ) {
            API::status(200);
            API::response( $likes );
        
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }
}

?>