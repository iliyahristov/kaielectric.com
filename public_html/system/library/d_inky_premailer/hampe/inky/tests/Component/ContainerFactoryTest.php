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

class ContainerFactoryTest extends AbstractComponentFactoryTest
{

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<container class="class2 class-test">Html</container>',
            'to' => '<table class="container class2 class-test"><tbody><tr><td>Html</td></tr></tbody></table>'
        )
    );

}
