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

class MenuItemFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<item class="test" href="http://example.com/123">Html</item>',
            'to' => '<th class="menu-item test"><a href="http://example.com/123">Html</a></th>'
        ),
        'Case 2' => array(
            'from' => '<item class="test">Html</item>',
            'to' => '<th class="menu-item test"><a>Html</a></th>'
        ),
        'Case 3' => array(
            'from' => '<item class="test" href="http://example.com/123" target="_blank">Html</item>',
            'to' => '<th class="menu-item test"><a href="http://example.com/123" target="_blank">Html</a></th>'
        ),
    );

}
