#Instructions
#Pages are the individual pages on your website. You write them yourself and place them in the /source directory.

Pages are the individual pages on your website. You write them yourself and place them in the /source directory. Each page follows the following format
<pre>
\#my category (mandatory)
\#my description (optional)
content goes here
</pre>

The category is used to set the [Navbar], while the description will appear on the main page as a small blurb.

The page content may contain markdown, HTML, javascript, anything. There are also a few [macros|Macros] available.
<b>There are two mandatory sectiontitles: title and category.</b> Title is the page title and category is the category to be listed under on the navbar. Category navbar ordering is set in config.php. There is also the description sectiontitle which will display in index.html as well as the top of the page. The sectiontitle summary may be used in the same fashion as description except it will not be placed on the main page.
