<?php
  $current_url = $_SERVER['REQUEST_URI']; 

  $current_url_params = array();
  preg_match('/\?(.*)/', $current_url, $current_url_params);

  $campaign_id = get_option('campaign_id');
?>

<html>
  <head>
    <title>
      <?php echo get_option('giveaway_title') ? get_option('giveaway_title') : get_bloginfo('name') ?>
    </title>
  </head>
  <body>
    <style>
      html, body{
        margin:0px !important; 
        overflow: hidden;
      }

      iframe {
        width: 100%; 
        height: 100%; 
        border: none;
      }
    </style>

    <iframe src="<?php echo 'http://giveaways.dojomojo.ninja/landing/hosting-embed/' . $campaign_id . $current_url_params[0] ?>"></iframe>
  </body>
</html>