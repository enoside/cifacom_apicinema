<?php

// Handler for route '/v1/users/:number/dislikes/:number'
class DislikeHandler {

    // Add a dislike on a movie
    function post( $id_user, $id_movie ) {
        $dislike = add_dislike( $id_user, $id_movie );
        
    }
    
    // Delete a dislike on a movie
    function delete( $id_user, $id_movie ) {
        $dislike = delete_dislike( $id_user, $id_movie );
    
    }
}

?>