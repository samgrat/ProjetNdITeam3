<?php

/**
 * infoclimat query function
 * @param string $urlcomponent (after the prefix)
 * @param array (associative) GET parameters (ex. ['language' => 'fr'])
 * @return string $content
**/
function infoget($long, $lat, $params=null) {
    $apisufix = '&_auth=ABoAFwV7XX8EKVdgUiQHLlgwVGELfQEmAHwDYFg9AH1VPgNiVDQBZ18xVypUewcxUXwGZQE6UGBWPVUtDX8FZABqAGwFbl06BGtXMlJ9ByxYdlQ1CysBJgBiA2dYNQB9VTcDblQ3AX1fMlc8VHoHMVFmBmABIVB3VjRVNw1hBWQAZQBsBWNdPwRpVzdSfQcsWG5UZQs2ATAAMQMwWGEANlU%2BAzFUPwEwXzJXPFR6BzBRYwZmAT9Qa1YwVTYNZQV5AHwAHQUVXSIEK1d3UjcHdVh2VGELagFt&_c=2ec1f7704a082f63af6a553f7457f127';
    $apicoord = $long . "," . $lat;
    $apiprefix = 'http://www.infoclimat.fr/public-api/gfs/json';

	  $targeturl = $apiprefix . '?_ll=' .  $apicoord . $apisufix;
    $targeturl .= (isset($params) ? '&' . http_build_query($params) : '');
    $stringcontent = file_get_contents($targeturl);
    $content = json_decode($stringcontent, true);

    return $content;
}

$paris = infoget("48.866667", "2.333333");
var_dump($paris);

?>
