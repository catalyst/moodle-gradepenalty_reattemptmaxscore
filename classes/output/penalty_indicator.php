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

namespace gradepenalty_reattemptmaxscore\output;

use core\output\renderer_base;

/**
 * Penalty indicator output class for reattemptmaxscore.
 *
 * @package    gradepenalty_reattemptmaxscore
 * @copyright  Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class penalty_indicator extends \core_grades\output\penalty_indicator {

    #[\Override]
    public function export_for_template(renderer_base $output): array {
        global $DB, $CFG;
        $context = parent::export_for_template($output);
        $gradeitem = $DB->get_record('grade_items', ['id' => $this->grade->itemid]);

        $cm = get_coursemodule_from_instance($gradeitem->itemmodule, $gradeitem->iteminstance);
        $contextid = \context_module::instance($cm->id)->id;
        $itemmodule = $gradeitem->itemmodule;
        $modulegrades = $CFG->prefix.$gradeitem->itemmodule ."_" . 'grades';
        $modulename = $itemmodule;
        if ($gradeitem->itemmodule == 'assign') {
            $modulename = 'assignment';
        }
        $sql = "SELECT max(attemptnumber) AS attemptnumber
        FROM $modulegrades  WHERE $modulename = ? AND userid = ?";
        $record = $DB->get_record_sql($sql, [
            $modulename => $gradeitem->iteminstance,
            'userid' => $this->grade->userid
        ]);
        $attemptnumber = $record->attemptnumber;
        $sql = "SELECT penalty FROM {gradepenalty_reattemptmaxscore_rule}
            WHERE reattemptby >= ? AND contextid = ? ORDER BY reattemptby LIMIT 1";
        $maxscore = $DB->get_field_sql($sql, [$attemptnumber + 1, $contextid]);
        if (empty($maxscore)) {
            $systemcontext = \context_system::instance();
            $maxscore = $DB->get_field_sql($sql, [$attemptnumber + 1, $systemcontext->id]);
        }

        $deductedmark = format_float($this->grade->deductedmark, $this->decimals);
        $finalgrade = $this->showfinalgrade ? format_float($this->grade->finalgrade , $this->decimals) : null;
        $grademax = $this->showgrademax ? format_float($this->grade->get_grade_max(), $this->decimals) : null;
        $icon = $this->penaltyicon ?: ['name' => 'i/risk_xss', 'component' => 'core'];
        $info = get_string('gradepenalty_indicator_info', 'gradepenalty_reattemptmaxscore', [
            'maxscore' => $maxscore,
            'deductedmark' => $deductedmark,
        ]);

        $context = [
            'penalty' => $deductedmark,
            'finalgrade' => $finalgrade,
            'grademax' => $grademax,
            'icon' => $icon,
            'info' => $info,
        ];

        return $context;
    }
}

