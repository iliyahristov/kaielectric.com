<?php
/**
 *  MenuFactoryTest.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   MenuFactoryTest.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       28.02.16
 */

namespace Component;

class RawFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'creates a wrapper that ignores anything inside' => array(
            'from' => "<raw><<LCG Program\TG LCG Coupon Code Default='246996'>></raw>",
            'to' => "<<LCG Program\TG LCG Coupon Code Default='246996'>>"
        ),
        'doesn\'t muck with stuff inside raw' => array(
            'from' => '<raw><%= test %></raw>',
            'to' => '<%= test %>'
        ),
        'can handle multiple raw tags' => array(
            'from' => '<h1><raw><%= test %></raw></h1><h2><raw>!!!</raw></h2>',
            'to' => '<h1><%= test %></h1><h2>!!!</h2>'
        ),
    );

}
