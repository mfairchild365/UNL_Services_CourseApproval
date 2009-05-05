<?php 
chdir(dirname(dirname(dirname(__FILE__))));

require_once 'UNL/Autoload.php';

$page = UNL_Templates::factory('Fixed');

$page->addStyleDeclaration('
.course .subjectCode {background-color:#E7F0F9;margin-bottom:-1px;color:#818489;display:block;float:left;min-width:85px;text-align:center;}
.course .number {font-size:2.5em;padding:7px 0px;margin:0 5px 0 0;background-color:#E7F0F9;display:block;clear:left;float:left;font-weight:bold;min-width:85px;text-align:center;}
.course .title {font-size:1.5em; display:block; border-bottom:1px solid #C8C8C8;font-style:normal;font-weight:bold;margin-left:95px;}
.course .crosslistings {margin:4px 0 4px 95px;display:block;}
.course .crosslistings .crosslisting {font-size:1em;color:#C60203;background:none;}

.course .prereqs,
.course .notes,
.course .description {margin:4px 0;float:left;width:450px;}

.course .prereqs {color:#0F900A;font-weight:bold;}
.course .notes {font-style:italic;}
.course .description {border-left:3px solid #C8C8C8;padding-left:5px;}

.course .details {width:220px;border-collapse:collapse;right:0px;float:right;}
.course .details tr.alt td {border:1px solid #C9E2F6;border-right:none;border-left:none;background-color:#E3F0FF;}
.course .details td {}
.course .details .label {font-weight:bold;}
.course .details .value {text-align:right;}
dd {margin:0 0 3em 0;padding-left:0 !important;position:relative;overflow:hidden;}
dt {padding:3em 0 0 0 !important;}
.course {clear:both;}
');

$page->titlegraphic = '<h1>Undergraduate Bulletin</h1>
                       <h2>Your Academic Guide</h2>';
$page->doctitle = '<title>UNL | Undergraduate Bulletin</title>';
$page->breadcrumbs = '<ul>
    <li><a href="http://www.unl.edu/">UNL</a></li>
    <li>Undergraduate Bulletin</li></ul>';
$page->navlinks = '
<ul>
    <li>Academic Policies</li>
    <li>Achievement-Centered Education (ACE)</li>
    <li>Academic Colleges</li>
    <li>Areas of Study</li>
    <li>Courses</li>
</ul>
';
$page->leftRandomPromo = '';
$page->maincontentarea = '';
if (!isset($_GET['subject'])) {
    echo 'Enter a subject code';
    exit();
}


$subject = new UNL_Services_CourseApproval_SubjectArea($_GET['subject']);

$page->maincontentarea .= '<h1>There are '.count($subject->courses).' courses for '.$subject.'</h1>';

$page->maincontentarea .=  '<dl>';

foreach ($subject->courses as $course) {
    $listings = '';
    $crosslistings = '';
    foreach ($course->codes as $listing) {
        if ($listing->subjectArea == $subject->subject) {
            $listings .= $listing->courseNumber.'/';
        } else {
            $crosslistings .= '<span class="crosslisting">'.$listing->subjectArea.' '.$listing->courseNumber.'</span>, ';
        }
    }
    $listings = trim($listings, '/');
    $crosslistings = trim($crosslistings, ', ');
    
    $credits = '';
    if (isset($course->credits['Single Value'])) {
        $credits = $course->credits['Single Value'];
    }
    
    $page->maincontentarea .= "
        <dt class='course'>
            <span class='subjectCode'>{$subject->subject}</span>
            <span class='number'>$listings</span>
            <span class='title'>{$course->title}</span>";
        if (!empty($crosslistings)) {
            $page->maincontentarea .= '<span class="crosslistings">Crosslisted as '.$crosslistings.'</span>';
        }
        $page->maincontentarea .= "</dt>
        <dd class='course'>";
        $page->maincontentarea .= '<table class="details">';
        $page->maincontentarea .= '<tr class="credits">
                                    <td class="label">Credit Hours:</td>
                                    <td class="value">'.$credits.'</td>
                                    </tr>';
        $page->maincontentarea .= '<tr class="format alt">
                                    <td class="label">Course Format:</td>
                                    <td class="value"></td>
                                    </tr>';
        $page->maincontentarea .= '<tr class="campus">
                                    <td class="label">Campus:</td>
                                    <td class="value">'.implode(', ', $course->campuses).'</td>
                                    </tr>';
        $page->maincontentarea .= '<tr class="termsOffered alt">
                                    <td class="label">Terms Offered:</td>
                                    <td class="value">'.implode(', ', $course->termsOffered).'</td>
                                    </tr>';
        $page->maincontentarea .= '<tr class="deliveryMethods">
                                    <td class="label">Course Delivery:</td>
                                    <td class="value">'.implode(', ', $course->deliveryMethods).'</td>
                                    </tr>';
        $ace = @$course->aceOutcomes;
        $page->maincontentarea .= '<tr class="aceOutcomes alt">
                                    <td class="label">ACE Outcomes:</td>
                                    <td class="value">'.implode(', ', $ace).'</td>
                                    </tr>';
        $page->maincontentarea .= '</table>';
        $prereqs = @$course->prerequisite;
        if (!empty($prereqs)) {
            $page->maincontentarea .= "<p class='prereqs'>Prereqs: {$prereqs}</p>";
        }
        $notes = @$course->notes;
        if (!empty($notes)) {
            $page->maincontentarea .= "<p class='notes'>{$notes}</p>";
        }
        $page->maincontentarea .= "<p class='description'>{$course->description}</p>";
        
    $page->maincontentarea .= "</dd>";
}
$page->maincontentarea .= '</dl>';

echo $page;