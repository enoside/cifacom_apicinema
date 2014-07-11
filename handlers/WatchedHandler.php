<?php

// Handler for route '/v1/users/:number/watched/:number'
class WatchedHandler {

    // Add a 'watched' on a movie
    function post( $id_user, $id_movie ) {
        $watched = add_watched( $id_user, $id_movie );
        
    }
    
    // Delete a 'watched' on a movie
    function delete( $id_user, $id_movie ) {
        $watched = delete_watched( $id_user, $id_movie );
    
    }
}

?>