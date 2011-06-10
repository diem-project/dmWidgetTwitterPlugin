<?php use_helper('Text'); use_helper('Date');

/*
 * A $tweet is an array containing:
 * - text:        text of the tweet
 * - profile_image_url: image of the tweet's author
 * - created_at:  when the tweet was posted, timestamp
 */

echo _open('ul');
$oe = 'odd';

$profile_image_url = '';
foreach($tweets as $tweet)
{

  echo _open('li.' . $oe);

    // render tweet author image
    if (!$profile_image_url && $show_profile_image && $tweet['profile_image_url']) {
      $profile_image_url = $tweet['profile_image_url'];
      if ($as_background) {
        echo _tag('div.tweet_profile_image style=background:url('.$tweet['profile_image_url'].')');
      } else {
        echo _media($tweet['profile_image_url'])->set('.tweet_profile_image');
      }
    }

    // render tweet text
    echo _tag('p.tweet_text', auto_link_text($tweet['text'])),

    // render tweet date
     _tag('p.tweet_date', format_date($tweet['created_at'], 'D'));
  
  echo _close('li');

  $oe = $oe == 'odd' ? 'even' : 'odd' ;

}

echo _close('ul');