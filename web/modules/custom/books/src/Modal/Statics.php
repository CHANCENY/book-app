<?php

namespace Mini\Modules\custom\books\src\Modal;

use Mini\Cms\Modules\Modal\ColumnClassNotFound;
use Mini\Cms\Modules\Modal\Columns\Number;
use Mini\Cms\Modules\Modal\Columns\VarChar;
use Mini\Cms\Modules\Modal\Modal;
use Mini\Cms\Modules\Modal\PrimaryKeyColumnMissing;

class Statics extends Modal
{
    protected string $main_table = "statics";

    /**
     * @throws PrimaryKeyColumnMissing
     * @throws ColumnClassNotFound
     */
    public function __construct()
    {
        $this->columns = array(
            self::buildColumnInstance(Number::class)->name('static_id')->size(11)->autoIncrement(true)->primary(true)->parent($this),
            self::buildColumnInstance(VarChar::class)->name('statical_type')->size(20)->description("statical type of book on user")->parent($this),
//            self::buildColumnInstance(Number::class)->name('statical_count')->size(11)->description('statical count of book on user')->parent($this),
//            self::buildColumnInstance(Number::class)->name('statical_percentage')->size(11)->description('statical percentage of book on user')->parent($this),
            self::buildColumnInstance(Number::class)->name('statical_book')->size(11)->description('statical book on user')->parent($this),
            self::buildColumnInstance(Number::class)->name('statical_user')->size(11)->description('statical user of book on user')->parent($this),
        );
        parent::__construct();
    }
}