Bootsygen is a simple application design documentatino framework that uses the Bootstrap front-end framework to display content.

#Steps:

1. Edit config.php
2. Write pages and place into source directory
3. Run command 
```
php builder.php
```

##Page
Pages are the individual pages on your website. You write them yourself and place them in the /source directory. Each page follow the following format
```php
sectiontitle{
section content
}
```
The page content may contain HTML, javascript, anything. There are also a few macros available.
<b>There are two mandatory sectiontitles: title and category.</b> Title is the page title and category is the category to be listed under on the navbar. Category navbar ordering is set in config.php. There is also the description sectiontitle which will display in index.html as well as the top of the page. The sectiontitle summary may be used in the same fashion as description except it will not be placed on the main page.

##Page Macros
Page macros were created because it's too ugly to have a lot of HTML code in the contents section. Macros are written in the following fashion
```php
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
