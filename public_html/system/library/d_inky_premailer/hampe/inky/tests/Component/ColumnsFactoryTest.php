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

class ColumnsFactoryTest extends AbstractComponentFactoryTest
{

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<columns small="3" large="5" class="test t123">Html</columns>',
            'to' => '<th class="columns test t123 small-3 large-5 last first"><table><tr><th>Html</th></tr></table></th>'
        ),
        'Case 2 (no small attribute)' => array(
            'from' => '<columns large="12">Html</columns>',
            'to' => '<th class="columns small-12 large-12 last first"><table><tr><th>Html</th></tr></table></th>'
        ),
        'Case 3 (no large attribute)' => array(
            'from' => '<div><columns>Html</columns><columns>Html</columns></div>',
            'to' => '<div><th class="columns small-12 large-6 first"><table><tr><th>Html</th></tr></table></th><th class="columns small-12 large-6 last"><table><tr><th>Html</th></tr></table></th></div>'
        ),
        'Case 4 (inside row)' => array(
            'from' => '<columns small="3" large="5"><row>Html</row></columns>',
            'to' => '<th class="columns small-3 large-5 last first"><table><tr><th><table class="row"><tbody><tr>Html</tr></tbody></table></th><th class="expander"></th></tr></table></th>'
        ),
        'Case 5 (no expander)' => array(
            'from' => '<columns small="3" large="5" no-expander><row>Html</row></columns>',
            'to' => '<th class="columns small-3 large-5 last first"><table><tr><th><table class="row"><tbody><tr>Html</tr></tbody></table></th></tr></table></th>'
        ),
        'Case 6 (no expander is false)' => array(
            'from' => '<columns small="3" large="5" no-expander="false"><row>Html</row></columns>',
            'to' => '<th class="columns small-3 large-5 last first"><table><tr><th><table class="row"><tbody><tr>Html</tr></tbody></table></th><th class="expander"></th></tr></table></th>'
        ),
        'Case 7 (valign)' => array(
            'from' => '<columns large="12" valign="top">Html</columns>',
            'to' => '<th valign="top" class="columns small-12 large-12 last first"><table><tr><th>Html</th></tr></table></th>'
        ),
        'Case 8 (classes)' => array(
            'from' => '<columns class="small-offset-8 hide-for-small">Html</columns>',
            'to' => '<th class="columns small-offset-8 hide-for-small small-12 large-12 last first"><table><tr><th>Html</th></tr></table></th>'
        ),
    );

}
