{
    "collection": {
        "version": "1.0",
        "href": "http://localhost/Hetic/php/phpGenerator/",
        "items": [
            <?php $ctr=0; foreach (($contents?:array()) as $content): $ctr++; ?>
                {
                    "city": "<?php echo trim($content['city']); ?>",
                    "longitude": "<?php echo trim($content['longitude']); ?>",
                    "latitude": "<?php echo trim($content['latitude']); ?>"
                }
                <?php if ((sizeof($contents)>1) && ($ctr<sizeof($contents))): ?>
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