<?php

namespace App\Modules\Demos\Controllers;

use App\Core\Controller;

use Routing\Route;

use App\Models\User;

use App;
use Cache;
use DB;
use Event;
use Hash;
use Input;
use Mailer;
use Module;
use Redirect;
use Request;
use Session;
use Validator;
use View;


/*
*
* Demo controller
*/
class Demos extends Controller
{
    /**
     * Define Index method
     */
    public function index()
    {
        echo 'hello';
    }

    public function password($password)
    {
        $content = '';

        $content .= '<p><b>' .__d('demos', 'Password:') .'</b> : <code>'. Hash::make($password) .'</code></p>';

        $content .= '<p><b>' .__d('demos', 'Timestamp:') .'</b> : <code>'.time() .'<b></code>';

        return View::make('Default')
            ->shares('title', __d('demos', 'Password Sample'))
            ->with('content', $content);
    }

    public function test()
    {
        $request = Request::instance();
    
        $uri = 'demo/test/{param1?}/{param2?}/{param3?}/{slug?}';

        //
        $route = new Route('GET', $uri, function()
        {
            echo 'Hello, World!';

        });
        
        $route->where('slug', '(.*)');

        // Match the Route.
        if ($route->matches($request)) {
            $route->bind($request);

            $content = '<pre>Route matched!</pre>';
        } else {
            $content = '<pre>Route not matched!</pre>';
        }

        $content .= '<pre>' .htmlspecialchars(var_export($route, true)) .'</pre>';

        return View::make('Default')
            ->shares('title', __d('demos', 'Test'))
            ->with('content', $content);
    }

    public function request($param1 = '', $param2 = '', $param3 = '', $param4 = '')
    {
        $content = '<pre>' .var_export(gethostname(), true).'</pre>';

        //
        $app = App::instance();

        $content .= '<pre>' .var_export($app['env'], true).'</pre>';

        //
        $content .= '<pre>' .var_export(Request::root(), true).'</pre>';

        $content .= '<pre>' .var_export(Request::url(), true).'</pre>';

        $content .= '<pre>' .var_export(Request::path(), true).'</pre>';

        $content .= '<pre>' .var_export(Request::segments(), true).'</pre>';

        $content .= '<pre>' .var_export(Request::segment(1), true).'</pre>';

        $content .= '<pre>' .var_export(Request::isGet(), true).'</pre>';

        $content .= '<pre>' .var_export(Request::isPost(), true).'</pre>';

        $content .= '<pre>' .var_export(Input::all(), true).'</pre>';

        $content .= '<pre>' .var_export(Request::instance(), true).'</pre>';

        return View::make('Default')
            ->shares('title', __d('demos', 'Request API'))
            ->with('content', $content);
    }

    public function events()
    {
        $content = '';

        // Prepare the Event payload.
        $payload = array(
            'Hello, this is Event sent from ' .str_replace('::', '@', __METHOD__)
        );

        // Fire the Event 'test' and store the results.
        $results = Event::fire('test', $payload);

        // Print out the non-empty results returned by Event firing.
        $content .= implode('', array_filter($results, 'strlen')) .'<br>';

        // Fire the Event 'test' and echo the result.
        $content .= Event::until('test', $payload);

        return View::make('Default')
            ->shares('title', __d('demos', 'Events API'))
            ->with('content', $content);
    }

    public function database()
    {
        $content = '';

        //
        $query = DB::table('users')->where('username', 'admin');

        $sql = $query->toSql();

        $user = $query->first();

        $content .= '<pre>' .var_export($sql, true) .'</pre>';
        $content .= '<pre>' .var_export($user, true) .'</pre>';

        //
        $user = User::find(1);

        $content .= '<pre>' .var_export($user->toArray(), true) .'</pre>';

        //
        $users = User::all();

        $content .= '<pre>' .var_export($users->toArray(), true) .'</pre>';

        //
        $users = User::where('username', '!=', 'admin')->orderBy('username', 'desc')->get();

        $content .= '<pre>' .var_export($users->toArray(), true) .'</pre>';

        return View::make('Default')
            ->shares('title', __d('demos', 'Database API'))
            ->with('content', $content);
    }

    public function mailer()
    {
        $data = array(
            'title'   => __d('demos', 'Welcome to {0}!', SITETITLE),
            'content' => __d('demos', 'This is a test!!!'),
        );

        Mailer::pretend(true);

        Mailer::send('Emails/Welcome', $data, function($message)
        {
            $message->from('admin@novaframework', 'Administrator')
                ->to('john@novaframework', 'John Smith')
                ->subject('Welcome!');
        });

        // Prepare and return the View instance.
        $content = __d('demos', 'Message sent while pretending. Please, look on <code>{0}</code>', 'app/Storage/Logs/messages.log');

        return View::make('Default')
            ->shares('title', __d('demos', 'Mailing API'))
            ->with('content', $content);
    }

