<?php
/**
 * The Footer for our theme
 *
 *
 * @package PEER
 * @subpackage PEER
 * @since PEER 1.0
 */
?>
<div id="search">
    <button type="button" class="close">×</button>
    <form method="get"  id="searchform" action="<?php bloginfo('home'); ?>/">
        <input type="search" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-primary" id="searchsubmit" value="Search">Search</button>
    </form>
</div>
<footer>
	<div class="container ">
		<p class="copyrights pull-left">All content © Risk Made In Warsaw 2014</p>
		<p class="follow-us pull-right">Follow us: <a href="" class="fa-facebook fa"></a> <a href="" class="fa-twitter fa"></a> <a href="" class="fa-pinterest fa"></a> <a href="" class="fa-instagram fa"></a> </p></div>
</footer>

<script type="text/javascript">

    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
//    var disqus_shortname = 'mikiabtan'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
/*
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
*/
</script>
<?php wp_footer() ?>
</body>
</html>