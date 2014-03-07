{
    "collection": {
        "version": "1.0",
        "href": "http://localhost/Hetic/php/phpGenerator/",
        "items": [
            <?php $ctr=0; foreach (($posts?:array()) as $post): $ctr++; ?>
                {
                    "author": "<?php echo trim($post['author']); ?>",
                    "pubDate": "<?php echo trim($post['pubDate']); ?>",
                    "modifDate": "<?php echo trim($post['modifDate']); ?>",
                    "content": "<?php echo trim($post['content']); ?>",
                    "tags": "<?php echo trim($post['tags']); ?>",
                    "category": "<?php echo trim($post['category']); ?>",
                    "picture": "<?php echo trim($post['picture']); ?>"
                }
                <?php if ((sizeof($posts)>1) && ($ctr<sizeof($posts))): ?>
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