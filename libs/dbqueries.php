<?php
// Database queries

//Users l.11
//Movies l.62
//Likes l.117
//Dislikes l.153
//Watched l.189
//Watchlist l.224

        /**********
         **USERS**  queries on 'users' table
        **********/

// Get Users List
function get_users() {
    global $db;
    $query = $db->prepare( "SELECT * FROM users ORDER BY id ASC" );
    $query->execute();
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}
// Get User infos
function get_user( $id ) {
    global $db;
    $query = $db->prepare( "SELECT * FROM users WHERE id = :id" );    
    $query->execute(array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}
// Add an User
function create_user( $id = NULL, $username ) {
    global $db;
    $query = $db->prepare( "INSERT INTO users (username) VALUES (:username)" ); 
    $query->execute(array('username' => $_POST['username']));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
// Update User infos
function update_user($id, $username) {
    global $db;
    $query = $db->prepare("UPDATE users SET username = :username WHERE id = :id");
    $query->execute(array('username' => $_PUT['username'], 'id' => $id) );
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}
// Delete an User
function delete_user( $id ) {
    global $db;
    $query = $db->prepare("DELETE FROM users WHERE id=:id");    
    $query->execute(array('id' => $id) );
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}


        /***********
         **MOVIES**  queries on 'movies' table
        ***********/

// Get Movies List
function get_movies() {
    global $db;
    $query = $db->prepare( "SELECT * FROM movies ORDER BY id ASC" );
    $query->execute;
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Get Movie infos
function get_movie( $id ) {
    global $db;
    $query = $db->prepare( "SELECT * FROM movies WHERE id = :id" );
    $query->execute(array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Add a Movie
function create_movie( $id = NULL, $title, $cover, $genre ) {
    global $db;
    $query = $db->prepare( "INSERT INTO movies (title, cover, genre) VALUES (:title, :cover, :genre)" );
    $query->execute(array('title' => $_POST['title'], 'cover' => $_POST['cover'], 'genre' => $_POST['genre']));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Update Movie infos
function update_movie( $id, $title ) {
    global $db;
    $query = $db->prepare( "UPDATE movies SET title = :title, cover = :cover, genre = :genre WHERE id = :id" );
    $query->execute((array('title' => $_PUT['title'], 'cover' => $_PUT['cover'], 'genre' => $_PUT['genre'], 'id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Delete a Movie
function delete_movie( $id ) {
    global $db;
    $query = $db->prepare( "DELETE FROM movies WHERE id=:id" );
    $query->execute(array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}


        /**********
         **LIKES**  queries on 'usersmovies' table
        **********/
    
// Get Liked Movies from User
function get_likes( $id ) {
    global $db;
    $query = $db->prepare( "SELECT * FROM movies WHERE id in (SELECT id_movie FROM usermovies WHERE id_user= :id AND likes = 1)" );
    $query->execute(array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}
                    
// Add a Like
function add_like( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare( "INSERT INTO usermovies (id_user, id_movie, likes, dislikes) VALUES (:id_user, :id_movie, 1, 0); UPDATE users SET likes = (likes +1) WHERE id = :id_user" );
    $query->execute(array('id_user' => $_POST['id_user'], 'id_movie' => $_POST['id_movie']));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Delete a Like
function delete_like( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare("UPDATE usermovies SET likes=0 WHERE id_user=:id_user AND id_movie=:id_movie; UPDATE users SET likes = (likes-1) WHERE id=:id_user");
    $query->execute(array('id_user' => $id_user, 'id_movie' => $id_movie));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
    
}
                    

        /*************
         **DISLIKES**  queries on 'usersmovies' table
        *************/
                

// Get Disliked Movies from User
function get_dislikes( $id ) {
    global $db;
    $query = $db->prepare( "SELECT * FROM movies WHERE id in (SELECT id_movie FROM usermovies WHERE id_user=:id AND dislikes = 1)" );
    $query->execute(array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );
    
    return $result;
}

// Add a Dislike
function add_dislike( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare( "INSERT INTO usermovies (id_user, id_movie, dislikes, likes) VALUES (:id_user, :id_movie, 1, 0); UPDATE users SET dislikes = (dislikes +1) WHERE id=:id_user" );
    $query->execute(array('id_user' => $_POST['id_user'], 'id_movie' => $_POST['id_movie']));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Delete a Dislike
function delete_dislike( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare("UPDATE usermovies SET dislikes=0 WHERE id_user=:id_user AND id_movie=:id_movie; UPDATE users SET dislikes = (dislikes -1) WHERE id=:id_user");
    $query->execute(array('id_user' => $id_user, 'id_movie' => $id_movie));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}
                    
    
        /************
         **WATCHED**  queries on 'usersmovies' table
        ************/
                    
// Get Watched Movies from User
function get_watched( $id ) {
    global $db;
    $query = $db->prepare( "SELECT * FROM movies WHERE id in (SELECT id_movie FROM usermovies WHERE id_user=:id AND watched = 1)" );
    $query->execute((array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Add a 'Watched'
function add_watched( $id_user, $id_movie ) {
    global $db;
    $query =$db->prepare( "INSERT INTO usermovies (id_user, id_movie, watched, watchlist) VALUES (:id_user, :id_movie, 1, 0); UPDATE users SET watched = (watched +1) WHERE id=:id_user" );
    $query->execute(array('id_user' => $_POST['id_user'], 'id_movie' => $_POST['id_movie']));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Delete a 'Watched'
function delete_watched( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare("UPDATE usermovies SET watched=0 WHERE id_user=:id_user AND id_movie=:id_movie; UPDATE users SET watched = (watched -1) WHERE id=:id_user");
    $query->execute(array('id_user' => $id_user, 'id_movie' => $id_movie));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}


        /**************
         **WATCHLIST**  queries on 'usersmovies' table
        **************/      
                    
// Get Watchlist from User
function get_watchlist( $id ) {
    global $db;
    $query = $db->prepare( "SELECT * FROM movies WHERE id in (SELECT id_movie FROM usermovies WHERE id_user=:id AND watchlist = 1)" );
    $query->execute((array('id' => $id));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}

// Add a Movie to Watchlist
function add_watchlist( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare( "INSERT INTO usermovies (id_user, id_movie, watchlist, watched) VALUES (:id_user, :id_movie, 1, 0); UPDATE users SET watchlist = (watchlist +1) WHERE id=:id_user" );
    $query->execute(array('id_user' => $_POST['id_user'], 'id_movie' => $_POST['id_movie']));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}


// Delete a Movie from Watchlist
function delete_watchlist( $id_user, $id_movie ) {
    global $db;
    $query = $db->prepare("UPDATE usermovies SET watchlist=0 WHERE id_user=:id_user AND id_movie=:id_movie; UPDATE users SET watchlist = (watchlist -1) WHERE id=:id_user");
    $query->execute((array('id_user' => $id_user, 'id_movie' => $id_movie));
    $result = $query->fetchAll( PDO::FETCH_ASSOC );

    return $result;
}                    
?>