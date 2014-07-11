<?php

// Handler for route '/v1/movies'
class MoviesHandler {

    // List of every movies
    function get() {
        $movies = get_movies();
        API::status(200);
        API::response( $movies );
        
    }

    // Add a movie
    function post() {
        if( isset( $_POST['title'] ) && isset($_POST['cover']) && isset($_POST['genre'])) {
            $title = $_POST['title'];
            $cover = $_POST['cover'];
            $genre = $_POST['genre'];
            $movie = create_movie( null, $title, $cover, $genre );
            API::status(200);
            API::response( $movie );
        
        } else {
            API::status(400);
            API::error( 400, "Bad request" );
            
        }
    }
}

?>