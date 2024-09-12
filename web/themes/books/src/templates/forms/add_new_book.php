<main>
    <div class="form-wrapper">
        <div class="form">
            <h1>New Book</h1>
            <form action="" class="wrapper-grid" method="post" enctype="multipart/form-data">
                <div class="box-col a">
                    <div class="nice-form-group">
                        <label for="title" class="required">Book title</label>
                        <input type="text" name="title" id="title" class="form-control" required placeholder="enter book title">
                    </div>
                    <div class="nice-form-group">
                        <label for="isbn" class="required">Book ISBN</label>
                        <input type="text" value="<?= time() ?>" name="isbn" id="isbn" class="form-control" required placeholder="enter book isbn">
                    </div>
                    <div class="nice-form-group">
                        <label for="category" class="required">Book Category</label>
                        <select name="book_category" id="category" required class="form-control">
                            <option value="">Select Category</option>
                            <?php if(!empty($content['categories'])): foreach ($content['categories'] as $category): ?>

                                <?php if ($category instanceof \Mini\Cms\Modules\Modal\RecordCollection): ?>
                                    <option value="<?= $category->category_id ?>"><?= $category->category_name ?></option>
                                <?php endif; ?>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div class="nice-form-group">
                        <label for="pdf" class="">Book PDF</label>
                        <input type="file" name="pdf" id="pdf" class="form-control" placeholder="enter book pdf">
                        <span>enter pdf for this book if you have one</span>
                    </div>
                    <div class="nice-form-group">
                        <label for="description" class="required">Description</label>
                        <textarea name="description" required id="description"></textarea>
                    </div>
                </div>
                <div class="box-col b">
                    <div class="nice-form-group">
                        <label for="thumbnail" class="required">Book Image thumbnail</label>
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control" required placeholder="enter book thumbnail">
                        <span>book thumbnail image</span>
                    </div>
                    <div class="nice-form-group">
                        <label for="images" class="">Book Images</label>
                        <input type="file" multiple name="images[]" id="images" class="form-control" placeholder="enter book images">
                        <span>book images to use to generate book pdf</span>
                    </div>
                    <div class="nice-form-group">
                        <label for="category" class="required">Book Status</label>
                        <select name="status" id="category" required class="form-control">
                            <option value="">Select Status</option>
                            <option value="Active">Publish</option>
                            <option value="Inactive">Not publish</option>
                        </select>
                    </div>
                    <div class="nice-form-group">
                        <input type="submit" name="add-book" class="submit" value="Add Book">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
