
    <footer>
		<div class="container">
			<div class="row">
				<div class="col-md-4 slogan">
					<a href="<?php echo $BASE; ?>/"><img src="../../ui/assets/logo.png" alt="Logo"></a>
					<p>For developpers, by developpers, with love.</p>
				</div>

				<div class="col-md-4 support">
					<p>SUPPORT</p>
					<i class="fa fa-envelope"></i>
					<p>hello at spitdata.com</p>
				</div>

				<div class="col-md-4 social">
					<a href="https://www.facebook.com/spitdata" class="fb"><i class="fa fa-facebook-square"></i></a>
					<a href="https://twitter.com/spitdata" class="twitter"><i class="fa fa-twitter-square"></i></a>
					<p>Copyright © 2014 - HETIC</p>
				</div>
			</div>

		</div>
	</footer>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../../ui/js/bootstrap.min.js"></script>

	<?php if ($currentPage=='home'): ?>
	  
	  	<script src="../../ui/js/custom-anim.js"></script>
	  
	<?php endif; ?>

    <?php if ($currentPage=='generator'): ?>
	  
	  	<script src="../../ui/js/angular.min.js"></script>
	  	<script src="../../ui/js/jquery.clipboard.js"></script>
	  	<script src="../../ui/js/custom-generator.js"></script>
	  
	<?php endif; ?>

	<?php if ($currentPage=='admin'): ?>
	  
	  	<script src="../../ui/js/jquery.confirmon.min.js"></script>
	  	<script src="../../ui/js/custom-admin.js"></script>
	  
	<?php endif; ?>

    </body>
</html>