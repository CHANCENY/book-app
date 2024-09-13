<?php

namespace Mini\Modules\custom\books\src\Routes;

use Mini\Cms\Connections\Database\Database;
use Mini\Cms\Connections\Database\Queries\QueryManager;
use Mini\Cms\Controller\ContentType;
use Mini\Cms\Controller\ControllerInterface;
use Mini\Cms\Controller\Request;
use Mini\Cms\Controller\Response;
use Mini\Cms\Controller\StatusCode;
use Mini\Cms\Mini;
use Mini\Cms\Modules\CurrentUser\CurrentUser;
use Mini\Modules\custom\books\src\Modal\Statics;

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

    public function eventEmitter(): void
    {
        $book_id = json_decode($this->request->getContent())->book_id;
        $event_title = json_decode($this->request->getContent())->event_title;
        $statical_modal = new Statics();
        if($book_id && $event_title) {
            $statical_modal->get((new CurrentUser())->id(), 'statical_user');
            $statical_modal->update(['statical_active'=>2],(new CurrentUser())->id());

            $statical_modal = new Statics();
            $book = $statical_modal->get($book_id,'statical_book')->getAt(0);
            if($book) {
                $statical_modal->update(['statical_active'=> $event_title === 'Opened','statical_time' => time()],$book_id);
            }
            else {
                $data = [
                    'statical_active'=>1,
                    'statical_book'=>$book_id,
                    'statical_type' => 'STATICAL_READ',
                    'statical_user' => (new CurrentUser())->id(),
                    'statical_time' => time(),
                ];
                $statical_modal->store($data);
            }
            $this->response->setStatusCode(StatusCode::OK)
                ->setContentType(ContentType::APPLICATION_JSON)
                ->write(json_encode(['book_id' => $book_id, 'event_title' => $event_title]));
        }
        else {
            $this->response->setStatusCode(StatusCode::BAD_REQUEST)
                ->setContentType(ContentType::APPLICATION_JSON)
                ->write(json_encode(['book_id' => null, 'event_title' => null]));
        }
    }
}