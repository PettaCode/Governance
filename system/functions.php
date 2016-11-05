<?php
/**
 * Functions - small collection of Framework wide interest functions.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 * @date April 12th, 2016
 */

use Config\Config;
use Support\Collection;
use Support\Str;

use Support\Facades\Crypt;
use Support\Facades\Facade;
use Support\Facades\Language;


if (! defined('NOVA_SYSTEM_FUNCTIONS')) {

define('NOVA_SYSTEM_FUNCTIONS', 1);

/**
 * Generate a url for the application.
 *
 * @param  string  $path
 * @param  mixed   $parameters
 * @param  bool    $secure
 * @return string
 */
function url($path = null, $parameters = array(), $secure = null)
{
    return app('url')->to($path, $parameters, $secure);
}

/**
 * Site URL helper
 * @param string $path
 * @return string
 */
function site_url($path = '/')
{
    return url($path);
}

/**
 * Resource URL helper
 * @param string $path
 * @param string|null $module
 * @return string
 */
function resource_url($path, $module = null)
{
    $basePath = ! is_null($module) ? sprintf('modules/%s', Str::snake($module)) : '';

    $path = sprintf('%s/assets/%s', $basePath, ltrim($path, '/'));

    return url($path);    
}

/**
 * Template URL helper
 * @param string $path
 * @param string $template
 * @return string
 */
function template_url($path, $template = null)
{
    $config = app('config');
    
    $template = $template ?: $config['app']['template'];
    
    $path = sprintf('templates/%s/assets/%s', Str::snake($template), ltrim($path, '/'));
    
    return url($path);    
}

/**
 * Get the path to the application folder.
 *
 * @param  string  $path
 * @return string
 */
function app_path($path = '')
{
    $path = ! empty($path) ? DS .$path : '';

    return app('path') .$path;
}

/**
 * Get the path to the base of the install.
 *
 * @param  string  $path
 * @return string
 */
function base_path($path = '')
{
    $path = ! empty($path) ? DS .$path : '';

    return app('path.base') .$path;
}

/**
 * Get the path to the storage folder.
 *
 * @param   string  $path
 * @return  string
 */
function storage_path($path = '')
{
    $path = ! empty($path) ? DS .$path : '';

    return app('path.storage') .$path;
}

/**
 * Get the path to the public folder.
 *
 * @param  string  $path
 * @return string
 */
function public_path($path = '')
{
    $path = ! empty($path) ? DS .$path : '';

    return app('path.public') .$path;
}


//
// I18N functions

/**
 * Get the formatted and translated message back.
 *
 * @param string $message English default message
 * @param mixed $args
 * @return string|void
 */
function __($message, $args = null)
{
    if (! $message) return '';

    //
    $params = (func_num_args() === 2) ? (array)$args : array_slice(func_get_args(), 1);

    return Language::instance('app')->translate($message, $params);
}

/**
 * Get the formatted and translated message back with Domain.
 *
 * @param string $domain
 * @param string $message
 * @param mixed $args
 * @return string|void
 */
function __d($domain, $message, $args = null)
{
    if (! $message) return '';

    //
    $params = (func_num_args() === 3) ? (array)$args : array_slice(func_get_args(), 2);

    return Language::instance($domain)->translate($message, $params);
}

/**
 * Get the root Facade application instance.
 *
 * @param  string  $make
 * @return mixed
 */
function app($make = null)
{
    if (! is_null($make)) {
        return app()->make($make);
    }

    return Facade::getFacadeApplication();
}

/**
 * Generate a URL to a named route.
 *
 * @param  string  $name
 * @param  array   $parameters
 * @param  bool  $absolute
 * @param  \Routing\Route $route
 * @return string
 */
function route($name, $parameters = array(), $absolute = true, $route = null)
{
    return app('url')->route($name, $parameters, $absolute, $route);
}

/**
 * Generate a URL to a controller action.
 *
 * @param  string  $name
 * @param  array   $parameters
 * @return string
 */
function action($name, $parameters = array())
{
    return app('url')->action($name, $parameters);
}

/**
 * Create a collection from the given value.
 *
 * @param  mixed  $value
 * @return \Support\Collection
 */
function collect($value = null)
{
    return Collection::make($value);
}


/** Array helpers. */

/**
 * Add an element to an array if it doesn't exist.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $value
 * @return array
 */
function array_add($array, $key, $value)
{
    if (! isset($array[$key])) $array[$key] = $value;

    return $array;
}

/**
 * Build a new array using a callback.
 *
 * @param  array  $array
 * @param  \Closure  $callback
 * @return array
 */
function array_build($array, Closure $callback)
{
    $results = array();

    foreach ($array as $key => $value) {
        list($innerKey, $innerValue) = call_user_func($callback, $key, $value);

        $results[$innerKey] = $innerValue;
    }

    return $results;
}

/**
 * Divide an array into two arrays. One with keys and the other with values.
 *
 * @param  array  $array
 * @return array
 */
function array_divide($array)
{
    return array(array_keys($array), array_values($array));
}

/**
 * Flatten a multi-dimensional associative array with dots.
 *
 * @param  array   $array
 * @param  string  $prepend
 * @return array
 */
function array_dot($array, $prepend = '')
{
    $results = array();

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $results = array_merge($results, array_dot($value, $prepend.$key.'.'));
        } else {
            $results[$prepend.$key] = $value;
        }
    }

   return $results;
}

