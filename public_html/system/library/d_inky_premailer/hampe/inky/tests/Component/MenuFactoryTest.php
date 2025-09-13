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

class MenuFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'creates a menu with item tags inside' => array(
            'from'  =>  '
                        <menu>
                            <item href="http://zurb.com">Item</item>
                        </menu>
                        ',
            'to'    =>  '
                      <table class="menu">
                        <tr>
                          <td>
                            <table>
                              <tr>
                                <th class="menu-item"><a href="http://zurb.com">Item</a></th>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                        '
        ),
        'creates a menu with items tags inside, containing target="_blank" attribute' => array(
            'from'  =>  '
                        <menu>
                            <item href="http://zurb.com" target="_blank">Item</item>
                        </menu>
                        ',
            'to'    =>  '
                      <table class="menu">
                        <tr>
                          <td>
                            <table>
                              <tr>
                                <th class="menu-item"><a href="http://zurb.com" target="_blank">Item</a></th>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                        '
        ),
        'creates a menu with classes' => array(
            'from'  =>  '<menu class="vertical"></menu>',
            'to'    =>  '
                      <table class="menu vertical">
                        <tr>
                          <td>
                            <table>
                              <tr>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                        '
        ),
        'works without using an item tag' => array(
            'from'  =>  '
                        <menu>
                            <th class="menu-item"><a href="http://zurb.com">Item 1</a></th>
                        </menu>
                        ',
            'to'    =>  '
                        <table class="menu">
                            <tr>
                              <td>
                                <table>
                                  <tr>
                                    <th class="menu-item"><a href="http://zurb.com">Item 1</a></th>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                        </table>
                        '
        )
    );

}
