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

class InkyFactoryTest extends AbstractComponentFactoryTest {

    protected $testCases = array(
        'Case 1' => array(
            'from' => '<inky />',
            'to' => '<tr><td><img src="https://raw.githubusercontent.com/arvida/emoji-cheat-sheet.com/master/public/graphics/emojis/octopus.png" /></td></tr>'
        ),
        'Case 2' => array(
            'from' => '<inky></inky>',
            'to' => '<tr><td><img src="https://raw.githubusercontent.com/arvida/emoji-cheat-sheet.com/master/public/graphics/emojis/octopus.png" /></td></tr>'
        )
    );

}
