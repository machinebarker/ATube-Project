<div class="container mt-nav">
    <div class="row">
        <div class="col">
            <table id="tables" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Uploader</th>
                        <th>Upload Date</th>
                        <th>Views</th>
                        <th>Hashtags</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($videos as $v) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $v['title']; ?></td>
                            <td><?= $v['uploader_name']; ?></td>
                            <td><?= $v['upload_date']; ?></td>
                            <td><?= $v['views']; ?></td>
                            <td><?= $v['hashtags']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Uploader</th>
                        <th>Upload Date</th>
                        <th>Views</th>
                        <th>Hashtags</th>
                    </tr>
                </tfoot>
            </table>