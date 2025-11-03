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
 * Strings for component 'gradepenalty_reattemptmaxscore', language 'en'.
 *
 * @package   gradepenalty_reattemptmaxscore
 * @author    Sumaiya Javed <sumaiya.javed@catalyst.net.nz>
 * @copyright Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['addrule'] = 'Add rule';
$string['deleteallrules'] = 'Delete all rules';
$string['reattemptmaxscore:manage'] = 'Permission to manage penalty rules';
$string['reattemptmaxscorerule'] = 'Penalty rules';
$string['editreattemptmaxscorerule'] = 'Edit penalty rules';
$string['error_reattemptby_abovevalue'] = 'The reattempt amount must be lesser than the amount for the rule above ({$a}).';
$string['error_reattemptby_maxvalue'] = 'The reattempt amount cannot be lesser than {$a}.';
$string['error_reattemptby_minvalue'] = 'The reattempt amount must be lesser than or equal to {$a}.';
$string['error_penalty_abovevalue'] = 'The penalty must be lesser than the penalty for the rule above ({$a}).';
$string['error_penalty_maxvalue'] = 'The penalty cannot be lesser than {$a}.';
$string['error_penalty_minvalue'] = 'The penalty must be lesser than or equal to {$a}.';
$string['existingrule'] = 'Existing rules';
$string['finalpenaltyrule'] = 'Final penalty rule';
$string['finalpenaltyrule_help'] = 'The final penalty rule specifies the penalty that is applied to submissions reattempt longer than for any other penalty rule.';
$string['insertrule'] = 'Insert below';
$string['reattemptby'] = 'Reattempts';
$string['reattemptby_help'] = 'The number after the first submission that the penalty will be applied.';
$string['reattemptby_label'] = 'Reattempt:';
$string['reattemptby_lastrow'] = '&ge; {$a}';
$string['reattemptby_onerow'] = 'All Reattempt maxscores';
$string['reattemptby_row'] = '&gt; {$a}';
$string['penalty'] = 'Maxscore';
$string['penalty_help'] = 'The penalty in percent that will be applied for Reattempt maxscores.';
$string['penalty_label'] = 'Penalty:';
$string['penaltyrule'] = 'Penalty rules';
$string['penaltyrule_group'] = 'Penalty rule {no}';
$string['penaltyrule_inherited'] = 'The penalty rules in this context are inherited from a parent context. Click Edit to override the values.';
$string['penaltyrule_not_inherited'] = 'Click Edit to change or add rules.';
$string['penaltyrule_overridden'] = 'The penalty rules are overridden. Click Reset to remove overridden rules. This will remove all rules if there is no rule in the parent context.';
$string['pluginname'] = 'Reattempt maxscore penalties';
$string['privacy:metadata:gradepenalty_reattemptmaxscore_rule'] = 'Grade penalty due date table';
$string['privacy:metadata:gradepenalty_reattemptmaxscore_rule:usermodified'] = 'User who modified the rule';
$string['resetconfirm'] = 'This will remove all rules in this context. Are you sure you want to continue?';
