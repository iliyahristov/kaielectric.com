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

class BlockFactoryTest extends AbstractComponentFactoryTest
{

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<block-grid up="12">Html</block-grid>',
            'to' => '<table class="block-grid up-12"><tr>Html</tr></table>'
        ),
        'Case 2' => array(
            'from' => '<block-grid up="12" class="show-for-large">Html</block-grid>',
            'to' => '<table class="block-grid up-12 show-for-large"><tr>Html</tr></table>'
        )
    );

}
