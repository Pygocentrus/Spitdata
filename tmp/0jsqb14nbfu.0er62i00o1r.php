{
    "collection": {
        "version": "1.0",
        "href": "http://localhost/Hetic/php/phpGenerator/",
        "items": [
            <?php $ctr=0; foreach (($posts?:array()) as $post): $ctr++; ?>
                {
                    "username": "<?php echo trim($post['username']); ?>",
                    "pseudo": "<?php echo trim($post['pseudo']); ?>",
                    "pubDate": "<?php echo trim($post['pubDate']); ?>",
                    "content": "<?php echo trim($post['content']); ?>",
                    "reTweetCounter": "<?php echo trim($post['reTweetCounter']); ?>",
                    "favoriteCounter": "<?php echo trim($post['favoriteCounter']); ?>"
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