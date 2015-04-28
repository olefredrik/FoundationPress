<?php
/*
Template Name: Kitchen Sink
*/
get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">

	<?php /* Start loop */ ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<h3 class="subheader">This page includes every single Foundation element so that we can make sure things work together smoothly.</h3>

			<h4 id="alert-boxes">Alert Boxes</h4>
			<div data-alert class="alert-box radius">
				This is a standard alert (div.alert-box).
				<a href="" class="close">&times;</a>
			</div>

			<div data-alert class="alert-box success">
				This is a success alert (div.alert-box.success).
				<a href="" class="close">&times;</a>
			</div>

			<div data-alert class="alert-box alert round">
				This is an alert (div.alert-box.alert.round).
				<a href="" class="close">&times;</a>
			</div>

			<div data-alert class="alert-box secondary">
				This is a secondary alert (div.alert-box.secondary).
				<a href="" class="close">&times;</a>
			</div>

			<hr>
			<h4 id="block-grid">Block Grid</h4>
			<ul class="small-block-grid-2 large-block-grid-4">
				<li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/comet-th.jpg" alt=""></li>
				<li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/launch-th.jpg" alt=""></li>
				<li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/space-th.jpg" alt=""></li>
				<li><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/spacewalk-th.jpg" alt=""></li>
			</ul>

			<hr>
			<h4 id="breadcrumbs">Breadcrumbs</h4>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li><a href="#">Features</a></li>
				<li class="unavailable"><a href="#">Gene Splicing</a></li>
				<li class="current"><a href="#">Cloning</a></li>
			</ul>

			<hr>
			<h4 id="buttons">Buttons</h4>
			<div class="row">
				<div class="small-6 large-6 columns">
					<a href="#" class="tiny button">.tiny.button</a><br>
					<a href="#" class="small button">.small.button</a><br>
					<a href="#" class="button">.button</a><br>
					<a href="#" class="button expand">.expand</a><br>
				</div>
				<div class="small-6 large-6 columns">
					<a href="#" class="tiny button secondary">.tiny.secondary</a><br>
					<a href="#" class="small button success radius">.small.success.radius</a><br>
					<a href="#" class="button alert round disabled">.round.disabled</a><br>
				</div>
			</div>

			<hr>
			<h4 id="button-groups">Button Groups</h4>
			<ul class="button-group">
				<li><a href="#" class="small button">Button 1</a></li>
				<li><a href="#" class="small button">Button 2</a></li>
				<li><a href="#" class="small button">Button 3</a></li>
			</ul>
			<ul class="button-group radius">
				<li><a href="#" class="button secondary">Button 1</a></li>
				<li><a href="#" class="button secondary">Button 2</a></li>
				<li><a href="#" class="button secondary">Button 3</a></li>
				<li><a href="#" class="button secondary">Button 4</a></li>
			</ul>
			<ul class="button-group round even-3">
				<li><a href="#" class="button alert">Button 1</a></li>
				<li><a href="#" class="button alert">Button 2</a></li>
				<li><a href="#" class="button alert">Button 3</a></li>
			</ul>
			<ul class="button-group round even-3">
				<li><input type="submit" class="button success" value="Button 1"></li>
				<li><input type="submit" class="button success" value="Button 2"></li>
				<li><input type="submit" class="button success" value="Button 3"></li>
			</ul>

			<hr>
			<h4 id="dropdown-buttons">Dropdown Buttons</h4>
			<ul id="drop" class="f-dropdown content" data-dropdown-content>
				<li><a href="#">This is a link</a></li>
				<li><a href="#">This is another</a></li>
				<li><a href="#">Yet another</a></li>
			</ul>

			<a href="#" data-dropdown="drop" class="tiny button dropdown">Dropdown Button</a><br>
			<a href="#" data-dropdown="drop" class="small secondary radius button dropdown">Dropdown Button</a><br>
			<a href="#" data-dropdown="drop" class="button alert round dropdown">Dropdown Button</a><br>
			<a href="#" data-dropdown="drop" class="large success button dropdown">Dropdown Button</a><br>
			<a href="#" data-dropdown="drop" class="large button dropdown expand">Dropdown Button</a>

			<hr>
			<h4 id="split-buttons">Split Buttons</h4>
			<p>
				<a href="#" class="tiny button split">Split Button <span data-dropdown="drop"></span></a><br>
				<a href="#" class="small secondary radius button split">Split Button <span data-dropdown="drop"></span></a><br>
				<a href="#" class="button alert round split">Split Button <span data-dropdown="drop"></span></a><br>
				<a href="#" class="large success button split">Split Button <span data-dropdown="drop"></span></a>
			</p>

			<hr>
			<h4 id="clearing">Clearing</h4>
			<div>
				<ul class="clearing-thumbs" data-clearing>
					<li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/comet.jpg"><img data-caption="Nulla vitae elit libero, a pharetra augue. Cras mattis consectetur purus sit amet fermentum." src="http://foundation.zurb.com/docs/assets/img/examples/comet-th-sm.jpg" alt=""></a></li>
					<li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/earth.jpg"><img src="http://foundation.zurb.com/docs/assets/img/examples/earth-th-sm.jpg" alt=""></a></li>
					<li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/launch.jpg"><img data-caption="Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus." src="http://foundation.zurb.com/docs/assets/img/examples/launch-th-sm.jpg" alt=""></a></li>
					<li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/satelite.jpg"><img src="http://foundation.zurb.com/docs/assets/img/examples/satelite-th-sm.jpg" alt=""></a></li>
					<li><a class="th" href="http://foundation.zurb.com/docs/assets/img/examples/space.jpg"><img data-caption="Integer posuere erat a ante venenatis dapibus posuere velit aliquet." src="http://foundation.zurb.com/docs/assets/img/examples/space-th-sm.jpg" alt=""></a></li>
				</ul>
			</div>

			<hr>
			<h4 id="forms">Forms</h4>
			<form>
				<fieldset>
					<legend>Fieldset</legend>

					<div class="row">
						<div class="large-12 columns">
							<label>Input Label</label>
							<input type="text" placeholder="large-12.columns">
						</div>
					</div>

					<div class="row">
						<div class="large-4 columns">
							<label>Input Label</label>
							<input type="text" placeholder="large-4.columns">
						</div>
						<div class="large-4 columns">
							<label>Input Label</label>
							<input type="text" placeholder="large-4.columns">
						</div>
						<div class="large-4 columns">
							<div class="row collapse">
								<label>Input Label</label>
								<div class="small-9 columns">
									<input type="text" placeholder="small-9.columns">
								</div>
								<div class="small-3 columns">
									<span class="postfix">.com</span>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="large-12 columns">
							<label>Textarea Label</label>
							<textarea placeholder="small-12.columns"></textarea>
						</div>
					</div>

				</fieldset>
			</form>

			<hr>
			<h4 id="dropdowns">Dropdowns</h4>
			<a class="button" data-dropdown="tinyDrop" href="#">Link Dropdown &raquo;</a>
			<a class="button" data-dropdown="contentDrop" href="#">Content Dropdown &raquo;</a>
			<!-- Dropdowns -->
			<ul class="f-dropdown" data-dropdown-content="" id="tinyDrop">
				<li><a href="#">This is a link</a></li>
				<li><a href="#">This is another</a></li>
				<li><a href="#">Yet another</a></li>
			</ul>

			<div class="f-dropdown content medium" data-dropdown-content="" id= "contentDrop">
				<h4>Title</h4>
				<p>Some text that people will think is awesome! Some text that people will think is awesome! Some text that people will think is awesome!</p><img src="http://foundation.zurb.com/docs/assets/img/examples/launch.jpg" alt="">
				<p>Launching a Discovery Mission</p><a class="button" href="#">Button</a>
			</div>

			<hr>
			<h4 id="flex-video">Flex Video</h4>
			<div class="flex-video">
				<iframe width="420" height="315" src="https://www.youtube.com/embed/s4m5wwM4BWM" frameborder="0" allowfullscreen></iframe>
			</div>

			<hr>
			<h4 id="inline-lists">Inline Lists</h4>
			<ul class="inline-list">
				<li><a href="#">Link 1</a></li>
				<li><a href="#">Link 2</a></li>
				<li><a href="#">Link 3</a></li>
				<li><a href="#">Link 4</a></li>
				<li><a href="#">Link 5</a></li>
			</ul>

			<hr>
			<h4 id="joyride">Joyride</h4>
			<div>
				<a class="secondary button" id="start-jr">Start Joyride</a>

				<h5 class="so-awesome" id="numero1">Build Joyride with HTML</h5>

				<p class="so-awesome" id="numero2">Stop Number 2 for You!</p><!--stops-->

				<ol class="joyride-list" data-joyride="">
					<li data-class="custom so-awesome" data-id="numero1" data-text="Next">
						<h4>Stop #1</h4>
						<p>You can control all the details for you tour stop. Any valid HTML will work inside of Joyride.</p>
					</li>
					<li data-button="Next" data-id="numero2">
						<h4>Stop #2</h4>
						<p>Get the details right by styling Joyride with a custom stylesheet!</p>
					</li>
					<li data-button="Next">
						<h4>Stop #3</h4>
						<p>It works as a modal too!</p>
					</li>
				</ol>
			</div>

			<hr>
			<h4 id="keystroke">Keystroke</h4>
			<p>To make something pretty, press and hold <kbd>cmd + alt + shift + w + a + !</kbd></p>

			<hr>
			<h4 id="labels">Labels</h4>
			<p>
				<span class="label">Regular Label</span><br>
				<span class="radius secondary label">Radius Secondary Label</span><br>
				<span class="round alert label">Round Alert Label</span><br>
				<span class="success label">Success Label</span><br>
			</p>

			<hr>
			<h4 id="magellan">Magellan</h4>
			<div data-magellan-expedition="fixed">
				<dl class="sub-nav">
					<dd data-magellan-arrival="build"><a href="#build">Build with HTML</a></dd>
					<dd data-magellan-arrival="js"><a href="#js">Using Javascript</a></dd>
				</dl>
			</div>

			<a name="build"></a>
			<h5 data-magellan-destination="build">Build With Predefined HTML Structure</h5>
			<p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper.</p>

			<a name="js"></a>
			<h5 data-magellan-destination="js">Awesome JS Goodness</h5>
			<p>Nullam quis risus eget urna mollis ornare vel eu leo. Donec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Vestibulum id ligula porta felis euismod semper.</p>

			<hr>
			<h4 id="orbit">Orbit</h4>
			<div class="row">
				<div class="large-12 columns">
					<ul id="featured1" data-orbit data-options="timer_speed:5000;">
						<li>
							<img src="http://foundation.zurb.com/docs/assets/img/examples/satelite-orbit.jpg" alt=""/>
							<div class="orbit-caption">
								Caption One. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
							</div>
						</li>
						<li>
							<img src="http://foundation.zurb.com/docs/assets/img/examples/andromeda-orbit.jpg" alt=""/>
							<div class="orbit-caption">
								Caption Two. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
							</div>
						</li>
						<li>
							<img src="http://foundation.zurb.com/docs/assets/img/examples/launch-orbit.jpg" alt=""/>
							<div class="orbit-caption">
								Caption Three. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
							</div>
						</li>
					</ul>
				</div>
			</div>

			<hr>
			<h4 id="pagination">Pagination</h4>
			<ul class="pagination">
				<li class="arrow unavailable"><a href="">&laquo;</a></li>
				<li class="current"><a href="">1</a></li>
				<li><a href="">2</a></li>
				<li><a href="">3</a></li>
				<li><a href="">4</a></li>
				<li class="unavailable"><a href="">&hellip;</a></li>
				<li><a href="">12</a></li>
				<li><a href="">13</a></li>
				<li class="arrow"><a href="">&raquo;</a></li>
			</ul>

			<hr>
			<h4 id="panels">Panels</h4>
			<div class="row">
				<div class="large-6 columns">
					<div class="panel">
						<h5>This is a regular panel.</h5>
						<p>It has an easy to override visual style, and is appropriately subdued.</p>
					</div>
				</div>
				<div class="large-6 columns">
					<div class="panel callout radius">
						<h5>This is a callout panel with radiused edges.</h5>
						<p>It&#39;s a little ostentatious, but useful for important content.</p>
					</div>
				</div>
			</div>

			<h4 id="pricing-tables">Pricing Tables</h4>
			<div class="row">
				<div class="large-4 columns">
					<ul class="pricing-table">
						<li class="title">Standard</li>
						<li class="price">$99.99</li>
						<li class="description">An awesome description</li>
						<li class="bullet-item">1 Database</li>
						<li class="bullet-item">5GB Storage</li>
						<li class="bullet-item">20 Users</li>
						<li class="cta-button"><a class="button" href="#">Buy Now</a></li>
					</ul>
				</div>
			</div>

			<hr>
			<h4 id="progress-bars">Progress Bars</h4>
			<div class="progress large-6"><span class="meter" style="width: 40%"></span></div>
			<div class="radius progress success large-8"><span class="meter" style="width: 80%"></span></div>
			<div class="nice round progress alert large-10"><span class="meter" style="width: 30%"></span></div>
			<div class="nice secondary progress"><span class="meter" style="width: 50%"></span></div>

			<hr>
			<h4 id="reveal">Reveal</h4>
			<a href="#" data-reveal-id="firstModal" class="radius button">Example Modal&hellip;</a>
			<a href="#" data-reveal-id="videoModal" class="radius button">Example Modal w/Video&hellip;</a>
			<!-- Reveal Modals begin -->
			<div id="firstModal" class="reveal-modal" data-reveal>
				<h2>This is a modal.</h2>
				<p>Reveal makes these very easy to summon and dismiss. The close button is simply an anchor with a unicode character icon and a class of <code>close-reveal-modal</code>. Clicking anywhere outside the modal will also dismiss it.</p>
				<p>Finally, if your modal summons another Reveal modal, the plugin will handle that for you gracefully.</p>
				<a href="#" data-reveal-id="secondModal" class="secondary button">Second Modal...</a>
				<a class="close-reveal-modal">&#215;</a>
			</div>

			<div id="secondModal" class="reveal-modal" data-reveal>
				<h2>This is a second modal.</h2>
				<p>See? It just slides into place after the other first modal. Very handy when you need subsequent dialogs, or when a modal option impacts or requires another decision.</p>
				<a class="close-reveal-modal">&#215;</a>
			</div>

			<div id="videoModal" class="reveal-modal large" data-reveal>
				<h2>This modal has video</h2>
				<div class="flex-video">
						<iframe width="420" height="315" src="//www.youtube.com/embed/aiBt44rrslw" frameborder="0" allowfullscreen></iframe>
				</div>
				<a class="close-reveal-modal">&#215;</a>
			</div>
			<!-- Reveal Modals end -->

			<hr>
			<h4 id="sliders">Sliders</h4>
			<div class="range-slider" data-slider>
				<span class="range-slider-handle"></span>
				<span class="range-slider-active-segment"></span>
				<input type="hidden">
			</div>
			<div class="range-slider radius" data-slider>
				<span class="range-slider-handle"></span>
				<span class="range-slider-active-segment"></span>
				<input type="hidden">
			</div>
			<div class="range-slider round" data-slider>
				<span class="range-slider-handle"></span>
				<span class="range-slider-active-segment"></span>
				<input type="hidden">
			</div>
			<div class="range-slider" data-slider data-options="step: 20;">
				<span class="range-slider-handle"></span>
				<span class="range-slider-active-segment"></span>
				<input type="hidden">
			</div>

			<hr>
			<h4 id="accordion">Accordion</h4>
			<ul class="accordion" data-accordion="">
  <li class="accordion-navigation active">
    <a href="#panel1a">Accordion 1</a>
    <div id="panel1a" class="content active">
      <ul class="small-block-grid-2 large-block-grid-3 ">
        <li><img src="http://placehold.it/350x150"></li>
        <li><img src="http://placehold.it/350x150"></li>
        <li><img src="http://placehold.it/350x150"></li>
      </ul>
    </div>
  </li>
  <li class="accordion-navigation">
    <a href="#panel2a">Accordion 2</a>
    <div id="panel2a" class="content">
      <div class="row">
        <div class="small-6 columns">
          <p>Panel 2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="small-6 columns">
        <img src="http://placehold.it/350x150">
      </div>
    </div>
  </div></li>
  <li class="accordion-navigation">
    <a href="#panel3a">Accordion 3</a>
    <div id="panel3a" class="content">
      Panel 3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </li>
