<?php
echo $image;
$data = explode(",", $image);
$path = Yii::getAlias('@storageUrl') . '/web/img/';
?> 
<?php foreach($data as $d):?>
<tr class="template-download fade in">
    <td>
        <span class="preview">

            <a href="<?= $path.$d?>" 
               title="<?= $d?>" download="<?= $d?>" data-gallery="">
                <img src="<?= $path.$d?>"></a>

        </span>
    </td>
    <td>
        <p class="name">

            <a href="<?= $path.$d?>" 
               title="<?= $d?>" download="<?= $d?>" 
               data-gallery=""><?= $d?></a>

        </p>

    </td>
    <td>
        <span class="size"></span>
    </td>
    <td>

        <button class="btn btn-danger delete" data-type="POST" data-url="image-delete?name=<?= $d?>">
            <i class="glyphicon glyphicon-trash"></i>
            <span>Delete</span>
        </button>
        <input type="checkbox" name="delete" value="1" class="toggle">

    </td>
</tr>
<?php endforeach; ?>