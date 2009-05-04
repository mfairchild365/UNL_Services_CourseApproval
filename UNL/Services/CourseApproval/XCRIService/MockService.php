<?php 
class UNL_Services_CourseApproval_XCRIService_MockService implements UNL_Services_CourseApproval_XCRIService
{    
    public $xml_header = '<?xml version="1.0" encoding="UTF-8"?>
<courses xmlns="http://courseapproval.unl.edu/courses" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://courseapproval.unl.edu/courses /schema/courses.xsd">';
    
    public $xml_footer = '</courses>';
    
    public $mock_data = array();
    
    function __construct()
    {
        $this->mock_data['ENSC'] = <<<ENSC
  <course>
    <title>Energy in Perspective</title>
    <courseCodes>
      <courseCode type="home listing">
        <subject>ENSC</subject>
        <courseNumber>110</courseNumber>

      </courseCode>
    </courseCodes>
    <gradingType>letter grade only</gradingType>
    <dfRemoval>false</dfRemoval>
    <effectiveSemester>20082</effectiveSemester>
    <description>
      <div xmlns="http://www.w3.org/1999/xhtml">Scientific principles and historical interpretation to place energy use in the context of pressing societal, environmental and climate issues.</div>

    </description>
    <campuses>
      <campus>UNL</campus>
    </campuses>
    <deliveryMethods>
      <deliveryMethod>Classroom</deliveryMethod>
    </deliveryMethods>
    <termsOffered>

      <term>Fall</term>
    </termsOffered>
    <activities>
      <activity>
        <type>lec</type>
        <hours>3</hours>
      </activity>

    </activities>
    <credits>
      <credit type="Single Value">3</credit>
    </credits>
  </course>
ENSC;
        
        $this->mock_data['ACCT'] = <<<ACCT
<course>
    <title>Introductory Accounting I</title>
    <courseCodes>
      <courseCode type="home listing">
        <subject>ACCT</subject>
        <courseNumber>201</courseNumber>

      </courseCode>
    </courseCodes>
    <gradingType>letter grade only</gradingType>
    <dfRemoval>false</dfRemoval>
    <effectiveSemester>20101</effectiveSemester>
    <prerequisite>
      <div xmlns="http://www.w3.org/1999/xhtml">Math 104 with a grade of 'C' or better;  14 cr hrs at UNL with a 2.5 GPA.</div>

    </prerequisite>
    <notes>
      <div xmlns="http://www.w3.org/1999/xhtml">ACCT 201 is 'Letter grade only'.</div>
    </notes>
    <description>
      <div xmlns="http://www.w3.org/1999/xhtml">Fundamentals of accounting, reporting, and analysis to understand financial, managerial, and business concepts and practices. Provides foundation for advanced courses.</div>
    </description>
    <campuses>

      <campus>UNL</campus>
    </campuses>
    <deliveryMethods>
      <deliveryMethod>Classroom</deliveryMethod>
    </deliveryMethods>
    <termsOffered>
      <term>Fall</term>

      <term>Spring</term>
      <term>Summer</term>
    </termsOffered>
    <activities>
      <activity>
        <type>lec</type>
        <hours>3</hours>

      </activity>
    </activities>
    <credits>
      <credit type="Single Value">3</credit>
    </credits>
  </course>
  <course>
    <title>Honors: Introductory Accounting I</title>

    <courseCodes>
      <courseCode type="home listing">
        <subject>ACCT</subject>
        <courseNumber>201</courseNumber>
        <courseLetter>H</courseLetter>
      </courseCode>
    </courseCodes>

    <gradingType>unrestricted</gradingType>
    <dfRemoval>false</dfRemoval>
    <effectiveSemester>20081</effectiveSemester>
    <prerequisite>
      <div xmlns="http://www.w3.org/1999/xhtml">Good standing in the University Honors Program or by invitation; freshman standing; 3.5 GPA over at least 14 credit hours earned at UNL.</div>
    </prerequisite>
    <description>

      <div xmlns="http://www.w3.org/1999/xhtml">For course description, see ACCT 201.</div>
    </description>
    <campuses>
      <campus>UNL</campus>
    </campuses>
    <deliveryMethods>
      <deliveryMethod>Classroom</deliveryMethod>

    </deliveryMethods>
    <termsOffered>
      <term>Fall</term>
      <term>Spring</term>
      <term>Summer</term>
    </termsOffered>
    <activities>

      <activity>
        <type>lec</type>
      </activity>
    </activities>
    <credits>
      <credit type="Single Value">3</credit>
    </credits>
  </course>
ACCT;
        $this->mock_data['AECN'] = <<<AECN
  <course>
    <title>Agricultural Marketing in a Multinational Environment</title>
    <courseCodes>
      <courseCode type="home listing">
        <subject>AECN</subject>
        <courseNumber>425</courseNumber>
      </courseCode>
    </courseCodes>
    <gradingType>unrestricted</gradingType>
    <dfRemoval>false</dfRemoval>
    <effectiveSemester>20081</effectiveSemester>
    <prerequisite>
      <div xmlns="http://www.w3.org/1999/xhtml">9 hrs agricultural economics and/or economics or permission.</div>
    </prerequisite>
    <notes>
      <div xmlns="http://www.w3.org/1999/xhtml">Capstone course.</div>
    </notes>
    <description>
      <div xmlns="http://www.w3.org/1999/xhtml">Systems approach to evaluating the effects of current domestic and international political and economic events on agricultural markets.</div>
    </description>
    <campuses>
      <campus>UNL</campus>
    </campuses>
    <deliveryMethods>
      <deliveryMethod>Classroom</deliveryMethod>
    </deliveryMethods>
    <termsOffered>
      <term>Fall</term>
    </termsOffered>
    <activities/>
    <credits>
      <credit type="Single Value">3</credit>
    </credits>
  </course>
  <course>
    <title>Agricultural Marketing in a Multinational Environment</title>
    <courseCodes>
      <courseCode type="home listing">
        <subject>AECN</subject>
        <courseNumber>425</courseNumber>
      </courseCode>
    </courseCodes>
    <gradingType>unrestricted</gradingType>
    <dfRemoval>true</dfRemoval>
    <effectiveSemester>20091</effectiveSemester>
    <prerequisite>
      <div xmlns="http://www.w3.org/1999/xhtml">9 hrs agricultural economics and/or economics or permission.</div>
    </prerequisite>
    <notes>
      <div xmlns="http://www.w3.org/1999/xhtml">Capstone course.</div>
    </notes>
    <description>
      <div xmlns="http://www.w3.org/1999/xhtml">Systems approach to evaulating the effects of current domestic and international political and economic events on agricultural markets.</div>
    </description>
    <campuses>
      <campus>UNL</campus>
    </campuses>
    <deliveryMethods>
      <deliveryMethod>Classroom</deliveryMethod>
    </deliveryMethods>
    <termsOffered>
      <term>Fall</term>
    </termsOffered>
    <activities/>
    <credits>
      <credit type="Single Value">3</credit>
    </credits>
    <aceOutcomes>
      <slo>9</slo>
      <slo>10</slo>
    </aceOutcomes>
  </course>
AECN;
        $this->mock_data['CSCE'] = <<<CSCE
<course>
    <title>Special Topics in Computer Science</title>
    <courseCodes>
      <courseCode type="home listing">
        <subject>CSCE</subject>
        <courseNumber>196</courseNumber>

      </courseCode>
    </courseCodes>
    <gradingType>unrestricted</gradingType>
    <dfRemoval>false</dfRemoval>
    <effectiveSemester>20081</effectiveSemester>
    <prerequisite>
      <div xmlns="http://www.w3.org/1999/xhtml">Permission.</div>

    </prerequisite>
    <description>
      <div xmlns="http://www.w3.org/1999/xhtml">Aspects of computers and computing for computer science and computer engineering majors and minors. Topics vary.</div>
    </description>
    <campuses>
      <campus>UNL</campus>
    </campuses>
    <deliveryMethods>

      <deliveryMethod>Classroom</deliveryMethod>
    </deliveryMethods>
    <termsOffered>
      <term>Fall</term>
      <term>Spring</term>
      <term>Summer</term>
    </termsOffered>

    <activities/>
    <credits>
      <credit type="Lower Range Limit">1</credit>
      <credit type="Upper Range Limit">3</credit>
      <credit type="Per Semester Limit">6</credit>
    </credits>
  </course>
CSCE;
    }
    
    function getAllCourses()
    {
        return $this->xml_header.implode($this->mock_data).$this->xml_footer;
    }
    
    function getSubjectArea($subjectarea)
    {
        if (!isset($this->mock_data[$subjectarea])) {
            throw new Exception('Could not get data.');
        }
        
        return $this->xml_header.$this->mock_data[$subjectarea].$this->xml_footer;
    }
}
?>