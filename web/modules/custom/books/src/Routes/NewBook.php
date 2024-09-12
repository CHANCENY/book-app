<?php

namespace Mini\Modules\custom\books\src\Routes;

use Mini\Cms\Controller\ControllerInterface;
use Mini\Cms\Controller\Request;
use Mini\Cms\Controller\Response;
use Mini\Cms\Mini;
use Mini\Cms\Services\Services;
use Mini\Modules\custom\books\src\Modal\BookCategory;
use Mini\Modules\custom\books\src\Modal\Books;
use Symfony\Component\HttpFoundation\Request as RequestAlias;
use Throwable;

class NewBook implements ControllerInterface
{

    private Books $books;

    private BookCategory $bookCategory;

    public function __construct(private Request &$request, private Response &$response)
    {
        $this->books = new Books();
        $this->bookCategory = new BookCategory();
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
        if($this->request->isMethod(RequestAlias::METHOD_POST)) {

            if($this->request->request->has('title') && $this->request->request->has('book_category') && $this->request->request->has('status') &&
             $this->request->request->has('description') && $this->request->request->has('thumbnail')) {

                if($this->request->request->has('pdf')) {
                    $data = [
                        'title' => $this->request->request->get('title'),
                        'category_id' => $this->request->request->get('book_category'),
                        'status' => $this->request->request->get('status'),
                        'description' => $this->request->request->get('description'),
                        'thumbnail' => $this->request->request->get('thumbnail'),
                        'isbn' => $this->request->request->get('isbn',time()),
                        'pdf_id' => $this->request->request->get('pdf')
                    ];
                    $result = $this->books->store($data);
                    if($result) {
                        Mini::messenger()->addMessage("Book added successfully");
                        Mini::redirect($this->request->headers->get('referer'))->send();
                    }
                }
            }
        }
        $this->response->write(Services::create('render')->render('add_new_book.php',['categories' => $this->bookCategory->all()->getRecords()]));
    }

    public function newCategoryCreationForm(): void
    {
        if($this->request->isMethod(RequestAlias::METHOD_POST)) {
            try{
                if($this->bookCategory->store($this->request->request->all())){
                    Mini::messenger()->addMessage("Category added successfully");
                    Mini::redirect($this->request->headers->get('referer'))->send();
                }
            }catch (Throwable $exception) {
                Mini::messenger()->addErrorMessage("Error creating new category, Note category name can not be repeated or left empty");
            }
        }
        $this->response->write(Services::create('render')->render('new_category_form.php'));
    }

    public function CategoryCreation(): void
    {
        $this->response->write(Services::create('render')->render('category_page.php', ['categories' => $this->bookCategory->all()->getRecords()]));
    }

    public function booksListingByCategory(): void
    {
        $category_id = $this->request->query->get('category_id');
        $this->response->write(Services::create('render')->render('books.php', ['books' => $this->books->get($category_id, 'category_id')->getRecords()]));
    }

    public function bookReading(): void
    {
        $book_id = $this->request->query->get('book_id');
        if($book_id) {

            $book = $this->books->get($book_id)->getAt(0);
            Mini::currentRoute()->setRouteTitle($book->title);
            $this->response->write(Services::create('render')->render('book_reading.php', ['book' => $book]));
        }
    }
}