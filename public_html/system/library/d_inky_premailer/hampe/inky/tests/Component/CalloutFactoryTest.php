<?php
/**
 *  Test.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   Test.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       13.03.16
 */ 


namespace Component;


class Test extends AbstractComponentFactoryTest {
    protected $testCases = array(
        'creates a callout with correct syntax' => array(
            'from'  =>  '<callout>Callout</callout>',
            'to'    =>  '
                        <table class="callout">
                            <tr>
                              <th class="callout-inner">Callout</th>
                              <th class="expander"></th>
                            </tr>
                        </table>
                        '
        ),
        'copies classes to the final HTML' => array(
            'from'  =>  '<callout class="primary">Callout</callout>',
            'to'    =>  '
                        <table class="callout">
                            <tr>
                              <th class="callout-inner primary">Callout</th>
                              <th class="expander"></th>
                            </tr>
                        </table>
                        '
        )
    );
}
