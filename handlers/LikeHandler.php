<?php

// Handler for route '/v1/users/:number/likes/:number'
class LikeHandler {

    // Add a like on a movie
    function post( $id_user, $id_movie ) {
        $likes = add_likes( $id_user, $id_movie );
        
    }
    
    // Delete a like on a movie
    function delete( $id_user, $id_movie ) {
        $likes = delete_likes( $id_user, $id_movie );
    
    }
}

?>