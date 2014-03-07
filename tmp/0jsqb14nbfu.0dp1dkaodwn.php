<section class="section titleAPI">
	<div class="container">
			<div class="row">
				<h2>API DOC</h2>
				<div class="separate"></div>
			</div>
	</div>
<section>


<section class="section contentAPI">
	<div class="container">
		<!-- Left nav bar -->
		<div class="col-md-3 api-nav">
		    <nav class="navbar navbar-default" role="navigation">
		        <div class="collapse navbar-collapse">
		            <ul class="nav nav-stacked">
		            	<li class="active"><a href="<?php echo $BASE; ?>/api#intro">Intro</a></li>
		                <li><a href="<?php echo $BASE; ?>/api#users">Users</a></li>
		                <li>
		                	<a href="<?php echo $BASE; ?>/api#tweets">Posts</a>
		                	<ul>
		                		<li><a href="<?php echo $BASE; ?>/api#tweets">Tweets</a></li>
		                		<li><a href="<?php echo $BASE; ?>/api#fbPosts">Facebook</a></li>
		                		<li><a href="<?php echo $BASE; ?>/api#articles">Articles</a></li>
		                	</ul>
		                </li>
		                <li>
		                	<a href="<?php echo $BASE; ?>/api/#items">Contents</a>
		                	<ul>
		                		<li><a href="<?php echo $BASE; ?>/api#items">Items</a></li>
		                		<li><a href="<?php echo $BASE; ?>/api#dates">Dates</a></li>
		                		<li><a href="<?php echo $BASE; ?>/api#locations">Locations</a></li>
		                	</ul>
		                </li>
		                <li><a href="<?php echo $BASE; ?>/api#images">Images</a></li>
		            </ul>
		        </div><!-- /.navbar-collapse -->
		    </nav>
		</div><!--/end left column-->

		<!-- Content -->
		<div class="col-md-9 apiContents">

			<!-- Introduction section -->
			<div class="intro" id="intro">
				<h3>Intro</h3>
				<div class="intro-content">
					Ready to start ?
					Okay, now, all you need in order to call our API is a cross-domain AJAX request. You can do it with the native XmlHttpRequest Object from your favorite browser, or by a javascript framework. As an example, here's the way you can call our API using JQuery framework :
					<em>Tip : Don't forget to set the datatype to jsonp, allowing cross-domain calls</em>
					<div class="code-preview">
						<pre>
$.ajax({
	url: http://spitdata.com/user/10,
	datatype: "jsonp"
}).done(function(data) {
    if (data) {
      console.log("Alright buddy, you got your data !");
    }
});
						</pre>
					</div>
				</div>
			</div>

			<!-- Users section -->
			<div class="users" id="users">
				<h3>Users</h3>
				<div class="users-content">
					Hundreds of users in your database in a second? Just select the number you need :
					<div class="code-preview">
						<pre>http://spitdata.com/user/@user_number</pre>
					</div>
				</div>
			</div>

			<!-- Tweets section -->
			<div class="tweets" id="tweets">
				<h3>Tweets</h3>
				<div class="tweets-content">
					You created a blog, portfolio or any other website and you want to fill it with posts? Choose your postType between Facebook (fbpost), Tweets (tweeter), articles (article) and select the number of posts you want !
					<div class="code-preview">
						<pre>http://spitdata.com/post/@postType/@nbPosts/</pre>
					</div>
				</div>
			</div>

			<!-- Facebook section -->
			<div class="fbPosts" id="fbPosts">
				<h3>Facebook posts</h3>
				<div class="fbPosts-content">
					Facebook API like posts :
					<div class="code-preview">
						<pre>http://spitdata.com/post/fbpost/11/</pre>
					</div>
				</div>
			</div>

			<!--  section -->
			<div class="articles" id="articles">
				<h3>Articles</h3>
				<div class="articles-content">
					Become the fastest redactor with Spitdata.com :
					<div class="code-preview">
						<pre>http://spitdata.com/post/article/14/</pre>
					</div>
				</div>
			</div>

			<!--  section -->
			<div class="items" id="items">
				<h3>Items</h3>
				<div class="items-content">
					Fill your e-commerce website with items :
					<div class="code-preview">
						<pre>http://spitdata.com/content/items/7</pre>
					</div>
				</div>
			</div>

			<!--  section -->
			<div class="dates" id="dates">
				<h3>Dates</h3>
				<div class="dates-content">
					Need some dates? Spitdata offers you dateTimestamp and dateToString :
					<div class="code-preview">
						<pre>http://spitdata.com/content/dates/18</pre>
					</div>
				</div>
			</div>

			<!--  section -->
			<div class="locations" id="locations">
				<h3>Locations</h3>
				<div class="locations-content">
					Where are you? Here is my longitude and my latitude :
					<div class="code-preview">
						<pre>http://spitdata.com/content/location/9</pre>
					</div>
				</div>
			</div>

			<!--  section -->
			<div class="images" id="images">
				<h3>Images</h3>
				<div class="images-content">
					Obtain images choosing the theme between articles illustration (articles), profiles pictures (profile) and items (items). Then choose the width width (in px) and height (in px) you want. Add the extension between png, jpg and gif and the number of images you want.
					If you ask for one image, the image will appear in a window (content-type: image/@extension). If you ask for many images you will obtain some JSON.
					<div class="code-preview"><pre>http://spitdata.com/image/@theme/@width/@height/@extension/@nbImages/@zip</div>
					One image :
					<div class="code-preview"><pre>http://www.spitdata.com/image/articles/400/500/gif/1</pre></div>
					Several images :
					<div class="code-preview"><pre>http://www.spitdata.com/image/articles/400/500/gif/6</pre></div>
					If you want to obtain your images in a zip file, just add ‘zip’ at the end of you url.
					<div class="code-preview"><pre>http://www.spitdata.com/image/articles/400/500/gif/6/zip</pre></div>
				</div>
			</div>

		</div>
	</div>
<section>