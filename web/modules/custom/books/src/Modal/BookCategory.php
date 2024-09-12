<?php

namespace Mini\Modules\custom\books\src\Modal;

use Mini\Cms\Modules\Modal\ColumnClassNotFound;
use Mini\Cms\Modules\Modal\Columns\Number;
use Mini\Cms\Modules\Modal\Columns\Text;
use Mini\Cms\Modules\Modal\Columns\VarChar;
use Mini\Cms\Modules\Modal\Modal;
use Mini\Cms\Modules\Modal\PrimaryKeyColumnMissing;

class BookCategory extends Modal
{
    protected string $main_table = 'book_category';

    /**
     * @throws PrimaryKeyColumnMissing
     * @throws ColumnClassNotFound
     */
    public function __construct()
    {
        $this->columns = array(
          self::buildColumnInstance(Number::class)->name('category_id')->size(11)->parent($this)->autoIncrement(true)->primary(true),
          self::buildColumnInstance(VarChar::class)->name('category_name')->size(50)->unique(true)->parent($this),
          self::buildColumnInstance(Text::class)->name('category_description')->parent($this),
          self::buildColumnInstance(Number::class)->name('category_thumbnail')->size(11)->parent($this),
        );
        parent::__construct();
    }
}