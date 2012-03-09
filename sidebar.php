<?php 

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "http://api.twitter.com/1/statuses/user_timeline.json?screen_name=jefferymills&count=4&include_entities=true");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$contents = curl_exec($ch);

curl_close($ch);

$decoded = json_decode($contents);

 ?>

<div id="sidebar">
	
	<?php get_search_form(); ?>

	<div class="sidebar_posts">

		<aside>
			
			<div class="sidebar_heading">
				
				<h2>Latest Tweets</h2>

			</div>

				<ul>

				<?php 
				foreach($decoded as $tweets): ?>

				<?php $tweet = $tweets->text;
						preg_match('/(http:\/\/[^\s]+)/', $tweet, $text);
						$hypertext = "<a href=\"". $text[0] . "\">" . $text[0] . "</a>";
						$newTweet = preg_replace('/(http:\/\/[^\s]+)/', $hypertext, $tweet); ?>
					
					<li>
					<div class="tweet"><?php echo $newTweet; ?></div>
					<date><?php echo date('j F', strtotime($tweets->created_at)); ?></date>
					</li>
				<?php endforeach;
				?>

				</ul>

		</aside>
		
		<aside>
			
			<div class="sidebar_heading">
				
				<h2>Recent Posts</h2>

			</div>

				<ul>

				<?php $posts = get_posts('numberposts=4&category_name=blog posts&order=DESC'); 
				foreach($posts as $post): ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<date><?php the_time('F j, Y'); ?></date>
					</li>
				<?php endforeach;
				?>

				</ul>

		</aside>

	</div>

</div>