<?php

if (! function_exists('sanitizeItem')) {

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
}


if (! function_exists('validateItem')) {
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
}

if (! function_exists('goBack')) {
    /**
     * takes user back to form and show errors
     */
    function goBack($msg = null)
    {
        $link = $_SERVER['HTTP_REFERER'];
       
        if($msg) {
            $_SESSION['msg'] = $msg;
        }

        header('Location:'.$link);
    }
}

if (! function_exists('displayMessage')) {
    /**
     * Display any error messages
     */
    function displayMessage()
    {
        if(isset($_SESSION['msg'])) {
            $msg = $_SESSION['msg'];

            echo '<div class="alert alert-danger" role="alert">'.
                    $msg.
                    '</div>';

            unset($_SESSION['msg']);
        }
    }
}

if (! function_exists('isPresent')) {
    /**
     * check if the value is present or not
     */
    function isPresent($var)
    {
        return isset($var) && trim($var != '');
    }
}

if (! function_exists('sanitizeText')) {
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
}

if (! function_exists('redirect')) {
    function redirect($url)
    {
        $domain ='http://localhost/php-cms';

        header('Location:'.$domain.$url);
    }
}