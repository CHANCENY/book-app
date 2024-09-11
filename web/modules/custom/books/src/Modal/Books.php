<?php

namespace Mini\Modules\custom\books\src\Modal;

use Mini\Cms\Modules\Modal\ColumnClassNotFound;
use Mini\Cms\Modules\Modal\Columns\Number;
use Mini\Cms\Modules\Modal\Columns\VarChar;
use Mini\Cms\Modules\Modal\Modal;
use Mini\Cms\Modules\Modal\PrimaryKeyColumnMissing;

class Books extends Modal
{
    protected string $main_table = 'books';

    /**
     * @throws ColumnClassNotFound
     * @throws PrimaryKeyColumnMissing
     */
    public function __construct()
    {
        $this->columns = array(
            self::buildColumnInstance(Number::class)->name('book_id')->size(11)->parent($this)->autoIncrement(true)
            ->primary(true)->description("book ID"),
            self::buildColumnInstance(VarChar::class)->name('title')->size(255)->parent($this)->description('book title'),
            self::buildColumnInstance(VarChar::class)->name('isbn')->size(255)->parent($this)->description('book isbn'),
        );

        parent::__construct();
    }
}