</ul>

			<hr>
			<h4 id="tabs">Tabs</h4>
			<dl class="tabs" data-tab>
				<dd class="active"><a href="#panel2-1">Tab 1</a></dd>
				<dd><a href="#panel2-2">Tab 2</a></dd>
				<dd><a href="#panel2-3">Tab 3</a></dd>
				<dd><a href="#panel2-4">Tab 4</a></dd>
			</dl>
			<div class="tabs-content">
				<div class="content active" id="panel2-1">
					<p>First panel content goes here...</p>
				</div>
				<div class="content" id="panel2-2">
					<p>Second panel content goes here...</p>
				</div>
				<div class="content" id="panel2-3">
					<p>Third panel content goes here...</p>
				</div>
				<div class="content" id="panel2-4">
					<p>Fourth panel content goes here...</p>
				</div>
			</div>

			<dl class="tabs vertical" data-tab="">
				<dd class="active"><a href="#panel1a">Tab 1</a></dd>
				<dd><a href="#panel2a">Tab 2</a></dd>
				<dd><a href="#panel3a">Tab 3</a></dd>
				<dd><a href="#panel4a">Tab 4</a></dd>
			</dl>

			<div class="tabs-content vertical">
				<div class="content active" id="panel1a">
					<p>Panel 1 content goes here.</p>
				</div>

				<div class="content" id="panel2a">
					<p>Panel 2 content goes here.</p>
				</div>

				<div class="content" id="panel3a">
					<p>Panel 3 content goes here.</p>
				</div>

				<div class="content" id="panel4a">
					<p>Panel 4 content goes here.</p>
				</div>
			</div>

			<hr>
			<h4 id="side-nav">Side Nav</h4>
			<div class="row">
				<div class="large-4 columns end">
					<ul class="side-nav">
						<li class="active"><a href="#">Link 1</a></li>
						<li><a href="#">Link 2</a></li>
						<li class="divider"></li>
						<li><a href="#">Link 3</a></li>
						<li><a href="#">Link 4</a></li>
					</ul>
				</div>
			</div>

			<hr>
			<h4 id="sub-nav">Sub Nav</h4>
			<dl class="sub-nav">
				<dt>Filter:</dt>
				<dd class="active"><a href="#">All</a></dd>
				<dd><a href="#">Active</a></dd>
				<dd><a href="#">Pending</a></dd>
				<dd><a href="#">Suspended</a></dd>
			</dl>

			<hr>
			<h4 id="tables">Tables</h4>
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
			<h4 id="thumbnails">Thumbnails</h4>
			<p><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/earth-th-sm.jpg" alt=""><img class="th" src="http://foundation.zurb.com/docs/assets/img/examples/space-th-sm.jpg" alt=""></p>

			<hr>
			<h4 id="tooltips">Tooltips</h4>
			<p>The tooltips can be positioned on the <span data-tooltip class="has-tip" data-width="210" title="I'm on bottom and the default position.">&quot;tip-bottom&quot;</span>, which is the default position, <span data-tooltip class="has-tip tip-top noradius" data-width="210" title="I'm on the top and I'm not rounded!">&quot;tip-top&quot; (hehe)</span>, <span data-tooltip="left" class="has-tip tip-left" data-width="90" title="I'm on the left!">&quot;tip-left&quot;</span>, or <span data-tooltip="right" class="has-tip tip-right" data-width="120" title="I'm on the right!">&quot;tip-right&quot;</span> of the target element by adding the appropriate class to them. You can even add your own custom class to style each tip differently. On a small device, the tooltips are full width and bottom aligned.</p>

			<hr>
			<h4 id="top-bar">Top Bar</h4>
			 <nav class="top-bar" data-topbar>
				<ul class="title-area">
					<!-- Title Area -->
					<li class="name">
						<h1>
							<a href="#">
								Top Bar Title
							</a>
						</h1>
					</li>
					<li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
				</ul>

				<section class="top-bar-section">
					<!-- Right Nav Section -->
					<ul class="right">
						<li class="divider"></li>
						<li class="has-dropdown">
							<a href="#">Main Item 1</a>
							<ul class="dropdown">
								<li><label>Section Name</label></li>
								<li class="has-dropdown">
									<a href="#" class="">Has Dropdown, Level 1</a>
									<ul class="dropdown">
										<li><a href="#">Dropdown Options</a></li>
										<li><a href="#">Dropdown Options</a></li>
										<li><a href="#">Level 2</a></li>
										<li><a href="#">Subdropdown Option</a></li>
										<li><a href="#">Subdropdown Option</a></li>
										<li><a href="#">Subdropdown Option</a></li>
									</ul>
								</li>
								<li><a href="#">Dropdown Option</a></li>
								<li><a href="#">Dropdown Option</a></li>
								<li class="divider"></li>
								<li><label>Section Name</label></li>
								<li><a href="#">Dropdown Option</a></li>
								<li><a href="#">Dropdown Option</a></li>
								<li><a href="#">Dropdown Option</a></li>
								<li class="divider"></li>
								<li><a href="#">See all &rarr;</a></li>
							</ul>
						</li>
						<li class="divider"></li>
						<li class="has-dropdown">
							<a href="#">Main Item 2</a>
							<ul class="dropdown">
								<li><a href="#">Dropdown Option</a></li>
								<li><a href="#">Dropdown Option</a></li>
								<li><a href="#">Dropdown Option</a></li>
								<li class="divider"></li>
								<li><a href="#">See all &rarr;</a></li>
							</ul>
						</li>
					</ul>
				</section>
			</nav>

			<hr>
			<h4 id="icon-bar">Icon bar</h4>
			<div class="icon-bar five-up" role="navigation"> 
			  <a class="item" role="button" tabindex="0" aria-label="home"> 
			    <i class="fa fa-home"></i> 
			    <label id="home">Home</label>
			  </a> 
			  <a class="item" role="button" tabindex="0" aria-label="Bookmark"> 
			    <i class="fa fa-fw fa-bookmark"></i> 
			    <label id="bookmark">Bookmark</label>
			  </a> 
			  <a class="item" role="button" tabindex="0" aria-label="Information"> 
			    <i class="fa fa-fw fa-info-circle"></i> 
			    <label id="information">Information</label>
			  </a> 
			  <a class="item" role="button" tabindex="0" aria-label="Mail"> 
			    <i class="fa fa-fw fa-envelope"></i> 
			    <label id="mail">Mail</label>
			  </a> 
			  <a class="item" role="button" tabindex="0" aria-label="Like"> 
			    <i class="fa fa-fw fa-thumbs-up"></i> 
			    <label id="like">Like</label>
			  </a> 
			</div>

			<hr>
			<h4 id="type">Type</h4>
			<h1>h1. This is a very large header.</h1>
			<h2>h2. This is a large header.</h2>
			<h3>h3. This is a medium header.</h3>
			<h4>h4. This is a moderate header.</h4>
			<h5>h5. This is a small header.</h5>
			<h6>h6. This is a tiny header.</h6>

			<h1 class="subheader">h1.subheader</h1>
			<h2 class="subheader">h2.subheader</h2>
			<h3 class="subheader">h3.subheader</h3>
			<h4 class="subheader">h4.subheader</h4>
			<h5 class="subheader">h5.subheader</h5>
			<h6 class="subheader">h6.subheader</h6>

			<p><br></p>
			<ul class="disc">
				<li>List item with a much longer description or more content.</li>
				<li>List item</li>
				<li>List item
				<ul>
					<li>Nested List Item</li>
					<li>Nested List Item</li>
					<li>Nested List Item</li>
				</ul>
				</li>
				<li>List item</li>
				<li>List item</li>
				<li>List item</li>
			</ul>

			<h5>Ordered lists are great for lists that need order, duh.</h5>
			<ol>
				<li>List Item 1</li>
				<li>List Item 2</li>
				<li>List Item 3</li>
			</ol>

			<h5>Definition lists are great for small block of copy that describe the header</h5>
			<dl>
				<dt>Definition List</dt>
				<dd>Definition Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam id dolor id nibh ultricies vehicula ut id elit.</dd>
			</dl>

			<h5>Blockquote</h5>
			<blockquote>I do not fear computers. I fear the lack of them. Maecenas faucibus mollis interdum. Aenean lacinia bibendum nulla sed consectetur.<cite>Isaac Asimov</cite></blockquote>

			<h5>Vcard</h5>
			<ul class="vcard">
				<li class="fn">Gaius Baltar</li>
				<li class="street-address">123 Colonial Ave.</li>
				<li class="locality">Caprica City</li>
				<li><span class="state">Caprica</span>, <span class="zip">12345</span></li>
				<li class="email"><a href="#">g.baltar@example.com</a></li>
			</ul>

			<hr>
			<h4 id="visibility-classes">Visibility Classes</h4>
			<h5 id="screen-size-visibility-control-show-">Screen Size Visibility Control (Show)</h5>
			<p>The following text should describe the screen size you&#39;re using:</p>
			<p class="panel">
				<strong class="show-for-small">You are on a small screen.</strong>
				<strong class="show-for-medium">You are on a medium screen.</strong>
				<strong class="show-for-medium-up">You are on a medium, large or xlarge screen.</strong>
				<strong class="show-for-medium-down">You are on a medium or small screen.</strong>
				<strong class="show-for-large">You are on a large screen.</strong>
				<strong class="show-for-large-up">You are on a large or xlarge screen.</strong>
				<strong class="show-for-large-down">You are on a large, medium or small screen.</strong>
				<strong class="show-for-xlarge">You are on a xlarge screen.</strong>
			</p>

			<h5 id="screen-size-visibility-control-hide-">Screen Size Visibility Control (Hide)</h5>
			<p>The following text should describe the screen size you aren&#39;t using:</p>
			<p class="panel">
				<strong class="hide-for-small-only">You are <em>not</em> on a small screen.</strong>
				<strong class="hide-for-medium-up">You are <em>not</em> on a medium, large, xlarge, or xxlarge screen.</strong>
				<strong class="hide-for-medium-only">You are <em>not</em> on a medium screen.</strong>
				<strong class="hide-for-large-up">You are <em>not</em> on a large, xlarge, or xxlarge screen.</strong>
				<strong class="hide-for-large-only">You are <em>not</em> on a large screen.</strong>
				<strong class="hide-for-xlarge-up">You are <em>not</em> on an xlarge screen and up.</strong>
				<strong class="hide-for-xlarge-only">You are <em>not</em> on an xlarge screen.</strong>
				<strong class="hide-for-xxlarge-up">You are <em>not</em> on an xxlarge screen.</strong>
			</p>

			<h5 id="orientation-detection">Orientation Detection</h5>
			<p>The following text should describe the device orientation you&#39;re using:</p>
			<p class="panel">
				<strong class="show-for-landscape">You are in landscape orientation.</strong>
				<strong class="show-for-portrait">You are in portrait orientation.</strong>
			</p>

			<h5 id="touch-detection">Touch Detection</h5>
			<p>The following text should describe if you&#39;re using a touch device:</p>
			<p class="panel">
				<strong class="show-for-touch">You are on a touch-enabled device.</strong>
				<strong class="hide-for-touch">You are not on a touch-enabled device.</strong>
			</p>

			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; // End the loop ?>
	</div>
</div>
<?php get_footer(); ?>
