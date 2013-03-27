#Instructions
#Here's the fastest way to start using Bootsygen. You'll be up and documenting in no time at all!

Bootsygen is a simple application design documentation framework that melds the Bootstrap front-end framework with documentation written in Markdown and HTML to display a beautiful software design that ugly interfaces like Javadoc or Doxygen simply cannot provide. There is no special format you have to follow, though it boasts quick-to-use macros for those inconveniently long syntax. You can easily transform existing markdown documentation into Bootsygen-styled documentation.

#Steps:

1. Create a directory to hold your Markdown and configuration files. All .md files will be parsed in this folder will be parsed.
2. Write your documentation and save as PageTitle.md. See [Pages] for more details.
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
