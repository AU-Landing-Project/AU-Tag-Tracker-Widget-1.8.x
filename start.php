<?php

// setup
function au_tagtracker_init(){
  elgg_register_widget_type('au_tagtracker', elgg_echo('au_tagtracker'), elgg_echo('au_tagtracker:description'), 'index,profile,dashboard,groups', TRUE);  
}


//
// custom select
// we need to make sure that tags are entered, or we invalidate it
function au_tagtracker_custom_select($widget, $vars, $options){
  // get based on tags
  // priority goes to $vars as it's ajax populated, then saved $widget
  $tags = $vars['eligo_tagfilter'] ? $vars['eligo_tagfilter'] : FALSE;
  if(!$tags){
    $tags = $widget->eligo_tagfilter ? $widget->eligo_tagfilter : '';
  }
  
  if(empty($tags)){
    // invalidate the query
    $options['subtypes'] = array('eligo_invalidate_query');
  }
  
  return $options;
}


elgg_register_event_handler('init', 'system', 'au_tagtracker_init');
