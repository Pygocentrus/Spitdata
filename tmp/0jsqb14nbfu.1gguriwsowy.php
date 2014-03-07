{
    "collection": {
        "version": "1.0",
        "href": "http://localhost/Hetic/php/phpGenerator/",
        "items": [
            <?php $ctr=0; foreach (($users?:array()) as $user): $ctr++; ?>
                {
                    "gender": "<?php echo trim($user['gender']); ?>",
                    "title": "<?php echo trim($user['title']); ?>",
                    "firstName": "<?php echo trim($user['firstName']); ?>",
                    "lastName": "<?php echo trim($user['lastName']); ?>",
                    "location": {
                        "street": "<?php echo trim($user['street']); ?>",
                        "zip": "<?php echo trim($user['zip']); ?>",
                        "city": "<?php echo trim($user['city']); ?>"
                    },
                    "currentLocation":{
                        "latitude": "<?php echo trim($user['currentLat']); ?>",
                        "logitude": "<?php echo trim($user['currentLong']); ?>"
                    },
                    "email": "<?php echo trim($user['email']); ?>",
                    "userName": "<?php echo trim($user['userName']); ?>",
                    "password": "<?php echo trim($user['password']); ?>",
                    "sha1password": "<?php echo trim($user['sha1Password']); ?>"
                }
                <?php if ((sizeof($users)>1) && ($ctr<sizeof($users))): ?>
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