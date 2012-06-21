<?php

$widget = $vars['entity'];

// since we are relying on tags, and not filtering by
// subtype, we need to make sure that
// there are actually tags to use, otherwise output nothing

if(!empty($widget->eligo_tagfilter)){
  $options = eligo_get_display_entities_options($widget);
  $content = elgg_list_entities($options);
}
else{
  $content = elgg_echo('au_tagtracker:enter:tags');
}

if(!$content){
  $content = elgg_echo('au_tagtracker:no:results');  
}

echo $content;
