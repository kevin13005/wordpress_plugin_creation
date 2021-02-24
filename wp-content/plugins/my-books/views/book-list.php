<?php
global $wpdb;
$all_books = $wpdb->get_results(
    $wpdb->prepare(
        "SELECT * FROM " .my_book_table(). " ORDER BY id DESC ", ""
    ), ARRAY_A
);  
?>

<div class="container">
    <div class="row">
    <div class="alert alert-info">
        <h5>my book list</h5>
    </div>
    <div class="card">
        <div class="card-header bg-danger">my book lists</div>
        <div class="card-body">
        <table id="my-book" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Author</th>
                <th>About</th>
                <th>Book_image</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(count($all_books) > 0){
                $i = 1;
                foreach($all_books as $key=>$value){
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['author']; ?></td>
                <td><?php echo $value['about']; ?></td>
                <td><img src="<?php echo $value['book_image']; ?>" style="height=50px;width:50px;" /></td>
                <td><?php echo $value['created_at']; ?></td>
                <td>
                    <button class="btn btn-info" href="admin.php?page=book-edit&edit=<?php echo $value['id']; ?>">Edit</button>
                    <button class="btn btn-danger btnbookdelete" href="javascript:void(0)" data-id="<?php echo $value['id']; ?>">Delete</button>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
        </div>
    </div>
    </div>
</div>
<!--<thead>
            <tr>
                <th>Sr No</th>
                <th>Name</th>
                <th>Author</th>
                <th>About</th>
                <th>Book_image</th>
                <th>Created_at</th>
                <th>Action</th>
            </tr>
        </thead>-->