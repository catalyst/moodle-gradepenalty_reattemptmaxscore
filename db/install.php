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
 * Grade penalty reattemptmaxscore installation script.
 *
 * @package   gradepenalty_reattemptmaxscore
 * @author    Sumaiya Javed <sumaiya.javed@catalyst.net.nz>
 * @copyright Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use gradepenalty_reattemptmaxscore\penalty_rule;

/**
 * Create a default 0% penalty rule.
 */
function xmldb_gradepenalty_reattemptmaxscore_install(): void {
    // Default penalty rule.
    $rule = new penalty_rule();
    $rule->set('contextid', context_system::instance()->id);
    $rule->set('reattemptby', 1);
    $rule->set('penalty', 0);
    $rule->set('sortorder', 0);
    $rule->save();
}
