<?php
	function dispcategories(){
		include('dbconn.php');
		
		$select = mysqli_query($con,"SELECT * FROM categories");
		while($row = mysqli_fetch_assoc($select)){
			
			echo "<table class='category-table'>";
			echo "<tr><td class='main-category' colspan='2'>".$row['category_title']."</td></tr>";
			dispsubcategories($row['cat_id']);
			echo "</table>";
		}
	}
	
	function dispsubcategories($parent_id){
		
			include('dbconn.php');
			$select = mysqli_query($con,"SELECT cat_id, subcat_id, subcategory_title, subcategory_desc FROM categories, subcategories
								WHERE ($parent_id = categories.cat_id) AND ($parent_id = subcategories.parent_id)");
		
			echo "<tr><th width = '90%'>Categories</th><th width='10%'>Topics</th></tr>"; 
			while ($row = mysqli_fetch_assoc($select)){
				
				echo "<tr><td class='category_title'><a href= '/forum-project/topics.php?cid=".$row['cat_id']."&scid=".$row['subcat_id']."'>
						".$row['subcategory_title']."<br />";
				echo $row['subcategory_desc']."</a></td>";
				echo "<td class='num-topics'>".getnumtopics($parent_id, $row['subcat_id'])."</td></tr>";
				
				
			}	
	}	
	
	function getnumtopics($cat_id, $subcat_id){
		include('dbconn.php');
		$select = mysqli_query($con, "SELECT category_id, subcategory_id FROM topics WHERE ".$cat_id." = category_id
									AND ".$subcat_id." = subcategory_id");
		return mysqli_num_rows($select);
		
	}
	
	function disptopics($cid, $scid){
		
		include('dbconn.php');
		$select = mysqli_query($con, "SELECT topic_id, author , title , date_posted, views, replies FROM categories, subcategories, topics
								WHERE ($cid = topics.category_id) AND ($scid = topics.subcategory_id) AND ($cid = categories.cat_id)
								AND ($scid = subcategories.subcat_id) ORDER BY topic_id DESC");
		if(mysqli_num_rows($select) != 0){
			echo "<table class='topic-table'>";
			echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th><th>Replies</th></tr>";
			while ($row = mysqli_fetch_assoc($select)){
				echo "<tr><td><a href = '/forum-project/readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$row['topic_id']."'>".
						$row['title']."</a></td><td>".$row['author']."</td><td>".$row['date_posted']."</td><td>".$row['views']."</td>
						<td>".$row['replies']."</td></tr>";
			}
				echo "</table>";
		}
		else{		
			echo "<p>This Category has no topic yet! <a href='/forum-project/newtopic.php?cid=".$cid."&scid=".$scid."'> 
					Be the first to add a topic!</a></p>";
				}
	}
	
	function disptopic($cid,$scid,$tid){
		include('dbconn.php');
		
		$select = mysqli_query($con,"SELECT cat_id, subcat_id, topic_id, author, title, date_posted, content FROM
								categories, subcategories, topics WHERE ($cid = categories.cat_id) AND			
								($scid = subcategories.subcat_id) AND ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);
		echo nl2br("<div class='content'><h2 class='title'>".$row['title']."</h2><p>".$row['author']."\n".$row['date_posted']."</p></div>");
		echo "<div class='content'><p>".$row['content']."</p></div>";
	}
	function addview($cid,$scid,$tid)
	{
		include('dbconn.php');
		$update = mysqli_query($con,"UPDATE topics SET views = views + 1 WHERE category_id = ".$cid." AND
								subcategory_id = ".$scid." AND topic_id = ".$tid."");
	}
	
	function replylink($cid, $scid, $tid){
		
		echo "<p><a href =' /forum-project/replyto.php?cid=".$cid."$scid=".$scid."&tid=".$tid."'>Reply to this post</a></p>";	
	}
	function replytopost($cid, $scid, $tid){
		
		echo "<div class='content'><form action='/forum-project/addreply.php?cid=".$cid."&scid=".$scid."&tid=".$tid."' method='POST'>
			<p>Comment: </p>
			<textarea cols='50' row='5' id='comment' name='comment'></textarea><br />
			<input type='submit' value='add comment' />
			</form></div>";
				
		
	}
?>