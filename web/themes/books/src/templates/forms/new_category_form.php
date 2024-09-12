<main>
    <div class="form-wrapper">
        <div class="form">
            <h1>New Category</h1>
            <form action="" class="wrapper-grid" method="post" enctype="multipart/form-data">
                <div class="box-col a">
                    <div class="nice-form-group">
                        <label for="title" class="required">Category Name</label>
                        <input type="text" name="category_name" id="title" class="form-control" required placeholder="enter category name">
                    </div>
                    <div class="nice-form-group">
                        <label for="pdf" class="">Category Thumbnail</label>
                        <input type="file" name="category_thumbnail" id="pdf" class="form-control" placeholder="enter category thumbnail image">
                    </div>
                    <div class="nice-form-group">
                        <label for="description" class="required">Category Description</label>
                        <textarea name="category_description" required id="description"></textarea>
                    </div>
                    <div class="nice-form-group">
                        <input type="submit" name="add-book" class="submit" value="Add Category">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
