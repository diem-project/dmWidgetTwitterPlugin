<?php use_helper('Text');

/*
 * A $tweet is an array containing:
 * - from_user:   username of the one who posted the tweet
 * - text:        text of the tweet
 * - profile_image_url: text tweet author's profilem image
 * - created_at:  when the tweet was posted, timestamp
 */

echo _open('ul');
$oe = 'odd';

foreach($tweets as $tweet)
{

  echo _open('li.' . $oe);

    if ($show_profile_image && $tweet['profile_image_url']) {
      $profile_image_url = $tweet['profile_image_url'];
      if ($as_background) {
        echo _tag('div.tweet_profile_image style=background:url('.$tweet['profile_image_url'].')');
      } else {
        echo _media($tweet['profile_image_url'])->set('.tweet_profile_image');
      }
    }

    // link to the user page on twitter
    echo _link('http://twitter.com/'.$tweet['from_user'])
    ->text($tweet['from_user'])
    ->set('.tweet_from_user').

    // render tweet text
    _tag('p.tweet_text', auto_link_text($tweet['text']))
  
    ;
    
  echo _close('li');
  
  $oe = $oe == 'odd' ? 'even' : 'odd' ;

}

echo _close('ul');