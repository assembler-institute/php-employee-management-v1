
<?php

require('./src/library/jokesApi.php');

$joke = getProgrammingJoke();

echo "
    <div class='bubble'>
        <div class='joke-setup'>
        ". $joke['setup'] ."
        </div>
        <div class='joke-punchline'>
        ". $joke['punchline'] ."
        </div>
    </div>
";