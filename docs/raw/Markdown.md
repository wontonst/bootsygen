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
<pre>
An [example](http://url.com/ "Title")
</pre>
Reference-style labels (titles are optional):
<pre>
An [example][id]. Then, anywhere
else in the doc, define the link:

[id]: http://example.com/  "Title"
</pre>

##IMAGES
Inline (titles are optional):
![alt text](/path/img.jpg "Title")
Reference-style:
![alt text][id]

[id]: /url/to/img.jpg "Title"
HEADERS
Setext-style:
Header 1
========

Header 2
--------
atx-style (closing #'s are optional):
# Header 1 #

## Header 2 ##

###### Header 6
LISTS
Ordered, without paragraphs:
1.  Foo
2.  Bar
Unordered, with paragraphs:
*   A list item.

    With multiple paragraphs.

*   Bar
You can nest them:
*   Abacus
    * ass
*   Bastard
    1.  bitch
    2.  bupkis
        * BELITTLER
    3. burper
*   Cunning
BLOCKQUOTES
> Email-style angle brackets
> are used for blockquotes.

> > And, they can be nested.

> #### Headers in blockquotes
> 
> * You can quote a list.
> * Etc.
CODE SPANS
`<code>` spans are delimited
by backticks.

You can include literal backticks
like `` `this` ``.
PREFORMATTED CODE BLOCKS
Indent every line of a code block by at least 4 spaces or 1 tab.
This is a normal paragraph.

    This is a preformatted
    code block.
HORIZONTAL RULES
Three or more dashes or asterisks:
---

* * *

- - - -
MANUAL LINE BREAKS
End a line with two or more spaces:
Roses are red,   
Violets are blue.