    public function session()
    {
        $content = '';

        $content .= '<pre>' .var_export(Session::get('language'), true) .'</pre>';

        $data = Session::all();

        $content .= '<pre>' .var_export($data, true) .'</pre>';

        return View::make('Default')
            ->shares('title', __d('demos', 'Session API'))
            ->with('content', $content);
    }

    public function validate()
    {
        $data = array(
            'username' => 'michael',
            'password' => 'password',
            'email'    => 'michael@novaframework.dev'
        );

        $rules = array(
            'username' => 'required|min:3|max:50|alpha_dash|unique:users',
            'password' => 'required|between:4,30',
            'email'    => 'required|email|max:100|unique:users',
        );

        $validator = Validator::make($data, $rules);

        //
        $content = '';

        if ($validator->passes()) {
            $content .= '<h3>Data validated with success!</h3>';

            $content .= '<pre>' .var_export($data, true) .'</pre>';
        } else {
            $errors = $validator->errors()->all();

            $content .= '<pre>' .var_export($errors, true) .'</pre>';
        }

        return View::make('Default')
            ->shares('title', __d('demos', 'Validation API'))
            ->with('content', $content);
    }

    public function paginate()
    {
        $paginate = DB::table('posts')->paginate(2);

        $paginate->appends(array(
            'testing'  => 1,
            'example' => 'the_example_string',
        ));

        $content = $paginate->links();

        foreach ($paginate as $post) {
            $content .= '<h3>' .$post->title .'</h3>';

            $content .= $post->content;

            $content .= '<br><br>';
        }

        return View::make('Default')
            ->shares('title', __d('demos', 'Pagination'))
            ->with('content', $content);
    }

    public function cache()
    {
        $key = "test_page";

        $content = Cache::get($key);

        if (is_null($content)) {
            $content = "Files Cache --> Well done !";

            // Write products to Cache in 10 minutes with same keyword
            Cache::put($key, $content, 10);
        } else {
            $content = "READ FROM CACHE // " .$content;
        }

        return View::make('Default')
            ->shares('title', __d('demos', 'Cache'))
            ->with('content', $content);
    }

    public function modules()
    {
        $modules = Module::getModules();

        $content = "<h3 style='text-align: center'>" .__d('demos', 'The Modules configured on this Application') ."</h3>
<table class='table table-striped table-hover responsive'>
    <tr class='bg-navy disabled'>
        <th style='text-align: center; vertical-align: middle;'>" .__d('demos', 'Name') ."</th>
        <th style='text-align: center; vertical-align: middle;'>" .__d('demos', 'Slug') ."</th>
        <th style='text-align: center; vertical-align: middle;'>" .__d('demos', 'Enabled') ."</th>
        <th style='text-align: center; vertical-align: middle;'>" .__d('demos', 'Order') ."</th>
        <th style='text-align: center; vertical-align: middle;'>" .__d('demos', 'Autoload') ."</th>
    </tr>";

        $modules->each(function($properties) use (&$content)
        {
            $name  = array_get($properties,'name');
            $slug  = array_get($properties,'slug');
            $order = array_get($properties,'order');

            //
            $enabled = array_get($properties,'enabled', true) ? __d('demos', 'Yes') : __d('demos', 'No');

            //
            $autoload = implode(', ', array_get($properties, 'autoload'));

            $content .= "
    <tr>
        <td style='text-align: center; vertical-align: middle;' width='20%'>$name</td>
        <td style='text-align: center; vertical-align: middle;' width='20%'>$slug</td>
        <td style='text-align: center; vertical-align: middle;' width='15%'>$enabled</td>
        <td style='text-align: center; vertical-align: middle;' width='15%'>$order</td>
        <td style='text-align: center; vertical-align: middle;' width='45%'>$autoload</td>
    <tr>";

        });

        $content .= "
</table>
";

        return View::make('Default')
            ->shares('title', __d('demos', 'Modules'))
            ->with('content', $content);
    }

    public function catchAll($slug)
    {
        $content = '<pre>' .htmlspecialchars($slug) .'</pre>';

        return View::make('Default')
            ->shares('title', __d('demos', 'The catch-all Route'))
            ->with('content', $content);
    }
}
