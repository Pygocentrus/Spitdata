{
    "collection": {
        "version": "1.0",
        "href": "http://localhost/Hetic/php/phpGenerator/",
        "items": [
            <?php $ctr=0; foreach (($contents?:array()) as $content): $ctr++; ?>
                {
                    "name": "<?php echo trim($content['name']); ?>",
                    "price": "<?php echo trim($content['price']); ?>",
                    "description": "<?php echo trim($content['description']); ?>",
                    "inStock": "<?php echo trim($content['inStock']); ?>",
                    "storageCounter": "<?php echo trim($content['storageCounter']); ?>",
                    "picture": "<?php echo trim($content['picture']); ?>",
                    "recommandations": "<?php echo trim($content['recommandations']); ?>"
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