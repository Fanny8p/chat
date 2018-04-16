<?php
$title = "Accueil";
$description = "Ma description";
?>

<?php include_once("layout/header.php"); ?>

  <section id="intro-wrapper">
    <div id="intro">
      <h1 class="headline rotate-1">
        <span style="font-size: 30px">Welcome back on Link Us</span>
        <span class="word-wrapper">
          <b style="font-size: 30px" class="is-visible">⚔</b>
          <b style="font-size: 30px">🍿</b>
          <b style="font-size: 30px">🍌</b>
          <b style="font-size: 30px">💀</b>
        </span>
      </h1>
    </div>
  </section>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-6">
      	<div class="section_home">
        <h2>Last conversations</h2>
    	</div>
        <div class="conv">
        	<div class="head_conv">	
        		<span style="float: left;">Zelda</span><span>Hyrule</span><span style="float: right;">Date & time</span>
        	</div>
        	<div class="corps_conv">
        	<div class="img_conv">
        		<img src="image/zelda.jpg" class="rounded-circle">
        	</div>        		
        	<div class="message_conv">
        		<p>better hangover?</p>
        	  	<i class="fas fa-plus-circle"></i>
        	</div>
        	</div>
        </div>
        <div class="conv">
        	<div class="head_conv">	
        		<span style="float: left;">Cloud</span><span>Name Room</span><span style="float: right;">Date & time</span>
        	</div>
        	<div class="corps_conv">
        	<div class="img_conv">
        		<img src="image/avatar_a0cbba8bf449_128.jpg" class="rounded-circle">
        	</div>        		
        	<div class="message_conv">
        		<p> I feel like I am gonna kick some monter's ass today who's with me?</p>
        	  	<i class="fas fa-plus-circle"></i>
        	</div>
        	</div>
        </div>
        	
        </div>
    </div>

	  <div class="col-12 col-lg-8 col-xl-6" style="margin-right: auto; margin-left: auto;">
	  	<div class="create_conv">
        	<p class="text-h3 mt-5"><a href="#" class="btn btn-round" id="create">New message</a></p>
    	</div>
        <div class="section_home">
        <hr>
        <h2>Explore</h2>
    	</div>
        <div class="card-deck">
  <div class="card">
    <div class="card-body" id="cardfirst">
    	<hr>
      <h3 class="card-title">Craft</h3>
      <p>250 members</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body" id="second">
    	<hr>
      <h3 class="card-title">Quest</h3>
      <p>780 members</p>
    </div>
  </div>
  <div class="card">
    <div class="card-body" id="third">
    	<hr>
      <h3 class="card-title">Random</h3>
      <p>85 members</p>
    </div>
  </div>
</div>

    </div>

    </div>

<script>
var animationDelay = 2500;
animateHeadline($('.headline'));

function animateHeadline($headlines) {
	$headlines.each(function(){
		var headline = $(this);
		//trigger animation
		setTimeout(function(){ hideWord( headline.find('.is-visible') ) }, animationDelay);
	});
}

function hideWord($word) {
	var nextWord = takeNext($word);
	switchWord($word, nextWord);
	setTimeout(function(){ hideWord(nextWord) }, animationDelay);
}
 
function takeNext($word) {
	return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
}
 
function switchWord($oldWord, $newWord) {
	$oldWord.removeClass('is-visible').addClass('is-hidden');
	$newWord.removeClass('is-hidden').addClass('is-visible');
}


</script>


</body>
</html>