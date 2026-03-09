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
$string['reattemptmaxscore:manage'] = 'Permission to manage reattempt maximum score rules';
$string['reattemptmaxscorerule'] = 'Maximum score rules';
$string['editreattemptmaxscorerule'] = 'Edit maximum score rules';
$string['error_reattemptby_abovevalue'] = 'The reattempt number must be lower than the number of the rule above ({$a}).';
$string['error_reattemptby_maxvalue'] = 'The reattempt number cannot be lower than {$a}.';
$string['error_reattemptby_minvalue'] = 'The reattempt number must be lower than or equal to {$a}.';
$string['error_penalty_abovevalue'] = 'The maximum score must be lower than the maximum score for the rule above ({$a}).';
$string['error_penalty_maxvalue'] = 'The maximum score cannot be lower than {$a}.';
$string['error_penalty_minvalue'] = 'The maximum score must be lower than or equal to {$a}.';
$string['existingrule'] = 'Existing rules';
$string['existingrule_help'] = '<p>Define rules to control the maximum score for reattempts.
Each rule applies to a specific reattempt, and the final rule acts as a fallback for any further attempts.</p>
<p>Example:</p>
<ul><li>Rule 1 → Reattempt: 1, Maximum score: 60
<li>Final rule → Maximum score: 50</li></ul>
<p>Result:</p>
<ul><li>First reattempt is capped at 60</li>
<li>Second and subsequent reattempts are capped at 50</li></ul>
<p>If only one rule is configured, it will apply to all reattempts.</p>';
$string['finalpenaltyrule'] = 'Final rule';
$string['finalpenaltyrule_help'] = '<p>The final rule acts as a fallback for any further attempts.</p>
<p>Example:</p>
<ul><li>Rule 1 → Reattempt: 1, Maximum score: 60</li>
<li>Final rule → Maximum score: 50</li></ul>
<p>Result:</p>
<ul><li>First reattempt is capped at 60</li>
<li>Second and subsequent reattempts are capped at 50</li></ul>
<p>If only one rule is configured, it will apply to all reattempts.</p>';
$string['insertrule'] = 'Insert below';
$string['reattemptby'] = 'Reattempt';
$string['reattemptby_help'] = 'The submission attempt number after the first attempt when the maximum score will apply.';
$string['reattemptby_label'] = 'Submission reattempt:';
$string['reattemptby_lastrow'] = '&gt {$a}';
$string['reattemptby_onerow'] = '&gt; 1';
$string['reattemptby_row'] = '&gt; {$a}';
$string['penalty'] = 'Maximum score';
$string['penalty_help'] = 'The maximum score that will be applied to submission reattempts.';
$string['penalty_label'] = 'Maximum score:';
$string['penaltyrule'] = 'Maximum score rules';
$string['penaltyrule_help'] = 'Apply score limit to an activity submission reattempts. This applies only to a reattempt and not to the first submission made.';
$string['penaltyrule_group'] = 'Rule {no}';
$string['penaltyrule_inherited'] = 'The maximum score rules in this context are inherited from a parent context. Click Edit to override the values.';
$string['penaltyrule_not_inherited'] = 'Click Edit to change or add rules.';
$string['penaltyrule_overridden'] = 'The maximum score rules are overridden. Click Reset to remove overridden rules. This will remove all rules if there is no rule in the parent context.';
$string['pluginname'] = 'Reattempt maximum score';
$string['privacy:metadata:gradepenalty_reattemptmaxscore_rule'] = 'Maximum score reattempt table';
$string['privacy:metadata:gradepenalty_reattemptmaxscore_rule:usermodified'] = 'User who modified the rule';
$string['resetconfirm'] = 'This will remove all rules in this context. Are you sure you want to continue?';
