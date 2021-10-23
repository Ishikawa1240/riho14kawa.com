<div id="cover"></div>
<div id="cover2" class="close"></div>
<div id="particle1" class="particle no_trans"></div>
<div id="particle2" class="particle no_trans"></div>
<div id="particle3" class="particle no_trans"></div>
<?php
if( $_SERVER['SCRIPT_NAME'] == '/index.php' ){
    $about_link = '#about';
    $works_link = '#works';
}else{
    $about_link = '/about/';
    $works_link = '/#works';
}
?>
<header class="cf">
    <a href="/" id="lt" class="Futura Heavy">Riho Ishikawa<br><span>Portfolio site</span></a>
    <div id="nav_menu" class="Futura Medium">
        <a href="/about.php">About</a>
        <a href="<?php echo $works_link; ?>">Works</a>
        <a href="/contact.php">Contact</a>
    </div>
</header>
<div id="mode"></div>
