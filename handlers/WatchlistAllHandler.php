<?php

// Handler for route '/v1/users/:number/watchlist'
class WatchlistAllHandler {

    // List of watchlist movies
    function get( $id ) {
        $watchlist = get_watchlist( $id );
        if( $watchlist != "" ) {
            API::status(200);
            API::response( $likes );
        
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }
}

?>