<main>
    <div class="form-wrapper">
        <div class="form">
            <h1>New Book</h1>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="nice-form-group">
                    <label for="title" class="required">Book title</label>
                    <input type="text" name="title" id="title" class="form-control" required placeholder="enter book title">
                </div>
                <div class="nice-form-group">
                    <label for="isbn" class="required">Book ISBN</label>
                    <input type="text" value="<?= time() ?>" name="title" id="isbn" class="form-control" required placeholder="enter book isbn">
                </div>
                <div class="nice-form-group">
                    <label for="category" class="required">Book Category</label>
                    <select name="book_category" id="category" required class="form-control">
                        <option value="">Select Category</option>
                        <option value="Computer programming">Computer Programming</option>
                        <option value="CSE">Computer Science Engineering</option>
                        <option value="Business Administration">Business Administration</option>
                    </select>
                </div>
                <div class="nice-form-group">
                    <label for="pdf" class="">Book PDF</label>
                    <input type="file" name="pdf" id="pdf" class="form-control" placeholder="enter book pdf">
                    <span>enter pdf for this book if you have one</span>
                </div>
                <div class="nice-form-group">
                    <label for="thumbnail" class="required">Book Image thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control" required placeholder="enter book thumbnail">
                    <span>book thumbnail image</span>
                </div>
                <div class="nice-form-group">
                    <label for="images" class="">Book Images</label>
                    <input type="file" multiple name="images[]" id="images" class="form-control" required placeholder="enter book images">
                    <span>book images to use to generate book pdf</span>
                </div>
                <div class="nice-form-group">
                    <input type="submit" name="add-book" class="submit" value="Add Book">
                </div>
            </form>
        </div>
    </div>
</main>
