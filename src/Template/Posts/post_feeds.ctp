<h1><u>Feeds</u></h1>
<div>
<?php
if(!empty($postFeeds)) {
	// echo "<pre>";
	foreach($postFeeds as $key => $val) { 
		$isLoggedUserLiked = 'no';
		if(!empty($val['likes'])) {
			$likerIds = array_column($val['likes'], 'liker_id');

			if(in_array($loggedUser['id'], $likerIds)) {
				$isLoggedUserLiked = 'yes';
			}
		} 

		$isLoggedUserCommented = 'no';
		if(!empty($val['comments'])) {
			$commenterIds = array_column($val['comments'], 'commenter_id');

			if(in_array($loggedUser['id'], $commenterIds)) {
				$isLoggedUserCommented = 'yes';
			}
		} 
		?>

		<div>
			<h3><?= $val['user']['name'] ?></h3>
			<p><?= $val['content'] ?></p>
			<p id="liked-span-<?= $val['id'] ?>" style="float: left;"><?= count($val['likes']) ?> Likes</p>&nbsp - &nbsp
			<?php {
				if($isLoggedUserLiked != 'yes') { ?>
					<span id="like-span-<?= $val['id'] ?>">
						<span  onclick="return likePost(<?= $val['id'] ?>,<?= $val['user']['id'] ?>,<?= count($val['likes']) ?>, 'like-span-<?= $val["id"]?>', 'liked-span-<?= $val["id"]?>' )" style="cursor: pointer; color: orange;"> Like </span>
					</span>
					<?php

				} else { ?>
					<span onclick="return unlikePost(<?= $val['id'] ?>)" id="liked-span" style="cursor: pointer; color: green;"> Unlike </span> <?php
				}


				/*if($isLoggedUserCommented != 'yes') { ?>
					<span id="comment-span-<?= $val['id'] ?>">
						<span  onclick="return likePost(<?= $val['id'] ?>,<?= $val['user']['id'] ?>,<?= count($val['likes']) ?>, 'comment-span-<?= $val["id"]?>', 'commented-span-<?= $val["id"]?>' )" style="cursor: pointer; color: orange;"> Comment </span>
					</span>
					<?php

				} else { ?>
					<span onclick="return unlikePost(<?= $val['id'] ?>)" id="commented-span" style="cursor: pointer; color: green;"> Uncomment </span> <?php
				}*/
				?>
				<br>
				<span><b><u>Comments</u></b></span> <?php
				// ---> SHow comment box
				if(!empty($val['comments'])) {  ?>
					
					<div> <?php
						foreach($val['comments'] as $cKey => $cVal) { ?>
							<p><?= $cVal['user']['name'] ?> : <?= $cVal['comment'] ?>
							<?php
							if($isLoggedUserCommented == 'yes') { ?>
								<!-- <span onclick="return uncomment(<?= $val['id'] ?>)" id="commented-span" style="cursor: pointer; color: green;"> Uncomment </span> -->
							<?php 
							} ?>
							</p>
						<?php

						}
					?>
					</div>

				<?php

				} else {
					echo "No comments found";
				} ?>
				<br>
				<input id="comment-value"/> <span onclick="return commentNow(<?= $val['id'] ?>, <?= $val['user']['id'] ?>)" style="cursor: pointer; color: blue;">Comment Now</span> <?php
			} ?>
		</div><br>
	<?php
	}
} else {
	echo "No Feeds are found!";
}

?>
</div>

<script type="text/javascript">


	function commentNow(postId, posterId) {

		if(postId != '') {
			var comment = $('#comment-value').val();
			if(comment != '' && comment != undefined) {
				$.post(siteUrl+'/posts/commentNow',{'_csrfToken' : csrf, 'postId':postId, 'posterId':posterId, 'comment' : comment}, function(response) {

					if(response == 'success') {
						location.reload();
					}
					return false;
		      	});
			}

		}
	}


	function likePost(postId, posterId, likesCount, thisSpanId, likesSpanId) {

		if(postId != '' && postId != undefined) {
			$.post(siteUrl+'/posts/likePost',{'_csrfToken' : csrf, 'postId':postId, 'posterId':posterId}, function(response) {

				if(response == 'success') {
					$('#'+thisSpanId).html('<span onclick="return unlikePost('+postId+')" id="liked-span" style="color: green; cursor: pointer; "> Unlike </span>');

					$('#'+likesSpanId).html((likesCount+1) + ' Likes');
				}
				return false;
	      	});
		}
	}

	function unlikePost(postId) {
		if(postId != '') {
			$.post(siteUrl+'/posts/unlikePost',{'_csrfToken' : csrf, 'postId':postId}, function(response) {

				if(response == 'success') {
					 location.reload(); 
				}
				return false;
	      	});
		}
	}
</script>