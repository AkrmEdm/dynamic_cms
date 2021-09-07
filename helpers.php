<?php

/**
* Sanitizes and given variable
*/
function sanitizeItem($var, $type)
{
    $flags = NULL;
    switch($type) {
        case 'url':
            $filter = FILTER_SANITIZE_URL;
        break;
        case 'int':
            $filter = FILTER_SANITIZE_NUMBER_INT;
        break;
        case 'float':
            $filter = FILTER_SANITIZE_NUMBER_FLOAT;
            $flags = FILTER_FLAG_ALLOW_FRACTION | FILTER_FLAG_ALLOW_THOUSAND;
        break;
        case 'email':
            $var = substr($var, 0, 254);
            $filter = FILTER_SANITIZE_EMAIL;
        break;
        case 'string':
        default:
            $filter = FILTER_SANITIZE_STRING;
            $flags = FILTER_FLAG_NO_ENCODE_QUOTES;
        break;

    }

    $output = filter_var($var, $filter, $flags);
    return($output);
}

/**
* Validate the data and make sure the data is correct.
*/
function validateItem($var, $type)
{
    $flags = NULL;
    switch($type) {
        case 'email':
            $var = substr($var, 0, 254);
            $filter = FILTER_VALIDATE_EMAIL;
            break;
        case 'int':
            $filter = FILTER_VALIDATE_INT;
        break;
        case 'boolean':
            $filter = FILTER_VALIDATE_BOOLEAN;
        break;
        case 'ip':
            $filter = FILTER_VALIDATE_IP;
        break;
        case 'url':
            $filter = FILTER_VALIDATE_URL;
        break;

    }

    return filter_var($var, $filter);
}

/**
 * takes user back to form and show errors
 */
function goBack($msg = null)
{
    $link = $_SERVER['HTTP_REFERER'];
    header('Location:'.$link);

    //TODO Show error message using Session
}


/**
 * check if the value is present or not
 */
function isPresent($var)
{
    return isset($var) && trim($var != '');
}

/**
 * Remove harmful tags
 */
function sanitizeText($text)
{
    $allowed_tags = [
        'a',
        'p',
        'ul',
        'ol',
        'li',
        'table',
        'tr',
        'th',
        'td',
        'tbody',
        'b',
        'i'

    ];
    return strip_tags($text, $allowed_tags);
}

function redirect($url)
{
    $domain ='http://localhost/php-cms';

    header('Location:'.$domain.$url);
}