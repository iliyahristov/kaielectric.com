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

class RowFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<row class="class1 class2">Html</row>',
            'to' => '<table class="row class1 class2"><tbody><tr>Html</tr></tbody></table>'
        )
    );

}
