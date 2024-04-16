<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kocima | Cooking Recipe HTML Template</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png">
  <link href="css?family=Montserrat:400,500,600&display=swap" rel="stylesheet">
  <link href="css-1?family=Leckerli+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css%20%281%29/main.css">
  <script src="js/uikit.js"></script>
</head>

<body>

<nav class="uk-navbar-container uk-letter-spacing-small">
  <div class="uk-container">
    <div class="uk-position-z-index" data-uk-navbar="">
      <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo" href="index.html">Kocina</a>
        <ul class="uk-navbar-nav uk-visible@m uk-margin-large-left">
          <li><a href="index.html">Home</a></li>
          <li><a href="recipe.html">Recipe</a></li>
          <li class="uk-active"><a href="search.html">Search</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <div class="uk-navbar-right">
        <div>
          <a class="uk-navbar-toggle" data-uk-search-icon="" href="#"></a>
          <div class="uk-drop uk-background-default" data-uk-drop="mode: click; pos: left-center; offset: 0">
            <form class="uk-search uk-search-navbar uk-width-1-1">
              <input class="uk-search-input uk-text-demi-bold" type="search" placeholder="Search..." autofocus="">
            </form>
          </div>
        </div>
        <ul class="uk-navbar-nav uk-visible@m">
          <li><a href="sign-in.html">Sign In</a></li>
        </ul>
        <div class="uk-navbar-item">
          <div><a class="uk-button uk-button-primary" href="sign-up.html">Sign Up</a></div>
        </div>          
        <a class="uk-navbar-toggle uk-hidden@m" href="#offcanvas" data-uk-toggle=""><span data-uk-navbar-toggle-icon=""></span></a>
      </div>
    </div>
  </div>
</nav>

