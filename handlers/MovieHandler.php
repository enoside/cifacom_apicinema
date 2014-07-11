<?php

// Handler for route '/v1/movies/:number'
class MovieHandler {
    
    // Get movie infos
    function get( $id ) {
        $movie = get_movie( $id );
        if( $movie =! '' ) {
            API::status(200);
            API::response( $movie );
        
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }

    // Update movie's infos
    function put( $id ) {
        parse_str(file_get_contents("php://input"),$post_vars);
        $title = $post_vars['title'];
        $cover = $post_vars['cover'];
        $genre = $post_vars['genre'];
        if (isset($_post_vars['title']) && isset($_post_vars['cover']) && isset($_post_vars['genre'])) {
            $movie = update_movie( $id, $title, $cover, $genre );
       
        } else {
            API::status(400);
            API::error(400, "Bad request");
            
        }
    }

    // Delete a movie
    function delete( $id ) {
        $movie = delete_movie( $id );
        
    }
}

?>