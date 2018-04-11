<?php
$title = "Accueil";
$description = "Ma description";
?>

<?php include_once("layout/header.php"); ?>

  <section id="intro-wrapper">
    <div id="intro">
      <h1 class="headline rotate-1">
        <span>Welcome back on Link Us</span>
        <span class="word-wrapper">
          <b class="is-visible">🗡</b>
          <b>🗡</b>
          <b>🍿</b>
        </span>
      </h1>
    </div>
  </section>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-8 col-xl-6">
        <h2>Last conversations</h2>
        <hr>
        <div class="conversations">
        	<div class="img_conv">
        	<img src="image/martine.jpg" class="rounded-circle">
        	</div>
        	<div class="text_conv">
        	<p>Le nom de la personne</p>
        	<p>La date et heure</p>
        	<p> LE contenu du message duuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu</p>
        	</div>
        	</div>
        	
        </div>
	  <div class="col-12 col-lg-8 col-xl-6">
        <p class="text-h3 mt-5"><a href="#" class="btn btn-round">Create your own</a></p>
        <h2>Explore</h2>
        <hr>

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