<?php

require __DIR__.'/config_with_app.php';

$app->navbar->configure(ANAX_APP_PATH . 'config/navbar_me.php');
$app->theme->configure(ANAX_APP_PATH . 'config/theme_me.php');

$app->router->add('', function() use ($app) {
    
    $app->theme->setTitle("Min Me-sida");
    
    $content = $app->fileContent->get('me.md');
    //$content = $app->textFilter->doFilter($content, 'shortcode markdown');
    
    $byline = $app->fileContent->get('byline.md');
    //$byline = $app->textFilter->doFilter($byline, 'shortcode, markdown');
    
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline,
    ]);
});

$app->router->add('redovisning', function() use ($app) {
    
    $app->theme->setTitle("Redovisning");
    
    $content = $app->fileContent->get('redovisning.md');
    $byline = $app->fileContent->get('byline.md');
    
    $app->views->add('me/page', [
        'content' => $content,
        'byline' => $byline
    ]);    
});

$app->router->add('source', function() use ($app) {
    $app->theme->setTitle("Källkod");
    $app->views->add('me/source');
});



$app->router->handle();
$app->theme->render();

?>