<div class="uk-section uk-section-default uk-padding-remove-top">
  <div class="uk-container">
    <div data-uk-grid="">
      <div class="uk-width-1-2@m">
        <form class="uk-search uk-search-default uk-width-1-1 uk-margin-small-bottom">
          <span data-uk-search-icon=""></span>
          <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search" placeholder="Search for recipes...">
        </form>          
      </div>
      <div class="uk-width-1-2@m uk-text-right@m">
        <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-muted">
          <option>Sort by: Latest</option>
          <option>Sort by: Top Rated</option>
          <option>Sort by: Trending</option>
        </select>
      </div>
    </div>      

    <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-margin-medium-top" data-uk-grid="">
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1504674900247-0877df9cc836" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Chef John's Turkey Sloppy Joes</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">5.0</span>
                <span>(73)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by John Keller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1490645935967-10de6ba17061" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Brown Sugar Meatloaf</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">3.0</span>
                <span>(94)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Danial Caleem</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1494390248081-4e521a5940db" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Awesome Slow Cooker Pot Roast</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">4.5</span>
                <span>(153)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Janet Small</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1479832912902-77089f02b1d2" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Broiled Tilapia Parmesan</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">5.0</span>
                <span>(524)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Aleaxa Dorchest</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1495214783159-3503fd1b572d" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Baked Teriyaki Chicken</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">4.6</span>
                <span>(404)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Ben Kaller</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1522248105696-9625ba87de6e" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Zesty Slow Cooker Chicken</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">3.9</span>
                <span>(629)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Sam Brown</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1506354666786-959d6d497f1a" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Rosemary Ranch Chicken Kabobs</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">3.6</span>
                <span>(149)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Theresa Samuel</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      <div>
        <div class="uk-card">
          <div class="uk-card-media-top uk-inline uk-light">
            <img class="uk-border-rounded-medium" src="photo-1432139555190-58524dae6a55" alt="Course Title">
            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
            <div class="uk-position-xsmall uk-position-top-right">
              <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
            </div>
          </div>
          <div>
            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Slow Cooker Pulled Pork</h3>
            <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
              <div class="uk-width-auto uk-flex uk-flex-middle">
                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                <span class="uk-margin-xsmall-left">2.9</span>
                <span>(309)</span>
              </div>
              <div class="uk-width-expand uk-text-right">by Adam Brown</div>
            </div>
          </div>
          <a href="recipe.html" class="uk-position-cover"></a>
        </div>
      </div>
      
      <div>
              <div class="uk-card">
                <div class="uk-card-media-top uk-inline uk-light">
                  <img class="uk-border-rounded-medium" src="photo-1428259067396-2d6bd3827878" alt="Course Title">
                  <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                  <div class="uk-position-xsmall uk-position-top-right">
                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                  </div>
                </div>
                <div>
                  <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Greek Lemon Chicken and Potatoes</h3>
                  <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
                    <div class="uk-width-auto uk-flex uk-flex-middle">
                      <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                      <span class="uk-margin-xsmall-left">3.6</span>
                      <span>(124)</span>
                    </div>
                    <div class="uk-width-expand uk-text-right">by Thomas Haller</div>
                  </div>
                </div>
                <a href="recipe.html" class="uk-position-cover"></a>
              </div>
            </div>
            <div>
              <div class="uk-card">
                <div class="uk-card-media-top uk-inline uk-light">
                  <img class="uk-border-rounded-medium" src="photo-1460306855393-0410f61241c7" alt="Course Title">
                  <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                  <div class="uk-position-xsmall uk-position-top-right">
                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                  </div>
                </div>
                <div>
                  <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Turkey Posole Dinner</h3>
                  <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
                    <div class="uk-width-auto uk-flex uk-flex-middle">
                      <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                      <span class="uk-margin-xsmall-left">4.0</span>
                      <span>(84)</span>
                    </div>
                    <div class="uk-width-expand uk-text-right">by Thomas Haller</div>
                  </div>
                </div>
                <a href="recipe.html" class="uk-position-cover"></a>
              </div>
            </div>
            <div>
              <div class="uk-card">
                <div class="uk-card-media-top uk-inline uk-light">
                  <img class="uk-border-rounded-medium" src="photo-1504113888839-1c8eb50233d3" alt="Course Title">
                  <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                  <div class="uk-position-xsmall uk-position-top-right">
                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                  </div>
                </div>
                <div>
                  <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Baked Macaroni and Cheese</h3>
                  <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
                    <div class="uk-width-auto uk-flex uk-flex-middle">
                      <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                      <span class="uk-margin-xsmall-left">2.9</span>
                      <span>(311)</span>
                    </div>
                    <div class="uk-width-expand uk-text-right">by Thomas Haller</div>
                  </div>
                </div>
                <a href="recipe.html" class="uk-position-cover"></a>
              </div>
            </div>
            <div>
              <div class="uk-card">
                <div class="uk-card-media-top uk-inline uk-light">
                  <img class="uk-border-rounded-medium" src="photo-1458642849426-cfb724f15ef7" alt="Course Title">
                  <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                  <div class="uk-position-xsmall uk-position-top-right">
                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative" data-uk-icon="heart"></a>
                  </div>
                </div>
                <div>
                  <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Deb's General Tso's Chicken</h3>
                  <div class="uk-text-xsmall uk-text-muted" data-uk-grid="">
                    <div class="uk-width-auto uk-flex uk-flex-middle">
                      <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                      <span class="uk-margin-xsmall-left">4.4</span>
                      <span>(68)</span>
                    </div>
                    <div class="uk-width-expand uk-text-right">by Thomas Haller</div>
                  </div>
                </div>
                <a href="recipe.html" class="uk-position-cover"></a>
              </div>
            </div>
    </div>
    <div class="uk-margin-large-top uk-text-small">
      <ul class="uk-pagination uk-flex-center uk-text-500 uk-margin-remove" data-uk-margin="">
        <li><a href="#"><span data-uk-pagination-previous=""></span></a></li>
        <li><a href="#">1</a></li>
        <li class="uk-disabled"><span>...</span></li>
        <li><a href="#">5</a></li>
        <li><a href="#">6</a></li>
        <li class="uk-active"><span>7</span></li>
        <li><a href="#">8</a></li>
        <li><a href="#"><span data-uk-pagination-next=""></span></a></li>
      </ul>
    </div>
  </div>
