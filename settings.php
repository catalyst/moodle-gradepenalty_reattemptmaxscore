<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Site configuration settings for the gradepenalty_reattemptmaxscore plugin
 *
 * @package   gradepenalty_reattemptmaxscore
 * @author    Sumaiya Javed <sumaiya.javed@catalyst.net.nz>
 * @copyright Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core\url;

defined('MOODLE_INTERNAL') || die();

// New category for the plugin.
$ADMIN->add('gradepenalty', new admin_category('gradepenalty_reattemptmaxscore', new lang_string('pluginname', 'gradepenalty_reattemptmaxscore')));

$capabilities = ['gradepenalty/reattemptmaxscore:manage'];

if ($hassiteconfig || has_any_capability($capabilities, core\context\system::instance())) {

    // External page to manage the reattemptmaxscore rules.
    $temp = new admin_externalpage(
        'reattemptmaxscorerule',
        get_string('reattemptmaxscorerule', 'gradepenalty_reattemptmaxscore'),
        new url('/grade/penalty/reattemptmaxscore/manage_penalty_rule.php', ['contextid' => context_system::instance()->id]),
        'gradepenalty/reattemptmaxscore:manage'
    );

    // Add the external page to the plugin category.
    $ADMIN->add('gradepenalty_reattemptmaxscore', $temp);
}
