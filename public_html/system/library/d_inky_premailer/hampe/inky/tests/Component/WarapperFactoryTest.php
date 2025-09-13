<?php
/**
 *  CenterFactoryTest.php
 *
 *
 *  @license    see LICENSE File
 *  @filename   CenterFactoryTest.php
 *  @package    inky-parse
 *  @author     Thomas Hampe <github@hampe.co>
 *  @copyright  2013-2016 Thomas Hampe
 *  @date       13.03.16
 */ 


namespace Component;


class WrapperFactoryTest extends AbstractComponentFactoryTest
{
    protected $testCases = array(
        'creates a wrapper that you can attach classes to' => array(
            'from' =>   '<wrapper class="header"></wrapper>',
            'to' =>     '
                        <table class="wrapper header" align="center">
                            <tr>
                              <td class="wrapper-inner"></td>
                            </tr>
                        </table>
                        '
        )
    );
}