/**
 * Get all of the given array except for a specified array of items.
 *
 * @param  array  $array
 * @param  array  $keys
 * @return array
 */
function array_except($array, $keys)
{
    return array_diff_key($array, array_flip((array) $keys));
}

/**
 * Fetch a flattened array of a nested array element.
 *
 * @param  array   $array
 * @param  string  $key
 * @return array
 */
function array_fetch($array, $key)
{
    foreach (explode('.', $key) as $segment) {
        $results = array();

        foreach ($array as $value) {
            $value = (array) $value;

            $results[] = $value[$segment];
        }

        $array = array_values($results);
    }

    return array_values($results);
}

/**
 * Return the first element in an array passing a given truth test.
 *
 * @param  array    $array
 * @param  Closure  $callback
 * @param  mixed    $default
 * @return mixed
 */
function array_first($array, $callback, $default = null)
{
    foreach ($array as $key => $value) {
        if (call_user_func($callback, $key, $value)) return $value;
    }

    return value($default);
}

/**
 * Return the last element in an array passing a given truth test.
 *
 * @param  array    $array
 * @param  Closure  $callback
 * @param  mixed    $default
 * @return mixed
 */
function array_last($array, $callback, $default = null)
{
    return array_first(array_reverse($array), $callback, $default);
}

/**
 * Flatten a multi-dimensional array into a single level.
 *
 * @param  array  $array
 * @return array
 */
function array_flatten($array)
{
    $return = array();

    array_walk_recursive($array, function($x) use (&$return) { $return[] = $x; });

    return $return;
}

/**
 * Get an item from an array using "dot" notation.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function array_get($array, $key, $default = null)
{
    if (is_null($key)) return $array;

    if (isset($array[$key])) return $array[$key];

    foreach (explode('.', $key) as $segment) {
        if (! is_array($array) || ! array_key_exists($segment, $array)) {
            return $default;
        }

        $array = $array[$segment];
    }

    return $array;
}

/**
 * Set an array item to a given value using "dot" notation.
 *
 * If no key is given to the method, the entire array will be replaced.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $value
 * @return array
 */
function array_set(&$array, $key, $value)
{
    if (is_null($key)) return $array = $value;

    $keys = explode('.', $key);

    while (count($keys) > 1) {
        $key = array_shift($keys);

        if (! isset($array[$key]) || ! is_array($array[$key])) {
            $array[$key] = array();
        }

        $array =& $array[$key];
    }

    $array[array_shift($keys)] = $value;

    return $array;
}

/**
 * Get a subset of the items from the given array.
 *
 * @param  array  $array
 * @param  array  $keys
 * @return array
 */
