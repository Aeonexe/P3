<?php
/**
* @package   Master
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get warp
$warp = require(__DIR__.'/warp.php');

// get content from output buffer and set a slot for the template renderer
$warp['template']->set('content', ob_get_clean());

// load main theme file, located in /layouts/theme.php
echo $warp['template']->render('theme');


?>



            <!--Start of Zendesk Chat Script-->
            <script type="text/javascript">
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="//v2.zopim.com/?4LCI3sMtXryZaIvfEvUwrK9L36gt30M2";z.t=+new Date;$.
            type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
            </script>
            <!--End of Zendesk Chat Script-->
          
            	

<?php
