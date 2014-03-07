{
    "collection": {
        "version": "1.0",
        "href": "http://localhost<?php echo $BASE; ?>",
        "items": [
            <?php $ctr=0; foreach (($limitArray?:array()) as $limit): $ctr++; ?>
                {
                    "type": "<?php echo $extension; ?>",
                    "url": "<?php echo $BASE.'/images/'.$dirnames.$width.'/'.$height.'/'.$extension.'/1'; ?>"
                }
                <?php if ((sizeof($limitArray)>1) && ($ctr<sizeof($limitArray))): ?>
                    ,
                <?php endif; ?>
            <?php endforeach; ?>
        ],
        "template": {
            "data": [
                {"prompt" : "Text of message", "name" : "text", "value" : ""}
            ]
        }
    }
}