function array_only($array, $keys)
{
    return array_intersect_key($array, array_flip((array) $keys));
}

/**
 * Remove an array item from a given array using "dot" notation.
 *
 * @param  array   $array
 * @param  string  $key
 * @return void
 */
function array_forget(&$array, $key)
{
    $keys = explode('.', $key);

    while (count($keys) > 1) {
        $key = array_shift($keys);

        if (! isset($array[$key]) || ! is_array($array[$key])) {
            return;
        }

        $array =& $array[$key];
    }

    unset($array[array_shift($keys)]);
}

/**
 * Pluck an array of values from an array.
 *
 * @param  array   $array
 * @param  string  $value
 * @param  string  $key
 * @return array
 */
function array_pluck($array, $value, $key = null)
{
    $results = array();

    foreach ($array as $item) {
        $itemValue = is_object($item) ? $item->{$value} : $item[$value];

        // If the key is "null", we will just append the value to the array and keep
        // looping. Otherwise we will key the array using the value of the key we
        // received from the developer. Then we'll return the final array form.
        if (is_null($key)) {
            $results[] = $itemValue;
        } else {
            $itemKey = is_object($item) ? $item->{$key} : $item[$key];

            $results[$itemKey] = $itemValue;
        }
    }

    return $results;
}

/**
 * Get a value from the array, and remove it.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function array_pull(&$array, $key, $default = null)
{
    $value = array_get($array, $key, $default);

    array_forget($array, $key);

    return $value;
}

/**
 * Sort the array using the given Closure.
 *
 * @param  array  $array
 * @param  \Closure  $callback
 * @return array
 */
function array_sort($array, Closure $callback)
{
    return \Support\Collection::make($array)->sortBy($callback)->all();
}

/**
 * Filter the array using the given Closure.
 *
 * @param  array  $array
 * @param  \Closure  $callback
 * @return array
 */
function array_where($array, Closure $callback)
{
    $filtered = array();

    foreach ($array as $key => $value) {
        if (call_user_func($callback, $key, $value)) $filtered[$key] = $value;
    }

    return $filtered;
}

/**
 * Get the first element of an array.
 *
 * @param  array  $array
 * @return mixed
 */
function head($array)
{
    return reset($array);
}

/**
 * Get the last element from an array.
 *
 * @param  array  $array
 * @return mixed
 */
function last($array)
{
    return end($array);
}

/** String helpers. */

/**
 * Determine if a given string matches a given pattern.
 *
 * @param  string  $pattern
 * @param  string  $value
 * @return bool
 */
function str_is($pattern, $value)
{
    return Str::is($pattern, $value);
}

/**
 * Determine if a given string contains a given substring.
 *
 * @param  string  $haystack
 * @param  string|array  $needles
 * @return bool
 */
function str_contains($haystack, $needles)
{
    return Str::contains($haystack, $needles);
}

/**
 * Test for string starts with
 * @param $haystack
 * @param $needle
 * @return bool
 */
function str_starts_with($haystack, $needle)
{
    return Str::startsWith($haystack, $needle);
}

/**
 * Test for string ends with
 * @param $haystack
 * @param $needle
 * @return bool
 */
function str_ends_with($haystack, $needle)
{
    return Str::endsWith($haystack, $needle);
}

/**
 * Generate a random alpha-numeric string.
 *
 * @param  int     $length
 * @return string
 *
 * @throws \RuntimeException
 */
function str_random($length = 16)
{
    return Str::random($length);
}

/**
 * Replace a given value in the string sequentially with an array.
 *
 * @param  string  $search
 * @param  array   $replace
 * @param  string  $subject
 * @return string
 */
function str_replace_array($search, array $replace, $subject)
{
    foreach ($replace as $value) {
        $subject = preg_replace('/' .$search .'/', $value, $subject, 1);
    }

    return $subject;
}

/**
 * Escape HTML entities in a string.
 *
 * @param  string  $value
 * @return string
 */
function e($value)
{
    return htmlentities($value, ENT_QUOTES, 'UTF-8', false);
}

