SELECT VIEW

<form name="select" method="POST">
    <div>
        <label for="">Subject</label>
        <input type="text" name="subject" id="">
    </div>
    <div>
        <label>Detail</label>
        <input type="text" name="detail" id="">
    </div>
    <div>
        <label>Author ID</label>
        <input type="text" name="Author_id" id="">
    </div>

    <input type="submit" name="send" value="send" >

</form>

<a href="create">Create</a>


<table border="1" solid="" cellpadding="5">
    <?php foreach ($data as $key => $row) : ?>
    <tr>
        <?php foreach ($row as $innerKey => $value) : ?>
        <th><?php echo $innerKey ?>></th>
            <td><?php echo $value ?></td>
        <?php endforeach; ?>
        <td><a href="update?id=<?=$row['id']?>">update</a></td>
        <td><a href="delete?<?=$row['id']?>">delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>



