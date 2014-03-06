<?php

	class GeneratorController extends Controller {

		public function send(){
			$tmpl         = \Template::instance();
			$web          = \Web::instance();
			$asked        = $this->f3->get('POST.liveUrl');
			$allowedTypes = array('user', 'post', 'content');
			$args         = explode('/', $asked);

			if(in_array($args[1], $allowedTypes)){
				switch ($args[1]) {
					case 'user':	// users
						$gender  = $args[2];
						$nbUsers = ($args[3]!='') ? $args[3] : 1;
						$model   = new UserController();
						$this->f3->set('users', $model->getUsers(array('gender'=>$gender, 'limit'=>$nbUsers)));
						$content = $tmpl->render('back/user/user.json');
						break;
					case 'post':	// tweet, fbpost, article
						$nbPosts = ($args[3]!='') ? $args[3] : 1;
						$model = new PostController();
						$this->f3->set('posts', $model->getPosts(array('postType'=>$args[2], 'limit'=>$nbPosts)));
						$content = $tmpl->render('back/post/'.$args[2].'.json');
						break;
					case 'content':	// dates, item, location
						$nbContents = ($args[3]!='') ? $args[3] : 1;
						$model = new ContentController();
						$this->f3->set('contents', $model->getContents(array('contentType'=>$args[2], 'limit'=>$nbContents)));
						$content = $tmpl->render('back/content/'.$args[2].'.json');
						break;
				}
				$file = $this->f3->get('TMP').'content.json';
				file_put_contents($file, $content);
				$sent = $web->send($file, $web->mime($file), 512, TRUE);
				unlink($file);
				exit;
			}
		}

	}

?>