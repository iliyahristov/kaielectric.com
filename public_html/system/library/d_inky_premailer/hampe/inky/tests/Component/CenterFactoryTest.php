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


class CenterFactoryTest extends AbstractComponentFactoryTest
{
    protected $testCases = array(
        'Applies a text-center class and center alignment attribute to the first child' => array(
            'from' =>   '
                        <center>
                            <div>Html</div>
                        </center>
                        ',
            'to' =>     '
                        <center>
                            <div align="center" class="float-center">Html</div>
                        </center>
                        '
        ),
        'Does not choke if center tags are nested' => array(
            'from' =>   '
                        <center>
                            <center></center>
                        </center>
                        ',
            'to' =>     '
                        <center>
                            <center align="center" class="float-center"></center>
                        </center>
                        '
        ),
        'applies the class float-center to <item> elements' => array(
            'from' =>   '
                        <center>
                            <menu>
                              <item href="#"></item>
                            </menu>
                        </center>
                        ',
            'to' =>     '
                      <center>
                        <table class="float-center menu" align="center">
                          <tr>
                            <td>
                              <table>
                                <tr>
                                  <th class="float-center menu-item">
                                    <a href="#"></a>
                                  </th>
                                </tr>
                              </table>
                            </td>
                          </tr>
                        </table>
                      </center>
                        '
        )
    );
}
