<?php

namespace Mini\Modules\custom\books\src\Routes;

use Mini\Cms\Controller\ContentType;
use Mini\Cms\Controller\ControllerInterface;
use Mini\Cms\Controller\Request;
use Mini\Cms\Controller\Response;
use Mini\Cms\Controller\StatusCode;

class DashboardEndpoints implements ControllerInterface
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
        $type_query = $this->request->get('type');
        if(!empty($type_query)) {

            $data = [];
            switch ($type_query) {
                case 'books_recent_authors':
                    $data = get_global('books_recent_authors');
                    break;
                case 'recent_books':
                    $data = books_recent_dashboard();
                    break;
            }
            $this->response->setContentType(ContentType::APPLICATION_JSON)
                ->setStatusCode(StatusCode::OK)
                ->write($data);
        }
        else {
            $this->response->setStatusCode(StatusCode::NOT_FOUND);
        }
    }
}