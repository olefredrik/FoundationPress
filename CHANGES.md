### Changelog for forked 

#### 0.1 (17/04/2014)

* Added the following hooks:
	* header.php
		* 'foundationPress_after_body' hooks directly after the opening body tag
		* 'foundationPress_layout_start' hooks directly after opening div .inner-wrap
		* 'foundationPress_after_header' hooks directly at the end of the header.php
		* 'foundationPress_before_content'
	* index.php
		* 'foundationPress_before_content' hooks before content loop
		* 'foundationPress_after_content' hooks after content loop
		* 'foundationPress_before_pagination' hooks after content loop but before pagination
	* page.php
		* 'foundationPress_before_content' hooks before content loop
		* 'foundationPress_after_content' hooks after content loop
		* 'foundationPress_page_before_entry_content' hooks after the_title but before the entry_content (only on pages!)
		* 'foundationPress_page_before_comments' hooks after content but before comments
		* 'foundationPress_page_after_comments' hooks after the comments
	* sidebar.php
		* 'foundationPress_before_sidebar' hooks before the widget area
		* 'foundationPress_after_sidebar' hooks right after the widget area
	* single.php
		* 'foundationPress_before_content' hooks before content loop
		* 'foundationPress_after_content' hooks after content loop
		* 'foundationPress_post_before_entry_content' hooks after the_title but before the entry_content (only on posts!)
		* 'foundationPress_post_before_comments' hooks after content but before comments
		* 'foundationPress_post_after_comments' hooks after the comments
	* footer.php
		* 'foundationPress_before_closing_body' hooks before the closing body tag. after wp_footer (to inject JS after other scripts)
		* 'foundationPress_before_footer' hooks before the foter widget area
		* 'foundationPress_after_footer' hooks after the footer widget area
		* 'foundationPress_layout_end' hooks before closing div of .inner-wrap
	* searchform.php
		* 'foundationPress_before_searchform' hooks before the form
		* 'foundationPress_searchform_top' hooks into the searchform on top
		* 'foundationPress_searchform_before_search_button' hooks into the searchform after all fields but before the "search" button
		* 'foundationPress_searchform_after_search_button' hooks at the end of the searchform
		* 'foundationPress_after_searchform' hooks after the search form
	* search.php
		* 'foundationPress_before_content' hooks before content loop
		* 'foundationPress_after_content' hooks after content loop
		* 'foundationPress_before_pagination' hooks after content loop but before pagination