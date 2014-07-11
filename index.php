<?php

    require("libs/toro.php");
    require("libs/mysql.php");
    require("libs/api.php");
    require("libs/dbquerries.php");

    require("handlers/MovieHandler.php");
    require("handlers/MoviesHandler.php");
    require("handlers/UserHandler.php");
    require("handlers/UsersHandler.php");
    require("handlers/LikeHandler.php");
    require("handlers/LikesHandler.php");
    require("handlers/DislikeHandler.php");
    require("handlers/DislikesHandler.php");
    require("handlers/WatchedHandler.php");
    require("handlers/WatchedAllHandler.php");
    require("handlers/WatchlistHandler.php");
    require("handlers/WatchlistAllHandler.php");

    ToroHook::add("404", function() {
        API::status(404);
        API::error(404, 'Page Not Found');
    });

    ToroHook::add("400", function() {
        API::status(400);
        API::error(400, 'Bad Request');
    });

    ToroHook::add("401", function() {
        API::status(401);
        API::error(401, 'Unauthorized');
    });

    ToroHook::add('403', function() {
        API::status(403);
        API::error(403, 'Forbidden');
    });

    ToroHook::add("500", function() {
        API::status(500);
        API::error(500, 'Internal Server Error');
    });
    

    Toro::serve(array(
        '/v1/'                                => 'UsersHandler',
        '/v1/movies'                          => 'MoviesHandler',
        '/v1/movies/:number'                  => 'MovieHandler',
        '/v1/users'                           => 'UsersHandler',
        '/v1/users/:number'                   => 'UserHandler',
        '/v1/users/:number/likes'             => 'LikesHandler',
        '/v1/users/:number/likes/:number'     => 'LikeHandler',
        '/v1/users/:number/dislikes'          => 'DislikesHandler',
        '/v1/users/:number/dislikes/:number'  => 'DislikeHandler',
        '/v1/users/:number/watched'           => 'WatchedAllHandler',
        '/v1/users/:number/watched/:number'   => 'WatchedHandler',
        '/v1/users/:number/watchlist'         => 'WatchlistAllHandler',
        '/v1/users/:number/watchlist/:number' => 'WatchlistHandler',

    ));

?>