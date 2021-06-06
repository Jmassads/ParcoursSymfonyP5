<?php

// Simple page redirect
function redirect($page)
{
    header('location: ' . URL . '' .$page);
}

function flash($name = '', $message = '', $class = 'px-4 py-4 text-japanese-laurel')
{
    // No message, create it
    // example flash('chapter_message', 'Chapitre ajouté sans image');
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }

            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        }
        //Message exists, display it
        // example flash('chapter_message')
        elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}