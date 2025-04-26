<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViolationsSeeder extends Seeder
{
    public function run()
    {
        $generalBehaviorCategoryId = DB::table('offense_categories')->where('category_name', 'General Behavior')->value('id');
        $dressCodeCategoryId = DB::table('offense_categories')->where('category_name', 'Dress Code')->value('id');
        $roomRulesCategoryId = DB::table('offense_categories')->where('category_name', 'Room Rules')->value('id');
        $scheduleCategoryId = DB::table('offense_categories')->where('category_name', 'Schedule')->value('id');
        $equipmentCategoryId = DB::table('offense_categories')->where('category_name', 'Equipment')->value('id');
        $centerTaskingCategoryId = DB::table('offense_categories')->where('category_name', 'Center Tasking')->value('id');

        $lowId = DB::table('severities')->where('severity_name', 'Low')->value('id');
        $mediumId = DB::table('severities')->where('severity_name', 'Medium')->value('id');
        $highId = DB::table('severities')->where('severity_name', 'High')->value('id');
        $veryHighId = DB::table('severities')->where('severity_name', 'Very High')->value('id');
 
        DB::table('violations')->insert([
            // Low Severity - General Behavior
            ['violation_name' => 'Cooking in the kitchen for personal purposes and without the permission from the staff.', 'severity_id' => $lowId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['violation_name' => 'Placing things in the fire exit and using it as a passageway.', 'severity_id' => $lowId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['violation_name' => 'Speaking loudly, shouting and playing loud music inside the center.', 'severity_id' => $lowId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['violation_name' => 'Skipping a meal without a valid reason.', 'severity_id' => $lowId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['violation_name' => 'Hanging out on the rooftop.', 'severity_id' => $lowId, 'offense_category_id' => $generalBehaviorCategoryId],

            // Medium Severity - General Behavior
            ['name' => 'Disrespecting staff/students such as using foul languages, physical and verbal violence, bullying, backbiting, spreading gossip and name calling.', 'severity_id' => $mediumId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Organizing a party without permission from the education team.', 'severity_id' => $mediumId, 'offense_category_id' => $generalBehaviorCategoryId],

            // High Severity - General Behavior
            ['name' => 'Stealing personal belongings of fellow students, staff, and PN owned properties.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Destroying or damaging PN properties.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Smoking and vaping inside and outside the PN premises.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Engaging in gambling activities including E-gambling.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Downloading or possessing inappropriate content (e.g., pornographic).', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Drinking alcoholic beverages.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Using PN staff name for personal agenda.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Joining or creating any fraternity/sorority organization.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Having romantic relationships with fellow students and showing public displays of affection.', 'severity_id' => $highId, 'offense_category_id' => $generalBehaviorCategoryId],

            // Very High Severity - General Behavior
            ['name' => 'Being pregnant or impregnating someone.', 'severity_id' => $veryHighId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Using illegal drugs and engaging in substance abuse.', 'severity_id' => $veryHighId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Having intimate/sexual relationships between staff/teachers and students.', 'severity_id' => $veryHighId, 'offense_category_id' => $generalBehaviorCategoryId],
            ['name' => 'Having sexual relationship between fellow PN students.', 'severity_id' => $veryHighId, 'offense_category_id' => $generalBehaviorCategoryId],

            // Low Severity - Dress Code
            ['name' => 'Wearing heavy make-up except for special events and with moderation, provided that permission was given by the educators. Wearing earrings for the boy.', 'severity_id' => $lowId, 'offense_category_id' => $dressCodeCategoryId],
            ['name' => 'Dying hair with a bright color that does not match the natural hair.', 'severity_id' => $lowId, 'offense_category_id' => $dressCodeCategoryId],
            ['name' => 'Wearing inappropriate/unprofessional clothing (e.g., short shorts, miniskirt, spaghetti straps, see-through clothes, offensive prints, pajamas) and being topless for both boys and girls are forbidden.', 'severity_id' => $lowId, 'offense_category_id' => $dressCodeCategoryId],
            ['name' => 'Wearing PN t-shirt and school uniform outside specific activities..', 'severity_id' => $lowId, 'offense_category_id' => $dressCodeCategoryId],

            //Low Severity - Room Rules
            ['name' => 'Speaking loudly, shouting and playing loud music inside the center.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Posting or vandalism on the room walls.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Sleeping in another room other than the one assigned.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Not maintaining hygiene (e.g., bedsheets and pillow cases must be washed every two weeks).', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Not turning of lights, faucet and electric fan when not in use.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Not maintaining room cleanliness such as a dirty and smelly bathroom and comfort room, mirror and sink is not properly cleaned, trash or clutter on the floor, overflowing trash in trash bins, unorganized beds, and etc.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Hanging clothes on the windows and balcony.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
            ['name' => 'Bringing food or eating meals inside the room.', 'severity_id' => $lowId, 'offense_category_id' => $roomRulesCategoryId],
           
            //Medium Severity - Room Rules
            ['name' => 'Boys entering girls room or vice versa except for emergencies.', 'severity_id' => $mediumId, 'offense_category_id' => $roomRulesCategoryId],
           
            //Low Severity - Schedule
            ['name' => 'Not submitting grades every semester.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Hanging out on the rooftop.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Falsifying logout/login time.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Turning on the aircon beyond the prescribed schedule.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Not respecting staff schedules and approaching them at inappropriate times.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Not filling in the auto evaluation every month.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Staying out past the 10:00PM curfew.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Not following the visitation schedule for parents and relatives.', 'severity_id' => $lowId, 'offense_category_id' => $scheduleCategoryId],
           
            //Medium Severity - Schedule
            ['name' => 'Not following schedules given by the PN staff (class, tasks, activities, meals).', 'severity_id' => $mediumId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Not participating or missing in PN activities and University classes without valid reason.', 'severity_id' => $mediumId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Not respecting the going-out schedule.', 'severity_id' => $mediumId, 'offense_category_id' => $scheduleCategoryId],
            ['name' => 'Not surrendering phones, laptops, and other gadgets on scheduled time.', 'severity_id' => $mediumId, 'offense_category_id' => $scheduleCategoryId],

            //High Severity - Schedule
            ['name' => 'Going home without a valid reason (except for family emergencies like death or terminal illness).  Leaving the center without permission or a signed going-home waiver.', 'severity_id' => $highId, 'offense_category_id' => $scheduleCategoryId],
          
            //Medium Severity - Equipment
            ['name' => 'Plugging in USBs, external hard drives, or personal gadgets without permission.', 'severity_id' => $mediumId, 'offense_category_id' => $equipmentCategoryId],
         
            //High Severity - Equipment
            ['name' => 'Destroying or damaging PN properties.', 'severity_id' => $highId, 'offense_category_id' => $equipmentCategoryId],
            ['name' => 'Unauthorized use of PN-provide equipment. Downloading files, programs, or software in PN laptop without approval from the PN IT and training team. Browsing or accessing restricted websites and engaging in unauthorized online activities on PN/Personal equipment.', 'severity_id' => $highId, 'offense_category_id' => $equipmentCategoryId],
        
            //Medium Severity - Center Tasking
            ['name' => 'Not participating in general cleaning, center tasking and routines.', 'severity_id' => $mediumId, 'offense_category_id' => $centerTaskingCategoryId],       
            

        ]);
    }
}
