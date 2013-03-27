Bootsygen is a simple application design documentation framework that melds the Bootstrap front-end framework with documentation written in Markdown and HTML to display a beautiful software design that ugly interfaces like Javadoc or Doxygen simply cannot provide. There is no special format you have to follow, though it boasts quick-to-use macros for those inconveniently long syntax. You can easily transform existing markdown documentation into Bootsygen-styled documentation.

#Steps:

1. Create a directory to hold your Markdown and configuration files. All .md files will be parsed in this folder will be parsed.
2. Write your documentation and save as PageTitle.md. See [Pages](<Pages.html>) for more details.
3. While in the directory you created, run command
```
php path/to/builder.php config
```
this commmand generates the configuration file, config.php.
4. Open config.php and make the appropriate changes.
5. While in the directory you created, run command 
```
php path/to/builder.php
```
this command will build the page


##Page
Each page follows the following format
<pre>
#my category (mandatory)
#my description (optional)
content goes here
</pre>

The category is used to set the [Navbar](<Navbar.html>), while the description will appear on the main page as a small blurb as well as the top of the page itself.

The page content may contain markdown, HTML, javascript, anything. There are also a few [macros](<Macros.html>) available.
<b>There are two mandatory sectiontitles: title and category.</b> Title is the page title and category is the category to be listed under on the navbar. Category navbar ordering is set in config.php. There is also the description sectiontitle which will display in index.html as well as the top of the page. The sectiontitle summary may be used in the same fashion as description except it will not be placed on the main page.

##Page Macros
Page macros were created because it's too ugly to have a lot of HTML code in the contents section. Macros are written in the following fashion
```
$(MACRONAME,parameter1,parameter2,parameter3)
```

Note that the <b>macro must be on its own line</b>. Each macro has its own specified parameters.
The list of macros available are listed below.

<table>
<tr>
<th>Macro Name</th>
<th colspan="2">Parameters</th>
</tr>
<tr>
<td>IMG</td>
<td>image href</td>
<td>image alt</td>
</tr>
</table>

##Debugging
Any errors that may occur will be logged in the file log.out
