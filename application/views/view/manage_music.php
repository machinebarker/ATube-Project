<div class="container mt-nav">
    <div class="row">
        <div class="col">
            <table id="tables" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Album</th>
                        <th>Artist</th>
                        <th>Category</th>
                        <th>Upload Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($music as $m) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $m['title']; ?></td>
                            <td><?= $m['album']; ?></td>
                            <td><?= $m['artist']; ?></td>
                            <td><?= $m['hashtags']; ?></td>
                            <td><?= $m['upload_date']; ?></td>
                            <td>
                                <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Album</th>
                        <th>Artist</th>
                        <th>Category</th>
                        <th>Upload Date</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
            </table>