<?php
namespace App\Controller;

use Cake\Event\Event;

class PostsController extends AppController
{

	public function beforeFilter(Event $event) {
        $this->Security->setConfig('unlockedActions', [
            'likePost',
            'unlikePost',
            'commentNow',
        ]);
    }

	public function createPost () {
		if($this->request->is('post')) {
            $postData = $this->request->getData();
            if($postData['title'] != '' && $postData['content'] != '') {

	            $this->loadModel('Posts');
	            $postArr = [
	            	'user_id' => $this->loggedUser['id'],
	            	'title' => $postData['title'],
	            	'content' => $postData['content'],
	           	];
	           	$postEnt = $this->Posts->newEntity($postArr);
	           	$this->Posts->save($postEnt);

	           	$this->Flash->success('Post saved successfully!');
	           	return $this->redirect('/');
	        } else {
	        	$this->Flash->error(__("Required fields are missing!"));
	        }


       	}
	}

	public function postFeeds() {
		$this->loadModel('Posts');
		$postFeeds = $this->Posts->find('all', [
			'conditions' => [
				'user_id !=' => $this->loggedUser['id'] 
			],
			'contain' => [
				'Users',
				'Likes',
				'Comments',
				'Comments.Users',
			]
		])->hydrate(false)->toArray();
		$this->set('postFeeds', $postFeeds);

	}

	public function likePost() {
		$postData = $this->request->getData();
		if($postData['postId'] != '') {
			$this->loadModel('Likes');
			$likesArr = [
				'post_id' => $postData['postId'],
				'liker_id' => $this->loggedUser['id'],
				'poster_id' => $postData['posterId'],
 			];

 			$likesEnt = $this->Likes->newEntity($likesArr);
 			$this->Likes->save($likesEnt);
 			echo "success";
		}
		die;
	}

	public function unlikePost() {
		$postData = $this->request->getData();
		if($postData['postId'] != '') {
			$this->loadModel('Likes');
			$this->Likes->deleteAll([
				'post_id' => $postData['postId'],
				'liker_id' => $this->loggedUser['id'],
			]);
 			echo "success";
		}
		die;
	}

	public function commentNow() {
		$postData = $this->request->getData();
		if($postData['postId'] != '') {
			$this->loadModel('Comments');
			$commentArr = [
				'post_id' => $postData['postId'],
				'commenter_id' => $this->loggedUser['id'],
				'posterId' => $postData['posterId'],
				'comment' => $postData['comment'],
			];
			$commentEnt = $this->Comments->newEntity($commentArr);
			$this->Comments->save($commentEnt);
 			echo "success";
		}
		die;
	}


}