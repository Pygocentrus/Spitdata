{
    "collection": {
        "version": "1.0",
        "href": "http://localhost/Hetic/php/phpGenerator/",
        "items": [
            <?php $ctr=0; foreach (($posts?:array()) as $post): $ctr++; ?>
                {
                    "firstname": "<?php echo trim($post['firstname']); ?>",
                    "lastname": "<?php echo trim($post['lastname']); ?>",
                    "pubDate": "<?php echo trim($post['pubDate']); ?>",
                    "content": "<?php echo trim($post['content']); ?>",
                    "likeCounter": "<?php echo trim($post['likeCounter']); ?>",
                    "comments": "<?php echo trim($post['comments']); ?>"
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