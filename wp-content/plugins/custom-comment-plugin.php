<?php
/*
Plugin Name: Send Comment to API
Description: Sends a POST request to an API with comment content.
Version: 1.0
Author: Surprise Mnisi
*/

// Hook into the comment submission process
add_action('comment_post', 'send_comment_to_api', 10, 2);

function send_comment_to_api($comment_ID, $comment_approved)
{
    $comment = get_comment($comment_ID);

    // Prepare the comment data
    $comment_content = $comment->comment_content;

    // API endpoint URL
    $api_url = 'https://comments-api.herokuapp.com/api/comments?content=' . urlencode($comment_content);

    // Send a POST request to the API
    wp_remote_post($api_url, array(
        'method' => 'POST',
    ));
}
