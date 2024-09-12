<?php

namespace Mini\Modules\custom\books\src\Routes;

use Mini\Cms\Controller\ControllerInterface;
use Mini\Cms\Controller\Request;
use Mini\Cms\Controller\Response;
use Mini\Cms\Controller\StatusCode;
use Mini\Cms\Mini;

class Error implements ControllerInterface
{

    public function __construct(private Request &$request, private Response &$response)
    {
    }

    /**
     * @inheritDoc
     */
    public function isAccessAllowed(): bool
    {
        return true;
    }

    public function writeBody(): void
    {
        $error_name = $this->request->get('error_name', '404');
        $error_title = 'Error';
        $error_message = 'Error happened while looking up the page.';
        switch ($error_name) {
            case '404':
                $error_title = 'Page not found';
                $error_message = 'The page you are looking for could not be found.';
                break;
            case '403':
                $error_title = 'Forbidden';
                $error_message = 'You do not have permission to view this page.';
                break;
            case '500':
                $error_title = 'Internal Server Error';
                break;
            case '503':
                $error_title = 'Service Unavailable';
                break;
            default:
                $error_title = 'Oops something went wrong';
                $error_message = 'Sorry, something went wrong.';
                break;
        }
        Mini::currentRoute()->setRouteTitle($error_title);
        $this->response->setStatusCode(StatusCode::OK)
            ->write('<main><div class="form-wrapper"><h1>'.$error_title.'</h1><p>'.$error_message.'</p></div></main>');

    }
}