</div>

<footer class="uk-section uk-section-default">
	<div class="uk-container uk-text-secondary uk-text-500">
		<div class="uk-child-width-1-2@s" data-uk-grid="">
			<div>
				<a href="#" class="uk-logo">Kocina</a>
			</div>
			<div class="uk-flex uk-flex-middle uk-flex-right@s">
				<div data-uk-grid="" class="uk-child-width-auto uk-grid-small">
					<div>
						<a href="https://www.facebook.com/" data-uk-icon="icon: facebook; ratio: 0.8" class="uk-icon-button facebook" target="_blank"></a>
					</div>
					<div>
						<a href="https://www.instagram.com/" data-uk-icon="icon: instagram; ratio: 0.8" class="uk-icon-button instagram" target="_blank"></a>
					</div>
					<div>
						<a href="mailto:info@blacompany.com" data-uk-icon="icon: twitter; ratio: 0.8" class="uk-icon-button twitter" target="_blank"></a>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid="">
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Presentations</a></li>
					<li><a class="uk-link-text" href="#">Professionals</a></li>
					<li><a class="uk-link-text" href="#">Stores</a></li>
				</ul>
			</div>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Webinars</a></li>
					<li><a class="uk-link-text" href="#">Workshops</a></li>
					<li><a class="uk-link-text" href="#">Local Meetups</a></li>
				</ul>
			</div>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Our Initiatives</a></li>
					<li><a class="uk-link-text" href="#">Giving Back</a></li>
					<li><a class="uk-link-text" href="#">Communities</a></li>
				</ul>
			</div>
			<div>
				<ul class="uk-list uk-text-small">
					<li><a class="uk-link-text" href="#">Contact Form</a></li>
					<li><a class="uk-link-text" href="#">Work With Us</a></li>
					<li><a class="uk-link-text" href="#">Visit Us</a></li>
				</ul>
			</div>
		</div>
		<div class="uk-margin-medium-top uk-text-small uk-text-muted">				
			<div>Made by <a class="uk-link-muted" href="https://unbound.studio/" target="_blank">Unbound Studio</a> in Guatemala City.</div>
		</div>
	</div>
</footer>

<div id="offcanvas" data-uk-offcanvas="flip: true; overlay: true">
  <div class="uk-offcanvas-bar">
    <a class="uk-logo" href="index.html">Kocina</a>
    <button class="uk-offcanvas-close" type="button" data-uk-close="ratio: 1.2"></button>
    <ul class="uk-nav uk-nav-primary uk-nav-offcanvas uk-margin-medium-top uk-text-center">
      <li><a href="index.html">Home</a></li>
      <li><a href="recipe.html">Recipe</a></li>
      <li class="uk-active"><a href="search.html">Search</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="sign-in.html">Sign In</a></li>
      <li><a href="sign-up.html">Sign Up</a></li>
    </ul>
    <div class="uk-margin-medium-top">
      <a class="uk-button uk-width-1-1 uk-button-primary" href="sign-up.html">Sign Up</a>
    </div>
    <div class="uk-margin-medium-top uk-text-center">
      <div data-uk-grid="" class="uk-child-width-auto uk-grid-small uk-flex-center">
        <div>
          <a href="https://twitter.com/" data-uk-icon="icon: twitter" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.facebook.com/" data-uk-icon="icon: facebook" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://www.instagram.com/" data-uk-icon="icon: instagram" class="uk-icon-link" target="_blank"></a>
        </div>
        <div>
          <a href="https://vimeo.com/" data-uk-icon="icon: vimeo" class="uk-icon-link" target="_blank"></a>
        </div>
      </div>
    </div>
  </div>
</div>

</body>

</html>