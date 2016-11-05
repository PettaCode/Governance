<?php
/**
 * Routing Filters - all Module's specific Routing Filters are defined here.
 *
 * @author Virgil-Adrian Teaca - virgil@giulianaeassociati.com
 * @version 3.0
 */


/** Define Route Filters. */

// A Testing Filter which dump the matched Route.
Route::filter('test', function($route, $request) {
    echo '<pre style="margin: 10px;">' .htmlspecialchars(var_export($route, true)) .'</pre>';
});
