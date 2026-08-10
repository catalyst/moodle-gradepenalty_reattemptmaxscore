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

namespace gradepenalty_reattemptmaxscore;

use cm_info;
use context_course;
use context_module;
use context_system;
use core_grades\penalty_container;

/**
 * Penalty plugins must override this class to implement their own penalty calculation.
 *
 * @package   gradepenalty_reattemptmaxscore
 * @author     Sumaiya Javed <sumaiya.javed@catalyst.net.nz>
 * @copyright  Catalyst IT
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class penalty_calculator extends \core_grades\penalty_calculator {
    /**
     * Calculate the penalty for the given activity.
     *
     * @param penalty_container $container The penalty container.
     */
    public static function calculate_penalty(penalty_container $container): void {
        // Calculate the deducted grade based on the max grade.
        $gradeitem = $container->get_grade_item();
        $modinfo = get_fast_modinfo($gradeitem->courseid);
        $cm = $modinfo->instances[$gradeitem->itemmodule][$gradeitem->iteminstance];
        $maxscorepercentage = self::get_penalty_from_rules($cm, $container->get_submission_date(), $container->get_due_date());
        if ($maxscorepercentage == 0) {
            $deductedgrade = 0;
        } else {
            $currentgrade = $container->get_grade_before_penalties();
            $grademax = $container->get_max_grade();
            // Convert the max score percentage cap to actual points.
            $maxscore = ($maxscorepercentage / 100) * $grademax;
            // Deduct points so grade is capped at maxscore; zero if already within cap.
            $deductedgrade = max(0.0, $currentgrade - $maxscore);
        }
        $container->aggregate_penalty($deductedgrade);
    }

    /**
     * Get the penalty percentage from the most appropriate penalty rule based on the initialattempt and current attemptnumber.
     *
     * @param cm_info $cm The course module object.
     * @param int $initialattempt The first attempt number.
     * @param int $attemptnumber The number of submission attempt.
     * @return float the deducted percentage.
     */
    public static function get_penalty_from_rules(cm_info $cm, int $initialattempt, int $attemptnumber): float {
        // Get the difference between the initialattempt and current attemptnumber.

        $diff = $attemptnumber - $initialattempt;
        // Return if the first attempt then no penalty.
        if ($diff <= 0) {
            return 0;
        }

        // Get all penalty rules, ordered by the highest penalty first.
        $penaltyrules = self::find_effective_penalty_rules($cm);

        // Return if there are no penalty rules.
        if (empty($penaltyrules)) {
            return 0;
        }

        // Return the first applicable penalty rule.
        foreach ($penaltyrules as $penaltyrule) {
            if ($diff <= $penaltyrule->get('reattemptby')) {
                return $penaltyrule->get('penalty');
            }
        }

        // Return the last penalty rule if the difference exceeds the reattemptby value of the last rule.
        $lastrule = end($penaltyrules);
        if ($diff > $lastrule->get('reattemptby')) {
            return $lastrule->get('penalty');
        }

        // Return if no penalty rule is applicable.
        return 0;
    }

    /**
     * Find effective penalty rule which will be applied the course module.
     *
     * @param cm_info $cm The course module object.
     * @return array
     */
    private static function find_effective_penalty_rules(cm_info $cm): array {
        // Course module context id.
        $modulecontext = context_module::instance($cm->id);
        $coursecontext = context_course::instance($cm->course);
        $systemcontext = context_system::instance();

        $contextids = [
            $modulecontext->id,
            $coursecontext->id,
            $systemcontext->id,
        ];

        // Get all penalty rules in one query.
        $select = 'contextid IN (?, ?, ?)';
        $penaltyrules = penalty_rule::get_records_select($select, $contextids, 'sortorder');

        // Filter the penalty rules based on the context hierarchy.
        foreach ($contextids as $contextid) {
            $rules = array_filter($penaltyrules, function ($penaltyrule) use ($contextid): bool {
                return (int) $penaltyrule->get('contextid') === (int) $contextid;
            });

            if (!empty($rules)) {
                return $rules;
            }
        }

        return [];
    }
}
