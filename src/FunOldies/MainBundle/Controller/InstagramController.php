<?php

namespace FunOldies\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InstagramController extends Controller
{
    public function snapwidget(){
        // snapwidget.com hashtags
        // ---- random local 
        $a = array(
                1 => "<p>#prescottcollege</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRjb2xsZWdlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                2 => "<p>#prescottaz</p><iframe src=\"http://snapwidget.com/sl/?h=cHJlc2NvdHRhenxpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                3 => "<p>#campverde</p><iframe src=\"http://snapwidget.com/sl/?h=Y2FtcHZlcmRlfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                4 => "<p>#verdevalley</p><iframe src=\"http://snapwidget.com/sl/?h=dmVyZGV2YWxsZXl8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                5 => "<p>#sedona</p><iframe src=\"http://snapwidget.com/sl/?h=c2Vkb25hfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                6 => "<p>#jeromeaz</p><iframe src=\"http://snapwidget.com/sl/?h=amVyb21lYXp8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
        );
        // -- random oldies
        $b = array(
                1 => "<p>#thebeatles</p><iframe src=\"http://snapwidget.com/sl/?h=dGhlYmVhdGxlc3xpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                2 => "<p>#sixties</p><iframe src=\"http://snapwidget.com/sl/?h=c2l4dHlzfGlufDEyNXwyfDN8fG5vfDV8bm9uZQ==\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                3 => "<p>#thesixties</p><iframe src=\"http://snapwidget.com/sl/?h=dGhlc2l4dGllc3xpbnwxMjV8MnwzfHxub3w1fG5vbmU=\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
                4 => "<p>#1960s</p><iframe src=\"http://snapwidget.com/sl/?h=MTk2MHN8aW58MTI1fDJ8M3x8bm98NXxub25l\" allowTransparency=\"true\" frameborder=\"0\" scrolling=\"no\" style=\"border:none; overflow:hidden; width:130px; height: 130px\" ></iframe>",
        );
        
        // generate random
        $randA = mt_rand(1,6);
        $randB = mt_rand(1,4);
        $display_blockA = $a[$randA];
        $display_blockB = $b[$randB];
        
        return array(
            $display_blockA,
            $display_blockB,
        );
    }
}
?>