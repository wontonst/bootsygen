#Miscellaneous
#The flavor of Markdown used may seem unconventional to people, so here are some of the common notations used in this flavor.

<!--<table>
<thead>
<th>
<tr>
<th>Action</th><th>Notation</th>
</tr>
</th>
</thead>
<tbody>
<tr>
<th>
Link
</th>
<th>
<pre>
click [here][ref]
click [here](<example.html> "mydescription")
[ref]: example.html
</pre>
</tr>
</tbody>
</table>
-->


##PHRASE EMPHASIS
<pre>
*italic*   **bold**
_italic_   __bold__
</pre>
##LINKS
Inline:
An ``[example](http://url.com/ "Title")``  
Reference-style labels (titles are optional):  
An ``[example][id]``. Then, anywhere
else in the doc, define the link:
<pre>
[id]: http://example.com/  "Title"
</pre>

##IMAGES
Inline (titles are optional):
<pre>
![alt text](/path/img.jpg "Title")
</pre>
Reference-style:
<pre>
![alt text][id]

[id]: /url/to/img.jpg "Title"
</pre>
HEADERS
Setext-style:
<pre>
Header 1
========

Header 2
--------
</pre>
atx-style (closing #'s are optional):
<pre>
# Header 1 #

## Header 2 ##

###### Header 6
</pre>
LISTS
<pre>
Ordered, without paragraphs:
1.  Foo
2.  Bar
</pre>
Unordered, with paragraphs:
<pre>
*   A list item.

    With multiple paragraphs.

*   Bar
</pre>
You can nest them:
<pre>
*   Abacus
    * aim
*   Botter
    1.  bitcoins
    2.  bollocks
        * BENIGN
    3. trollface
*   Catcher Freeman
</pre>
BLOCKQUOTES
<pre>
> Email-style angle brackets
> are used for blockquotes.

> > And, they can be nested.

> #### Headers in blockquotes
> 
> * You can quote a list.
> * Etc.
</pre>
CODE SPANS
<pre>`<code>`</pre> spans are delimited by backticks.

You can include literal backticks
like <pre>`` `this` ``</pre>.
PREFORMATTED CODE BLOCKS
Indent every line of a code block by at least 4 spaces or 1 tab.
<pre>
This is a normal paragraph.

    This is a preformatted
    code block.
</pre>
HORIZONTAL RULES
Three or more dashes or asterisks:-
<pre>
--

* * *

- - - -
</pre>
MANUAL LINE BREAKS
End a line with two or more spaces:
<pre>
Roses are red,   
Violets are blue.
</pre>