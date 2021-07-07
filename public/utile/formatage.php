<?php

function afficherAlert($text, $type){
    $alertType = "";
    if($type === ALERT_SUCCESS) $alertType = "teal";
    if($type === ALERT_DANGER) $alertType = "tart-orange";
    if($type === ALERT_INFO) $alertType = "info";
    if($type === ALERT_WARNING) $alertType = "warning";
    $txt = '<div class="alert alert-'.$alertType.' m-2" role="alert">';
    $txt .= $text;
    $txt .= '</div>';
    return $txt;
}
