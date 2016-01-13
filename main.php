<div  id="container">
    <main id="center" class="column">
        <article>

            <h1><?= $lang['HEADER_TITLE'] ?></h1>
            <p><script>generateText(50);</script></p>

        </article>								
    </main>

    <!--<hr>-->
    <?php
    $dbc = dbc::instance();
    $result = $dbc->prepare("SELECT * FROM genre ");
    $rows = $dbc->executeGetRows($result);
    ?><nav id="left" class="column">
        <h3><?= $lang['MENU_HOME'] ?>:</h3>
        <ul>
            <?php
            if (count($rows)) {
                foreach ($rows as $key => $value) {
                    ?>
                    <li><a href="category.php?id=<?= $value['id'] ?>"><?= $value['name'] ?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
        <h3><?= $lang['MENU_LANG'] ?>:</h3>
        <ul>
            <li><a href="index.php?lang=pl">Polski</a></li>
            <li><a href="index.php?lang=es">Hiszpanski</a></li>
            <li><a href="index.php?lang=en">Angielski</a></li>
        </ul>
        <h3>Zabawy z javascript</h3>
        <form name="dateform" action="post">
            <input type="text" name="date" size=10>
        </form>

        <form name="z">
            <input name="textdisplay" type="text" SIZE=22>
            <input name="doit" type="button" value = "Uruchom banner" onClick = "doIt()"> 
        </form>
        <a href="#" onclick="innerDate(this);
                return false;">Wstaw dzien</a>
        <span id="time"></span>


        <FORM NAME=highlight onMouseover="highlightButton('start')" onMouseout="highlightButton('end')">
            <INPUT TYPE="button" VALUE="Button DHTMLOWY" onClick="location.href = '#'"> 
        </FORM>
    </nav>
    <div id="right" class="column">
        <h3>Co u nas nowego</h3>
        <p><script>generateText(1);</script></p>
        <p id="test" class="fail">Niestety twoja przegladarka  nie wspiera własciwosci hidden htmla5. Użyteczne kiedy chcesz szybko  ukryc cos <code>element.hidden</code>. No niestety, wroc do CSS.</p>
        <script>
            document.getElementById('test').hidden = true;
        </script>
        
        
        <div id="ajax" onclick="loadDoc();">Kliknij  aby wykonac ajax</div>
    </div>
</div>