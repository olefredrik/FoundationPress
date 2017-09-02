<?php
/*
Template Name: Kitchen Sink
*/
get_header(); ?>


	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="main-wrap" role="main">
			<header class="kitchen-sink-header">
				<h1 class="entry-title"><?php the_title(); ?></h1><hr>
				<p class="lead">This page includes every single Foundation element so that we can make sure things work together smoothly.</p><hr>
			</header>

			<!-- Main wrapper for the components in the kitchen-sink -->
			<div id="components" class="kitchen-sink-components">

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

					<!-- Abide -->
					<h2 id="abide" class="docs-heading" data-magellan-target="abide"><a href="abide"></a>Abide</h2>

					<form data-abide novalidate>
					  <div class="row">
					    <div class="columns">
					      <div data-abide-error class="alert callout" style="display: none;">
					        <p><i class="fi-alert"></i> There are some errors in your form.</p>
					      </div>
					    </div>
					  </div>
					  <div class="row">
					    <div class="small-12 columns">
					      <label>Number Requireds
					        <input type="text" placeholder="1234" aria-describedby="exampleHelpText" required pattern="number">
					        <span class="form-error">
					          Yo, you had better fill this out, it's requiredxx.
					        </span>
					      </label>
					      <p class="help-text" id="exampleHelpText">Here's how you use this input field!</p>
					    </div>
					    <div class="small-12 columns">
					      <label>Nothing Required!
					        <input type="text" placeholder="Use me, or don't" aria-describedby="exampleHelpTex" data-abide-ignore>
					      </label>
					      <p class="help-text" id="exampleHelpTex">This input is ignored by Abide using `data-abide-ignore`</p>
					    </div>
					    <div class="small-12 columns">
					      <label>Password Required
					        <input type="password" id="password" placeholder="yeti4preZ" aria-describedby="exampleHelpText" required >
					        <span class="form-error">
					          I'm required!
					        </span>
					      </label>
					      <p class="help-text" id="exampleHelpText">Enter a password please.</p>
					    </div>
					    <div class="small-12 columns">
					      <label>Re-enter Password
					        <input type="password" placeholder="yeti4preZ" aria-describedby="exampleHelpText2" required pattern="alpha_numeric" data-equalto="password">
					        <span class="form-error">
					          Hey, passwords are supposed to match!
					        </span>
					      </label>
					      <p class="help-text" id="exampleHelpText2">This field is using the `data-equalto="password"` attribute, causing it to match the password field above.</p>
					    </div>
					  </div>
					  <div class="row">
					    <div class="medium-6 columns">
					      <label>URL Pattern, not required, but throws error if it doesn't match the Regular Expression for a valid URL.
					        <input type="text" placeholder="http://foundation.zurb.com" pattern="url">
					      </label>
					    </div>
					    <div class="medium-6 columns">
					      <label>European Cars, Choose One, it can't be the blank option.
					        <select id="select" required>
					          <option value=""></option>
					          <option value="volvo">Volvo</option>
					          <option value="saab">Saab</option>
					          <option value="mercedes">Mercedes</option>
					          <option value="audi">Audi</option>
					        </select>
					      </label>
					    </div>
					  </div>
					  <div class="row">
					    <fieldset class="medium-6 columns">
					      <legend>Choose Your Favorite, and this is required, so you have to pick one.</legend>
					      <input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Red</label>
					      <input type="radio" name="pokemon" value="Blue" id="pokemonBlue" required><label for="pokemonBlue">Blue</label>
					      <input type="radio" name="pokemon" value="Yellow" id="pokemonYellow"><label for="pokemonYellow">Yellow</label>
					    </fieldset>
					    <fieldset class="medium-6 columns">
					      <legend>Choose Your Favorite - not required, you can leave this one blank.</legend>
					      <input type="radio" name="pockets" value="Red" id="pocketsRed"><label for="pocketsRed">Red</label>
					      <input type="radio" name="pockets" value="Blue" id="pocketsBlue"><label for="pocketsBlue">Blue</label>
					      <input type="radio" name="pockets" value="Yellow" id="pocketsYellow"><label for="pocketsYellow">Yellow</label>
					    </fieldset>
					    <fieldset class="medium-6 columns">
					      <legend>Check these out</legend>
					      <input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
					      <input id="checkbox2" type="checkbox" required><label for="checkbox2">Checkbox 2</label>
					      <input id="checkbox3" type="checkbox"><label for="checkbox3">Checkbox 3</label>
					    </fieldset>
					  </div>
					  <div class="row">
					    <fieldset class="medium-6 columns">
					      <button class="button" type="submit" value="Submit">Submit</button>
					    </fieldset>
					    <fieldset class="medium-6 columns">
					      <button class="button" type="reset" value="Reset">Reset</button>
					    </fieldset>
					  </div>
					</form>

					<hr>

					<!-- Accordion -->
					<h2 id="accordion" class="docs-heading" data-magellan-target="accordion"><a href="#accordion"></a>Accordion</h2>
					<ul class="accordion" data-accordion role="tablist">
						<li class="accordion-item" data-accordion-item>
						<!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
						<a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d">Accordion 1</a>
						<!-- The content pane needs an ID that matches the above href, role="tabpanel", data-tab-content, and aria-labelledby. -->
						<div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">
							Panel 1. Lorem ipsum dolor
						</div>
						</li>
						<li class="accordion-item" data-accordion-item>
						<!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
						<a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d">Accordion 2</a>
						<!-- The content pane needs an ID that matches the above href, role="tabpanel", data-tab-content, and aria-labelledby. -->
						<div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">
							Panel 2. Lorem ipsum dolor
						</div>
						</li>
						<li class="accordion-item" data-accordion-item>
						<!-- The tab title needs role="tab", an href, a unique ID, and aria-controls. -->
						<a href="#panel1d" role="tab" class="accordion-title" id="panel1d-heading" aria-controls="panel1d">Accordion 3</a>
						<!-- The content pane needs an ID that matches the above href, role="tabpanel", data-tab-content, and aria-labelledby. -->
						<div id="panel1d" class="accordion-content" role="tabpanel" data-tab-content aria-labelledby="panel1d-heading">
							Panel 3. Lorem ipsum dolor
						</div>
						</li>
					</ul>
					<hr>

					<!-- Accordion Menu -->
					<h2 id="accordion-menu" class="docs-heading" data-magellan-target="accordion-menu"><a href="#accordion-menu"></a>Accordion Menu</h2>
						<ul class="vertical menu" data-accordion-menu>
							<li>
							<a href="#">Item 1</a>
							<ul class="menu vertical nested is-active">
								<li>
								<a href="#">Item 1A</a>
								<ul class="menu vertical nested">
									<li><a href="#">Item 1Ai</a></li>
									<li><a href="#">Item 1Aii</a></li>
									<li><a href="#">Item 1Aiii</a></li>
								</ul>
								</li>
								<li><a href="#">Item 1B</a></li>
								<li><a href="#">Item 1C</a></li>
							</ul>
							</li>
							<li>
							<a href="#">Item 2</a>
							<ul class="menu vertical nested">
								<li><a href="#">Item 2A</a></li>
								<li><a href="#">Item 2B</a></li>
							</ul>
							</li>
							<li><a href="#">Item 3</a></li>
						</ul>
					<hr>

					<!-- Badge -->
					<h2 id="badge" class="docs-heading" data-magellan-target="badge"><a href="#badge"></a>Badge</h2>
						<span class="secondary badge">2</span>
						<span class="success badge">3</span>
						<span class="alert badge">A</span>
						<span class="warning badge">B</span>
					<hr>

					<!-- Breadcrumbs -->
					<h2 id="breadcrumbs" class="docs-heading" data-magellan-target="breadcrumbs"><a href="#breadcrumbs"></a>Breadcrumbs</h2>
						<nav aria-label="You are here:" role="navigation">
						<ul class="breadcrumbs">
							<li><a href="#">Home</a></li>
							<li><a href="#">Features</a></li>
							<li class="disabled">Gene Splicing</li>
							<li><span class="show-for-sr">Current: </span> Cloning</li>
						</ul>
						</nav>
					<hr>

					<!-- Button -->
					<h2 id="button" class="docs-heading" data-magellan-target="button"><a href="#button"></a>Button</h2>
						<a class="button primary" href="#">Primary</a>
						<a class="button secondary" href="#">Secondary</a>
						<a class="button success" href="#">Success</a>
						<a class="button alert" href="#">Alert</a>
						<a class="button warning" href="#">Warning</a>

						<br />
						<!-- Buttons (actions) -->
						<button type="button" class="success button">Save</button>
						<button type="button" class="alert button">Delete</button>

						<br />
						<a class="tiny button" href="#">So Tiny</a>
						<a class="small button" href="#">So Small</a>
						<a class="button" href="#">So Basic</a>
						<a class="large button" href="#">So Large</a>
						<a class="expanded button" href="#">Such Expand</a>

						<div class="button-group">
							<a class="button">One</a>
							<a class="button">Two</a>
							<a class="button">Three</a>
						</div>
					<hr>

					<!-- Callout -->
					<h2 id="callout" class="docs-heading" data-magellan-target="callout"><a href="#callout"></a>Callout</h2>
						<div class="callout">
						  <h5>This is a default callout.</h5>
						  <p>It has an easy to override visual style, and is appropriately subdued.</p>
						  <a href="#">It's dangerous to go alone, take this.</a>
						</div>

						<div class="callout primary">
						  <h5>This is a primary callout</h5>
						  <p>It has an easy to override visual style, and is appropriately subdued.</p>
						  <a href="#">It's dangerous to go alone, take this.</a>
						</div>

						<div class="callout secondary">
							<h5>This is a secondary callout</h5>
							<p>It has an easy to override visual style, and is appropriately subdued.</p>
							<a href="#">It's dangerous to go alone, take this.</a>
						</div>

						<div class="callout success">
							<h5>This is a success callout</h5>
							<p>It has an easy to override visual style, and is appropriately subdued.</p>
							<a href="#">It's dangerous to go alone, take this.</a>
						</div>

						<div class="callout warning">
							<h5>This is a warning callout</h5>
							<p>It has an easy to override visual style, and is appropriately subdued.</p>
							<a href="#">It's dangerous to go alone, take this.</a>
						</div>

						<div class="callout alert">
							<h5>This is an alert callout</h5>
							<p>It has an easy to override visual style, and is appropriately subdued.</p>
							<a href="#">It's dangerous to go alone, take this.</a>
						</div>
					<hr>

					<!-- Cards -->
					<h2 id="cards" class="docs-heading" data-magellan-target="cards"><a href="#cards"></a>Cards</h2>

					<div class="cards-container">

						<div class="card">
							<img src="https://placeimg.com/300/200/arch">
							<div class="card-content">
								<h4>Dreams feel real</h4>
								<p>I'm going to improvise. Listen, there's something you should know about me... about inception.</p>
								<small>Last updated 1 minute ago</small>
							</div>
						</div>

						<div class="card">
							<img src="https://placeimg.com/300/200/nature">
							<div class="card-content">
								<h4>Menus</h4>
								<p>Cards play nicely with menus too! Give them a try.</p>
								<ul class="menu simple">
									<li><a href="#">One</a></li>
									<li><a href="#">Two</a></li>
									<li><a href="#">Three</a></li>
								</ul>
							</div>
						</div>

						<div class="card">
							<div class="card-divider">
								<p>Featured</p>
							</div>
							<div class="card-content">
								<h4>Your title here!</h4>
								<p>An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
							</div>
						</div>

						<div class="card">
							<img src="https://placeimg.com/300/200/people">
							<div class="card-content">
								<h4>Buttons!</h4>
								<p>Who doesn't love a good button? Buttons work in all of their forms too.</p>
								<a class="button" href="#">I'm a button</a>
							</div>
						</div>

						<div class="card">
							<img src="https://placeimg.com/300/200/tech">
							<div class="card-content">
								<h4>And button groups...</h4>
								<p>Button groups also work great!</p>
								<div class="button-group">
									<a class="button">One</a>
									<a class="button">Two</a>
									<a class="button">Three</a>
								</div>
							</div>
						</div>

						<div class="card text-center">
							<div class="card-divider">
								<p>Centered</p>
							</div>
						<img src="https://placeimg.com/300/200/animals">
							<div class="card-content">
								<p>The utility classes like .text-center work great too.</p>
								<a class="button" href="#">Click me</a>
							</div>
						</div>

					</div>
					<hr>

					<!-- Close Button -->
					<h2 id="close-button" class="docs-heading" data-magellan-target="close-button"><a href="#close-button"></a>Close Button</h2>
						<div class="callout">
							<button class="close-button" aria-label="Close alert" type="button">
							<span aria-hidden="true">&times;</span>
							</button>
							<p>This is a static close button example.</p>
						</div>
					<hr>

					<!-- Drilldown Menu -->
					<h2 id="drilldown-menu" class="docs-heading" data-magellan-target="drilldown-menu"><a href="#drilldown-menu"></a>Drilldown Menu</h2>
						<ul class="vertical menu" data-drilldown style="width: 200px" id="m1">
							<li>
							<a href="#">Item 1</a>
							<ul class="vertical menu" id="m2">
								<li>
								<a href="#">Item 1A</a>
								<ul class="vertical menu" id="m3">
									<li><a href="#">Item 1Aa</a></li>
									<li><a href="#">Item 1Ba</a></li>
									<li><a href="#">Item 1Ca</a></li>
									<li><a href="#">Item 1Da</a></li>
									<li><a href="#">Item 1Ea</a></li>
								</ul>
								</li>
								<li><a href="#">Item 1B</a></li>
								<li><a href="#">Item 1C</a></li>
								<li><a href="#">Item 1D</a></li>
								<li><a href="#">Item 1E</a></li>
							</ul>
							</li>
							<li>
							<a href="#">Item 2</a>
							<ul class="vertical menu">
								<li><a href="#">Item 2A</a></li>
								<li><a href="#">Item 2B</a></li>
								<li><a href="#">Item 2C</a></li>
								<li><a href="#">Item 2D</a></li>
								<li><a href="#">Item 2E</a></li>
							</ul>
							</li>
							<li>
							<a href="#">Item 3</a>
							<ul class="vertical menu">
								<li><a href="#">Item 3A</a></li>
								<li><a href="#">Item 3B</a></li>
								<li><a href="#">Item 3C</a></li>
								<li><a href="#">Item 3D</a></li>
								<li><a href="#">Item 3E</a></li>
							</ul>
							</li>
							<li><a href='#'> Item 4</a></li>
						</ul>
					<hr>

					<!-- Dropdown Menu -->
					<h2 id="dropdown-menu" class="docs-heading" data-magellan-target="dropdown-menu"><a href="#dropdown-menu"></a>Dropdown Menu</h2>
						<ul class="dropdown menu" data-dropdown-menu>
							<li>
							<a>Item 1</a>
							<ul class="menu">
								<li><a href="#">Item 1A Loooong</a></li>
								<li>
								<a href='#'> Item 1 sub</a>
								<ul class='menu'>
									<li><a href='#'>Item 1 subA</a></li>
									<li><a href='#'>Item 1 subB</a></li>
									<li>
									<a href='#'> Item 1 sub</a>
									<ul class='menu'>
										<li><a href='#'>Item 1 subA</a></li>
										<li><a href='#'>Item 1 subB</a></li>
									</ul>
									</li>
									<li>
									<a href='#'> Item 1 sub</a>
									<ul class='menu'>
										<li><a href='#'>Item 1 subA</a></li>
									</ul>
									</li>
								</ul>
								</li>
								<li><a href="#">Item 1B</a></li>
							</ul>
							</li>
							<li>
							<a href="#">Item 2</a>
							<ul class="menu">
								<li><a href="#">Item 2A</a></li>
								<li><a href="#">Item 2B</a></li>
							</ul>
							</li>
							<li><a href="#">Item 3</a></li>
							<li><a href='#'>Item 4</a></li>
						</ul>
					<hr>

					<!-- Dropdown Pane -->
					<h2 id="dropdown-pane" class="docs-heading" data-magellan-target="dropdown-pane"><a href="#dropdown-pane"></a>Dropdown Pane</h2>
						<button class="button" type="button" data-toggle="example-dropdown">Toggle Dropdown</button>
						<div class="dropdown-pane" id="example-dropdown" data-dropdown>
							Just some junk that needs to be said. Or not. Your choice.
						</div>
					<hr>

					<h2 id="equalizer" class="docs-heading" data-magellan-target="equalizer"><a href="#equalizer"></a>Equalizer</h2>
						<div class="grid-container">
							<div class="grid-x grid-margin-x" data-equalizer data-equalize-on="medium" id="test-eq">
							  <div class="medium-4 cell">
							    <div class="callout" data-equalizer-watch>
							      <img src= "https://placeimg.com/300/200/arch">
							    </div>
							  </div>
							  <div class="medium-4 cell">
							    <div class="callout" data-equalizer-watch>
							      <p>Pellentesque habitant morbi tristique senectus et netus et, ante.</p>
							    </div>
							  </div>
							  <div class="medium-4 cell">
							    <div class="callout" data-equalizer-watch>
							      <img src= "https://placeimg.com/400/100/arch">
							    </div>
							  </div>
							</div>
						</div>
					<hr>

					<!-- Flex Video -->
					<h2 id="flex-video" class="docs-heading" data-magellan-target="flex-video"><a href="#flex-video"></a>Flex Video</h2>
						<div class="flex-video">
							<iframe width="420" height="315" src="https://www.youtube.com/embed/V9gkYw35Vws" frameborder="0" allowfullscreen></iframe>
						</div>
					<hr>

					<!-- Forms -->
					<h2 id="forms" class="docs-heading" data-magellan-target="forms"><a  href="#forms"></a>Forms</h2>
						<form>
							<label>Input Label
							<input type="text" placeholder=".small-12.columns" aria-describedby="exampleHelpText">
							</label>
							<p class="help-text" id="exampleHelpText">Here's how you use this input field!</p>
							<label>
							How many puppies?
							<input type="number" value="100">
							</label>
							<label>
							What books did you read over summer break?
							<textarea placeholder="None"></textarea>
							</label>
							<label>Select Menu
							<select>
								<option value="husker">Husker</option>
								<option value="starbuck">Starbuck</option>
								<option value="hotdog">Hot Dog</option>
								<option value="apollo">Apollo</option>
							</select>
							</label>
							<div class="row">
							<fieldset class="large-6 columns">
								<legend>Choose Your Favorite</legend>
								<input type="radio" name="pokemon" value="Red" id="pokemonRed" required><label for="pokemonRed">Red</label>
								<input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
								<input type="radio" name="pokemon" value="Yellow" id="pokemonYellow"><label for="pokemonYellow">Yellow</label>
							</fieldset>
							<fieldset class="large-6 columns">
								<legend>Check these out</legend>
								<input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
								<input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
								<input id="checkbox3" type="checkbox"><label for="checkbox3">Checkbox 3</label>
							</fieldset>
							</div>
							<div class="row">
							<div class="small-3 columns">
								<label for="middle-label" class="right middle">Label</label>
							</div>

							<div class="small-9 columns">
								<input type="text" id="middle-label" placeholder="Right- and middle-aligned text input">
							</div>
							</div>

							<div class="input-group">
						    <span class="input-group-label">$</span>
						    <input class="input-group-field" type="url">
						    <div class="input-group-button">
						      <input type="submit" class="button" value="Submit">
						    </div>
							</div>

						</form>
					<hr>

					<!-- Grid -->
					<h2 id="grid" class="docs-heading" data-magellan-target="grid"><a href="#grid"></a>Grid (XY)</h2>
						<div class="kitchen-sink-grid">
							<div class="grid-x">
								<div class="cell">full width cell</div>
								<div class="cell">full width cell</div>
							</div>
							<div class="grid-x">
								<div class="small-6 cell">6 cells</div>
								<div class="small-6 cell">6 cells</div>
							</div>
							<div class="grid-x">
								<div class="medium-6 large-4 cell">12/6/4 cells</div>
								<div class="medium-6 large-8 cell">12/6/8 cells</div>
							</div>
						</div>
					<hr>

					<!-- Label -->
					<h2 id="label" class="docs-heading" data-magellan-target="label"><a href="#label"></a>Label</h2>
						<span class="secondary label">Secondary Label</span>
						<span class="success label">Success Label</span>
						<span class="alert label">Alert Label</span>
						<span class="warning label">Warning Label</span>
					<hr>

					<!-- Media Object -->
					<h2 id="media-object" class="docs-heading" data-magellan-target="media-object"><a href="#media-object"></a>Media Object</h2>
						<div class="media-object">
							<div class="media-object-section">
							<img src= "http://placeimg.com/200/200/people">
							</div>
							<div class="media-object-section">
							<h4>Dreams feel real while we're in them.</h4>
							<p>I'm going to improvise. Listen, there's something you should know about me... about inception. An idea is like a virus, resilient, highly contagious. The smallest seed of an idea can grow. It can grow to define or destroy you.</p>
							</div>
						</div>
					<hr>

					<!-- Menu -->
					<h2 id="menu" class="docs-heading" data-magellan-target="menu"><a href="#menu"></a>Menu</h2>
						<ul class="menu">
							<li><a href="#">One</a></li>
							<li><a href="#">Two</a></li>
							<li><a href="#">Three</a></li>
							<li><a href="#">Four</a></li>
						</ul>

						<ul class="menu icon-top">
							<li><a href="#"><i class="fi-list"></i> <span>One</span></a></li>
							<li><a href="#"><i class="fi-list"></i> <span>Two</span></a></li>
							<li><a href="#"><i class="fi-list"></i> <span>Three</span></a></li>
							<li><a href="#"><i class="fi-list"></i> <span>Four</span></a></li>
						</ul>
					<hr>

					<!-- Motion UI -->
					<h2 id="motion-ui" class="docs-heading" data-magellan-target="motion-ui"><a href="#motion-ui"></a>Motion UI</h2>
						<div id="motion-example-1" data-toggler data-animate="fade-in fade-out" data-toggle="motion-example-1" class="callout secondary">
						<p>This panel fades.</p>
						</div>

						<div id="motion-example-2" data-toggler data-animate="slide-in-down slide-out-up" data-toggle="motion-example-2" class="callout secondary">
							<p>This panel slides.</p>
						</div>

						<button type="button" class="button" data-toggle="motion-example-1">Fade</button>
						<button type="button" class="button" data-toggle="motion-example-2">Slide</button>
					<hr>

					<!-- Orbit -->
					<h2 id="orbit" class="docs-heading" data-magellan-target="orbit"><a href="#orbit"></a>Orbit</h2>
						<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
							<ul class="orbit-container">
							<button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
							<button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
							<li class="is-active orbit-slide">
								<div>
								<h3 class="text-center">You can also throw some text in here!</h3>
								<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde harum rem, beatae ipsa consectetur quisquam. Rerum ratione, delectus atque tempore sed, suscipit ullam, beatae distinctio cupiditate ipsam eligendi tempora expedita.</p>
								<h3 class="text-center">This Orbit slide has chill</h3>
								</div>
							</li>
							<li class="orbit-slide">
								<div>
								<h3 class="text-center">You can also throw some text in here!</h3>
								<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde harum rem, beatae ipsa consectetur quisquam. Rerum ratione, delectus atque tempore sed, suscipit ullam, beatae distinctio cupiditate ipsam eligendi tempora expedita.</p>
								<h3 class="text-center">This Orbit slide has chill</h3>
								</div>
							</li>
							<li class="orbit-slide">
								<div>
								<h3 class="text-center">You can also throw some text in here!</h3>
								<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde harum rem, beatae ipsa consectetur quisquam. Rerum ratione, delectus atque tempore sed, suscipit ullam, beatae distinctio cupiditate ipsam eligendi tempora expedita.</p>
								<h3 class="text-center">This Orbit slide has chill</h3>
								</div>
							</li>
							<li class="orbit-slide">
								<div>
								<h3 class="text-center">You can also throw some text in here!</h3>
								<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde harum rem, beatae ipsa consectetur quisquam. Rerum ratione, delectus atque tempore sed, suscipit ullam, beatae distinctio cupiditate ipsam eligendi tempora expedita.</p>
								<h3 class="text-center">This Orbit slide has chill</h3>
								</div>
							</li>
							</ul>
							<nav class="orbit-bullets">
							 <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
							 <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
							 <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
							 <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
						 </nav>
						</div>
					<hr>

					<!-- Pagination -->
					<h2 id="pagination" class="docs-heading" data-magellan-target="pagination"><a href="#pagination"></a>Pagination</h2>
						<ul class="pagination" role="navigation" aria-label="Pagination">
							<li class="disabled">Previous <span class="show-for-sr">page</span></li>
							<li class="current"><span class="show-for-sr">You're on page</span> 1</li>
							<li><a href="#" aria-label="Page 2">2</a></li>
							<li><a href="#" aria-label="Page 3">3</a></li>
							<li><a href="#" aria-label="Page 4">4</a></li>
							<li class="ellipsis" aria-hidden="true"></li>
							<li><a href="#" aria-label="Page 12">12</a></li>
							<li><a href="#" aria-label="Page 13">13</a></li>
							<li><a href="#" aria-label="Next page">Next <span class="show-for-sr">page</span></a></li>
						</ul>
					<hr>

					<!-- Progress Bar -->
					<h2 id="progress-bar" class="docs-heading" data-magellan-target="progress-bar"><a href="#progress-bar"></a>Progress Bar</h2>
					<div class="success progress" role="progressbar" tabindex="0" aria-valuenow="25" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
						<div class="progress-meter" style="width: 25%">
						<p class="progress-meter-text">25%</p>
						</div>
					</div>

					<div class="warning progress">
						<div class="progress-meter" style="width: 50%">
						<p class="progress-meter-text">50%</p>
						</div>
					</div>

					<div class="alert progress">
						<div class="progress-meter" style="width: 75%">
						<p class="progress-meter-text">75%</p>
						</div>
					</div>

					<br /><br />
					<p><strong>Native progress:</strong> As an alternative to our custom progress bar style, you can also opt to use the native <code>&lt;progress&gt;</code> element. It provides a more succinct way to create progress bars, but it's not supported in IE9, and some other older browsers. <a href="http://caniuse.com/#feat=progress">View <code>&lt;progress&gt;</code> element support.</a></p>
					<progress max="100" value="75"></progress>

					<br /><br />
					<p><strong>Native meter:</strong> For the <em>extra</em> adventurous developers out there, we also provide styles for the <code>&lt;meter&gt;</code> element. What's the difference? <code>&lt;progress&gt;</code> represents a value that changes over time, like storage capacity. <code>&lt;meter&gt;</code> represents a value that fluctates around some optimum value. It also has <em>no</em> support in Internet Explorer, Mobile Safari, or Android 2. <a href="http://caniuse.com/#search=meter">View <code>&lt;meter&gt;</code> element support.</a></p>
					<meter value="30" min="0" low="33" high="66" optimum="100" max="100"></meter>
					<meter value="50" min="0" low="33" high="66" optimum="100" max="100"></meter>
					<meter value="100" min="0" low="33" high="66" optimum="100" max="100"></meter>
					<hr>

					<!-- Reveal -->
					<h2 id="reveal" class="docs-heading" data-magellan-target="reveal"><a href="#reveal"></a>Reveal</h2>
					<p><a data-open="exampleModal1">Click me for a basic modal</a></p>
					<p><a data-toggle="exampleModal8">Click me for a full-screen modal</a></p>

						<!-- Basic modal -->
					<div class="reveal" id="exampleModal1" data-reveal>
					<h2>This is a basic modal</h2>
					<p class="lead">Using hipster ipsum for dummy text</p>
					<p>Stumptown direct trade swag hella iPhone post-ironic. Before they sold out blog twee, quinoa forage pour-over microdosing deep v keffiyeh fanny pack. Occupy polaroid tilde, bitters vegan man bun gentrify meggings.</p>
					<button class="close-button" data-close aria-label="Close reveal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>

						<!-- Full screen modal -->
					<div class="full reveal" id="exampleModal8" data-reveal>
					<h2>Full screen modal</h2>
					<img src="https://placeimg.com/800/600/arch" alt="Intropsective Cage">
					<button class="close-button" data-close aria-label="Close reveal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<hr>

					<!-- Slider -->
					<h2 id="slider" class="docs-heading" data-magellan-target="slider"><a href="#slider"></a>Slider</h2>
						<div class="slider" data-slider data-initial-start='50' data-end='200'>
							<span class="slider-handle"  data-slider-handle role="slider" tabindex="1"></span>
							<span class="slider-fill" data-slider-fill></span>
							<input type="hidden">
						</div>

						<div class="slider vertical" data-slider data-initial-start='25' data-end='200' data-vertical="true">
							<span class="slider-handle" data-slider-handle role="slider" tabindex="1"></span>
							<span class="slider-fill" data-slider-fill></span>
							<input type="hidden">
						</div>
						<br /><br />
						<p><strong>Native range slider:</strong> In Foundation 6.2, we introduced styles for <code>&lt;input type="range"&gt;</code>, the native HTML element for range sliders. It's not supported in every browser, namely IE9 and some older mobile browsers. <a href="http://caniuse.com/#feat=input-range">View browser support for the range input type.</a></p>
						<input type="range" min="1" max="100" step="1">
					<hr>

					<!-- Switch -->
					<h2 id="switch" class="docs-heading" data-magellan-target="switch"><a href="#switch"></a>Switch</h2>
						<div class="switch tiny">
							<input class="switch-input" id="tinySwitch" type="checkbox" name="exampleSwitch">
							<label class="switch-paddle" for="tinySwitch">
							<span class="show-for-sr">Tiny Sandwiches Enabled</span>
							</label>
						</div>

						<div class="switch small">
							<input class="switch-input" id="smallSwitch" type="checkbox" name="exampleSwitch">
							<label class="switch-paddle" for="smallSwitch">
							<span class="show-for-sr">Small Portions Only</span>
							</label>
						</div>

						<div class="switch large">
							<input class="switch-input" id="largeSwitch" type="checkbox" name="exampleSwitch">
							<label class="switch-paddle" for="largeSwitch">
							<span class="show-for-sr">Show Large Elephants</span>
							</label>
						</div>
					<hr>

					<!-- Table -->
					<h2 id="table" class="docs-heading" data-magellan-target="table"><a href="#table"></a>Table</h2>
						<table>
							<thead>
							<tr>
								<th width="200">Table Header</th>
								<th>Table Header</th>
								<th width="150">Table Header</th>
								<th width="150">Table Header</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Content Goes Here</td>
								<td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
								<td>Content Goes Here</td>
								<td>Content Goes Here</td>
							</tr>
							<tr>
								<td>Content Goes Here</td>
								<td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
								<td>Content Goes Here</td>
								<td>Content Goes Here</td>
							</tr>
							<tr>
								<td>Content Goes Here</td>
								<td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
								<td>Content Goes Here</td>
								<td>Content Goes Here</td>
							</tr>
							</tbody>
						</table>
					<hr>

					<!-- Tabs -->
					<h2 id="tabs" class="docs-heading" data-magellan-target="tabs"><a href="#tabs"></a>Tabs</h2>

					<ul class="tabs" data-responsive-accordion-tabs="accordion medium-tabs" id="example-tabs">
						<li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Tab 1</a></li>
						<li class="tabs-title"><a href="#panel2">Tab 2</a></li>
						<li class="tabs-title"><a href="#panel3">Tab 3</a></li>
						<li class="tabs-title"><a href="#panel4">Tab 4</a></li>
						<li class="tabs-title"><a href="#panel5">Tab 5</a></li>
						<li class="tabs-title"><a href="#panel6">Tab 6</a></li>
					</ul>

					<div class="tabs-content" data-tabs-content="example-tabs">

						<div class="tabs-panel is-active" id="panel1">
							<p>One</p>
							<p>Check me out! I'm a super cool Tab panel with text content! On medium-down screen sizes, this component will transform into an accordion.</p>
						</div>
						<div class="tabs-panel" id="panel2">
							<p>Two</p>
							<img class="thumbnail" src="http://placeimg.com/200/200/arch">
						</div>
						<div class="tabs-panel" id="panel3">
							<p>Three</p>
							<p>Check me out! I'm a super cool Tab panel with text content!</p>
						</div>
						<div class="tabs-panel" id="panel4">
							<p>Four</p>
							<img class="thumbnail" src="http://placeimg.com/200/200/arch">
						</div>
						<div class="tabs-panel" id="panel5">
							<p>Five</p>
							<p>Check me out! I'm a super cool Tab panel with text content!</p>
						</div>
						<div class="tabs-panel" id="panel6">
							<p>Six</p>
							<img class="thumbnail" src="http://placeimg.com/200/200/arch">
						</div>
					</div>
					<hr>

					<!-- Thumbnail -->
					<h2 id="thumbnail" class="docs-heading" data-magellan-target="thumbnail"><a href="#thumbnail"></a>Thumbnail</h2>
						<div class="row">
							<div class="small-4 columns">
							<img class="thumbnail" src="http://placeimg.com/200/200/nature" alt="Placeholder image.">
							</div>
							<div class="small-4 columns">
							<img class="thumbnail" src="http://placeimg.com/200/200/nature" alt="Placeholder image.">
							</div>
							<div class="small-4 columns">
							<img class="thumbnail" src="http://placeimg.com/200/200/nature" alt="Placeholder image.">
							</div>
						</div>
					<hr>

					<!-- Title Bar -->
					<h2 id="title-bar" class="docs-heading" data-magellan-target="title-bar"><a href="#title-bar"></a>Title Bar</h2>
						<div class="title-bar">
							<div class="title-bar-left">
							<button class="menu-icon" type="button"></button>
							<span class="title-bar-title">FoundationPress</span>
							</div>
							<div class="title-bar-right">
							<button class="menu-icon" type="button"></button>
							</div>
						</div>
					<hr>

					<!-- Toggler -->
					<h2 id="toggler" class="docs-heading" data-magellan-target="toggler"><a href="#toggler"></a>Toggler</h2>
					<p><button class="button small primary" type="button" data-toggle="menuBar">Toggle width</button></p>

					<ul class="menu" id="menuBar" data-toggler=".expanded">
						<li><a href="#">One</a></li>
						<li><a href="#">Two</a></li>
						<li><a href="#">Three</a></li>
						<li><a href="#">Four</a></li>
					</ul>
					<hr>

					<!-- Tooltip -->
					<h2 id="tooltip" class="docs-heading" data-magellan-target="tooltip"><a href="#tooltip"></a>Tooltip</h2>
							<p>The <span data-tooltip aria-haspopup="true" class="has-tip" data-disable-hover='false' tabindex=1 title="Fancy word for a beetle.">scarabaeus</span> hung quite clear of any branches, and, if allowed to fall, would have fallen at our feet. Legrand immediately took the scythe, and cleared with it a circular space, three or four yards in diameter, just beneath the insect, and, having accomplished this, ordered Jupiter to let go the string and come down from the tree.</p>
					<hr>

					<!-- Top bar -->
					<h2 id="top-bar" class="docs-heading" data-magellan-target="top-bar"><a href="#top-bar"></a>Top Bar</h2>
						<div class="top-bar">

							<div class="top-bar-left">
							<ul class="dropdown menu" data-dropdown-menu>
								<li class="menu-text">Site Title</li>
								<li class="has-submenu">
								<a href="#">One</a>
								<ul class="submenu menu vertical" data-submenu>
									<li><a href="#">One</a></li>
									<li><a href="#">Two</a></li>
									<li><a href="#">Three</a></li>
								</ul>
								</li>
								<li><a href="#">Two</a></li>
								<li><a href="#">Three</a></li>
							</ul>
							</div>

							<div class="top-bar-right">
							<ul class="menu">
								<li><input type="search" placeholder="Search"></li>
								<li><button type="button" class="button">Search</button></li>
							</ul>
							</div>
						</div>
					<hr>

					<!-- Visibility Classes -->
					<h2 id="visibility-classes" class="docs-heading" data-magellan-target="visibility-classes"><a href="#visibility-classes"></a>Visibility classes</h2>
						<div class="visibility-classes">

							<p>You are on a small screen or larger.</p>
							<p class="show-for-medium">You are on a medium screen or larger.</p>
							<p class="show-for-large">You are on a large screen or larger.</p>
							<p class="show-for-small-only">You are <em>definitely</em> on a small screen.</p>
							<p class="show-for-medium-only">You are <em>definitely</em> on a medium screen.</p>
							<p class="show-for-large-only">You are <em>definitely</em> on a large screen.</p>

							<p class="hide-for-medium">You are <em>not</em> on a medium screen or larger.</p>
							<p class="hide-for-large">You are <em>not</em> on a large screen or larger.</p>
							<p class="hide-for-small-only">You are <em>definitely not</em> on a small screen.</p>
							<p class="hide-for-medium-only">You are <em>definitely not</em> on a medium screen.</p>
							<p class="hide-for-large-only">You are <em>definitely not</em> on a large screen.</p>
							<p class="hide">Can't touch this.</p>

							<p class="invisible">Can sort of touch this.</p>

							<p class="show-for-landscape">You are in landscape orientation.</p>
							<p class="show-for-portrait">You are in portrait orientation.</p>

							<p class="show-for-sr">This text can only be read by a screen reader.</p>
							<p>There's a line of text above this one, you just can't see it.</p>

							<p aria-hidden="true">This text can be seen, but won't be read by a screen reader.</p>

						</div>
					<hr>

					</article>
				</div>

				<!-- On this page - sidebar nav container -->
				<nav id="kitchen-sink-nav" class="kitchen-sink-nav" data-sticky-container>
					<div class="docs-toc" data-sticky="sidebar" data-anchor="components">
						<ul class="vertical menu docs-sub-menu" data-magellan>
							<li class="docs-menu-title">On this page:</li>
							<li><a href="#abide">Abide</a></li>
							<li><a href="#accordion">Accordion</a></li>
							<li><a href="#accordion-menu">Accordion Menu</a></li>
							<li><a href="#badge">Badge</a></li>
							<li><a href="#breadcrumbs">Breadcrumbs</a></li>
							<li><a href="#button">Button</a></li>
							<li><a href="#callout">Callout</a></li>
							<li><a href="#cards">Cards</a></li>
							<li><a href="#close-button">Close button</a></li>
							<li><a href="#drilldown-menu">Drilldown Menu</a></li>
							<li><a href="#dropdown-menu">Dropdown Menu</a></li>
							<li><a href="#dropdown-pane">Dropdown Pane</a></li>
							<li><a href="#equalizer">Equalizer</a></li>
							<li><a href="#flex-video">Flex Video</a></li>
							<li><a href="#forms">Forms</a></li>
							<li><a href="#grid">Grid</a></li>
							<li><a href="#label">Label</a></li>
							<li><a href="#media-object">Media Object</a></li>
							<li><a href="#menu">Menu</a></li>
							<li><a href="#motion-ui">Motion UI</a></li>
							<li><a href="#orbit">Orbit</a></li>
							<li><a href="#pagination">Pagination</a></li>
							<li><a href="#progress-bar">Progress Bar</a></li>
							<li><a href="#reveal">Reveal</a></li>
							<li><a href="#slider">Slider</a></li>
							<li><a href="#switch">Switch</a></li>
							<li><a href="#table">Table</a></li>
							<li><a href="#tabs">Tabs</a></li>
							<li><a href="#thumbnail">Thumbnail</a></li>
							<li><a href="#title-bar">Title Bar</a></li>
							<li><a href="#toggler">Toggler</a></li>
							<li><a href="#tooltip">Tooltip</a></li>
							<li><a href="#top-bar">Top Bar</a></li>
							<li><a href="#visibility-classes">Visibility Classes</a></li>
						</ul>
					</div>
				</nav>

			</div><!-- Close main-wrap -->

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	<?php endwhile; ?>
<?php get_footer();
