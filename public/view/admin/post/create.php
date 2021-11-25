CREATE VIEW

<form name="create" method="POST">
    <div>
        <label for="">Subject</label>
        <input type="text" name="subject" value="<?= $data['subject']?>">
    </div>
    <div>
        <label>Detail</label>
        <input type="text" name="detail" value="<?= $data['detail']?>">
    </div>
    <div>
        <label>Author ID</label>
        <input type="text" name="Author_id" value="<?= $data['author_id']?>">
    </div>

    <input type="submit" name="send" value="send" >

</form>
<a href="index">Index</a>

<?php
