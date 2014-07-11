<?php

// Handler for route '/v1/users/:number/watchlist/:number'
class WatchlistHandler {

    // Add a 'watchlist' on a movie
    function post( $id_user, $id_movie ) {
        $watchlist = add_watchlist( $id_user, $id_movie );
        
    }
    
    // Delete a 'watchlist' on a movie
    function delete( $id_user, $id_movie ) {
        $watchlist = delete_watchlist( $id_user, $id_movie );
    
    }
}

?>