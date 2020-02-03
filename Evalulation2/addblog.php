<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class='parent'>
        <div class='blog-info'>
            <form action="addblog.php" method='post'>
                <fieldset>
                <h1>Add blog</h1>
                    <div class="title">
                        <label>Title:</label>
                        <input type="text" name="blog[title]">
                    </div>
                    <div class="content">
                        <label>Content:</label>
                        <input type="text" name="blog[content]">
                    </div>
                    <div class="url">
                        <label>URL:</label>
                        <input type="text" name="blog[url]">
                    </div>
                    <div class="publish">
                        <label>Publish At:</label>
                        <input type="datetime" name="blog[publish]">
                    </div>
                    <div class="category">
                        <label>Select category :</label>
                        <?php $category = ["cricket", "art", "Listening to Music", "Travelling", "Blogging "]?>
                        <select name="blog[category]" multiple>
                        <?php foreach($category as $categoryvalue) :?>
                        <option value="<?php echo $categoryvalue; ?>"> <?php echo $categoryvalue; ?> </option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="image">
                        <label>Image:</label>
                        <input type="file" name="blog[image]">
                    </div>
                    <input type="submit" value='submit' name='submit'>
                </fieldset>
            </form>
        </div>
    </div>
</body>
<style>
    label {
        display: inline-block;
        width: 150px;
    }
</style>
</html>