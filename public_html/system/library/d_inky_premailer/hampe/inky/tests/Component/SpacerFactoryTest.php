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


class SpacerFactoryTest extends AbstractComponentFactoryTest
{
    protected $testCases = array(
        'Creates a spacer element with correct size' => array(
            'from' =>   '<spacer size="10"></spacer>',
            'to' =>     '
                        <table class="spacer">
                            <tbody>
                              <tr>
                                <td height="10px" style="font-size:10px;line-height:10px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        '
        ),
        'creates a spacer with a default size or no size defined' => array(
            'from' =>   '<spacer></spacer>',
            'to' =>     '
                        <table class="spacer">
                            <tbody>
                              <tr>
                                <td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        '
        ),
        'creates a spacer element for small screens with correct size' => array(
            'from' =>   '<spacer size-sm="10"></spacer>',
            'to' =>     '
                        <table class="spacer hide-for-large">
                            <tbody>
                              <tr>
                                <td height="10px" style="font-size:10px;line-height:10px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        '
        ),
        'creates a spacer element for large screens with correct size' => array(
            'from' =>   '<spacer size-lg="20"></spacer>',
            'to' =>     '
                        <table class="spacer show-for-large">
                            <tbody>
                              <tr>
                                <td height="20px" style="font-size:20px;line-height:20px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        '
        ),
        'creates a spacer element for small and large screens with correct sizes' => array(
            'from' =>   '<spacer size-sm="10" size-lg="20"></spacer>',
            'to' =>     '
                        <table class="spacer hide-for-large">
                            <tbody>
                              <tr>
                                <td height="10px" style="font-size:10px;line-height:10px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        <table class="spacer show-for-large">
                            <tbody>
                              <tr>
                                <td height="20px" style="font-size:20px;line-height:20px;">&#xA0;</td>
                              </tr>
                            </tbody>
                        </table>
                        '
        ),
        'copies classes to the final spacer HTML' => array(
            'from' =>   '<spacer size="10" class="bgcolor"></spacer>',
            'to' =>     '
                          <table class="spacer bgcolor">
                            <tbody>
                              <tr>
                                <td height="10px" style="font-size:10px;line-height:10px;">&#xA0;</td>
                              </tr>
                            </tbody>
                          </table>
                        '
        ),
        '1.3.6.0 upgrade breaking nested spacers #6' => array(
            'from' =>  '<container>
                            <wrapper>
                                <row>
                                    <columns small="12" large="12">

                                        <spacer size="40"></spacer>

                                        <table>
                                            <tr>
                                                <th>
                                                    <spacer size="220"></spacer>
                                                </th>
                                            </tr>
                                        </table>

                                        <spacer size="40"></spacer>

                                    </columns>
                                </row>
                            </wrapper>
                        </container>',
            'to' => '<table class="container">
                        <tbody>
                            <tr>
                                <td>
                                    <table class="wrapper" align="center">
                                        <tr>
                                            <td class="wrapper-inner">
                                                <table class="row">
                                                    <tbody>
                                                        <tr>
                                                            <th class="columns small-12 large-12 last first">
                                                                <table>
                                                                    <tr>
                                                                        <th>
                                                                            <table class="spacer">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height="40px" style="font-size:40px;line-height:40px;">&#xA0;</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <table>
                                                                                <tr>
                                                                                    <th>
                                                                                        <table class="spacer">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td height="220px" style="font-size:220px;line-height:220px;">&#xA0;</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                            <table class="spacer">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height="40px" style="font-size:40px;line-height:40px;">&#xA0;</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>'
        )
    );
}
