<?php
// cabecera de la pagina
include "includes/header.php";
?>

<h1>Welcome to Snippedia</h1>
<p>
    Snippedia is a free Enciclopedia where you can upload, search and edit
    hundreds of code Snippets.
</p>

<h3>Where to start?</h3>
<?php
if (isset($_SESSION["currentUser"])) {
    // si hay sesión iniciada mostramos enlace al perfil
    echo("<a href='profile.php'>Your profile</a> <br>");
} else {
    // si no, mostramos enlace al login y al signup
    echo("<a href='formulario_login.php'>Click here if you want to login.</a> <br>");
    echo("<a href='formulario_registro.php'>Don't have an account yet?</a> <br>");
}
?>
<a href="formulario_post.php">Submit a new Snippet!</a> <br>

<h2>Snippet making tutorial</h2>

<p>
    Use Markdown syntax to make beautifully formatted Snippets.
</p>

<div class="tab">
  <button class="tablinks" onclick="openTab(event, 'text')" id="defaultOpen">Text</button>
  <button class="tablinks" onclick="openTab(event, 'lists')">Lists</button>
  <button class="tablinks" onclick="openTab(event, 'images')">Images</button>
  <button class="tablinks" onclick="openTab(event, 'header-quotes')">Headers & Quotes</button>
  <button class="tablinks" onclick="openTab(event, 'code')">Code</button>
  <button class="tablinks" onclick="openTab(event, 'tables')">Tables</button>
  <button class="tablinks" onclick="openTab(event, 'extras')">Extras</button>
</div>

<div id="text" class="tabcontent">
    <div class="markdown-text">
        <pre>It's very easy to make some words **bold** and other words *italic* with Markdown. You can even [link to Google!](http://google.com)</pre>
    </div>
    <div class="markdown-preview">
        It's very easy to make some words <strong>bold</strong> and other words <em>italic</em> with Markdown. You can even <a href="http://google.com">link to Google!</a>
    </div>
</div>

<div id="lists" class="tabcontent">
    <div class="markdown-text">
    <pre>
Sometimes you want numbered lists:

1. One
2. Two
3. Three

Sometimes you want bullet points:

* Start a line with a star
* Profit!

Alternatively,

- Dashes work just as well
- And if you have sub points, put two spaces before the dash or star:
  - Like this
  - And this
    </pre>
    </div>
    <div class="markdown-preview">
        <p>Sometimes you want numbered lists:</p>
        <ol>
            <li>One</li>
            <li>Two</li>
            <li>Three</li>
        </ol>
        <p>Sometimes you want bullet points:</p>
        <ul>
            <li>Start a line with a star</li>
            <li>Profit!</li>
        </ul>
        <p>Alternatively,</p>
        <ul>
            <li>Dashes work just as well</li>
            <li>And if you have sub points, put two spaces before the dash or star:
                <ul>
                    <li>Like this</li>
                    <li>And this</li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div id="images" class="tabcontent">
    <div class="markdown-text">
        <pre>
If you want to embed images, this is how you do it:

![Image of Yaktocat](https://octodex.github.com/images/ironcat.jpg)</pre>
    </div>
    <div class="markdown-preview">
  <p>If you want to embed images, this is how you do it:</p>
  <p><img src="https://octodex.github.com/images/ironcat.jpg" alt="Image of Ironcat"></p>
    </div>
</div>

<div id="header-quotes" class="tabcontent">
    <div class="markdown-text">
        <pre>
# Structured documents

Sometimes it's useful to have different levels of headings to structure your documents. Start lines with a `#` to create headings. Multiple `##` in a row denote smaller heading sizes.

### This is a third-tier heading

You can use one `#` all the way up to `######` six for different heading sizes.

If you'd like to quote someone, use the > character before the line:

> Coffee. The finest organic suspension ever devised... I beat the Borg with it.
> - Captain Janeway</pre>
    </div>
    <div class="markdown-preview">
        <h1>Structured documents</h1>

        <p>Sometimes it’s useful to have different levels of headings to structure your documents. Start lines with a <code>#</code> to create headings. Multiple <code>##</code> in a row denote smaller heading sizes.</p>

        <h3>This is a third-tier heading</h3>

        <p>You can use  one <code>#</code> all the way up to <code>######</code> six for different heading sizes.</p>

        <p>If you’d like to quote someone, use the &gt; character before the line:</p>

        <blockquote><p>Coffee. The finest organic suspension ever devised… I beat the Borg with it.
            - Captain Janeway</p></blockquote>
        </div>
</div>

<div id="code" class="tabcontent">
    <div class="markdown-text">
        <pre>
If you have inline code blocks, wrap them in backticks: `var example = true`.  If you’ve got a longer block of code use code fencing (you can specify the syntax):

```javascript
if (isAwesome){
  return true
}
```</pre>
    </div>
    <div class="markdown-preview">
        <p>If you have inline code blocks, wrap them in backticks: <code>var example = true</code>.  If you’ve got a longer block of code use code fencing (you can specify the syntax):

<pre> <code>if (isAwesome){
    return true
}
</code></pre>
    </div>
</div>

<div id="tables" class="tabcontent">
    <div class="markdown-text">
<pre>
First Header | Second Header
------------ | -------------
Content from cell 1 | Content from cell 2
Content in the first column | Content in the second column
</pre>
    </div>
    <div class="markdown-preview">
        <table>
            <thead>
                <tr>
                    <th>First Header</th>
                    <th>Second Header</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Content from cell 1</td>
                    <td>Content from cell 2</td>
                </tr>
                <tr>
                    <td>Content in the first column</td>
                    <td>Content in the second column</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div id="extras" class="tabcontent">
    <div class="markdown-text">
<pre>
Tasks list:

- [x] This is a complete item
- [ ] This is an incomplete item</pre>
    </div>
    <div class="markdown-preview">
        <p>Tasks list:</p>

        <ul class="task-list">
            <li class="task-list-item">
            <input type="checkbox" class="task-list-item-checkbox" checked="" disabled=""> This is a complete item</li>
            <li class="task-list-item">
            <input type="checkbox" class="task-list-item-checkbox" disabled=""> This is an incomplete item</li>
        </ul>
    </div>
</div>
<?php
// pie de pagina
include "includes/footer.php";
?>
<script>
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