/**
 * Class name helper
 * @param string $className
 * @return string
 */
function class_basename($class)
{
    $className = is_object($class) ? get_class($class) : $class;

    return basename(str_replace('\\', '/', $className));
}

/**
 * Returns all traits used by a trait and its traits
 *
 * @param  string  $trait
 * @return array
 */
function trait_uses_recursive($trait)
{
    $traits = class_uses($trait);

    foreach ($traits as $trait) {
        $traits += trait_uses_recursive($trait);
    }

    return $traits;
}

/**
 * Returns all traits used by a class, it's subclasses and trait of their traits
 *
 * @param  string  $class
 * @return array
 */
function class_uses_recursive($class)
{
    $results = [];

    foreach (array_merge([$class => $class], class_parents($class)) as $class) {
        $results += trait_uses_recursive($class);
    }

    return array_unique($results);
}

/**
 * Determine if the given object has a toString method.
 *
 * @param  object  $object
 * @return bool
 */
function str_object($object)
{
    return (is_object($object) && method_exists($object, '__toString'));
}

/**
 * Return the default value of the given value.
 *
 * @param  mixed  $value
 * @return mixed
 */
function value($value)
{
    return $value instanceof Closure ? $value() : $value;
}

/**
 * Return the given object.
 *
 * @param  mixed  $object
 * @return mixed
 */
function with($object)
{
        return $object;
}

/** Common data lookup methods. */

/**
 * Get an item from an array or object using "dot" notation.
 *
 * @param  mixed   $target
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function data_get($target, $key, $default = null)
{
    if (is_null($key)) return $target;

    foreach (explode('.', $key) as $segment) {
        if (is_array($target)) {
            if (! array_key_exists($segment, $target)) {
                return value($default);
            }

            $target = $target[$segment];
        } elseif (is_object($target)) {
            if (! isset($target->{$segment})) {
                return value($default);
            }

            $target = $target->{$segment};
        } else  {
            return value($default);
        }
    }

    return $target;
}

/**
 * Get an item from an object using "dot" notation.
 *
 * @param  object  $object
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function object_get($object, $key, $default = null)
{
    if (is_null($key) || trim($key) == '') return $object;

    foreach (explode('.', $key) as $segment) {
        if (! is_object($object) || ! isset($object->{$segment})) {
            return value($default);
        }

        $object = $object->{$segment};
    }

    return $object;
}

/**
 * Dump the passed variables and end the script.
 *
 * @param  dynamic  mixed
 * @return void
 */
function dd()
{
    array_map(function($x) { var_dump($x); }, func_get_args()); die;
}

/**
 * print_r call wrapped in pre tags
 *
 * @param  string or array $data
 * @param  boolean $exit
 */
function pr($data, $exit = false)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    if ($exit == true) {
        exit;
    }
}

/**
 * var_dump call
 *
 * @param  string or array $data
 * @param  boolean $exit
 *
 */
function vd($data, $exit = false)
{
    var_dump($data);

    if ($exit == true) {
        exit;
    }
}

/**
 * strlen call - count the length of the string.
 *
 * @param  string $data
 * @return string return the count
 */
function sl($data)
{
    return strlen($data);
}

/**
 * strtoupper - convert string to uppercase.
 *
 * @param  string $data
 * @return string
 */
function stu($data)
{
    return strtoupper($data);
}

/**
 * strtolower - convert string to lowercase.
 *
 * @param  string $data
 * @return string
 */
function stl($data)
{
    return strtolower($data);
}

/**
 * ucwords - the first letter of each word to be a capital.
 *
 * @param  string $data
 * @return string
 */
function ucw($data)
{
    return ucwords($data);
}

/**
 * key - this will generate a 32 character key
 * @return string
 */
function createKey($length = 32)
{
    return str_random($length);
}

/**
 * addhttp - this will ensire $url starts with http
 *
 * @param $url string
 * @param $scheme string
 * @return string
 */

function add_http($url, $scheme = 'http://')
{
    return parse_url($url, PHP_URL_SCHEME) === null ? $scheme . $url : $url;
}

}
