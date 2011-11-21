<?php 
class UNL_Services_CourseApproval_Course_Activities implements Countable, Iterator
{
    protected $_xmlActivities;
    
    protected $_currentActivity = 0;
    
    function __construct(SimpleXMLElement $xml)
    {
        $this->_xmlActivities = $xml;
    }
    
    function current()
    {
        return $this->_xmlActivities[$this->_currentActivity];
    }
    
    function next()
    {
        ++$this->_currentActivity;
    }
    
    function rewind()
    {
        $this->_currentActivity = 0;
    }
    
    function valid()
    {
        if ($this->_currentActivity >= $this->count()) {
            return false;
        }
        return true;
    }
    
    function key()
    {
        return (string)$this->current()->type;
    }
    
    function count()
    {
        return count($this->_xmlActivities);
    }

    public static function getFullDescription($activity)
    { 
        switch ($activity) {
            case 'lec':
                return 'Lecture';
                break;
            case 'lab':
                return 'Lab';
                break;
            case 'quz':
                return 'Quiz';
                break;
            case 'rct':
                return 'Recitation';
                break;
            case 'stu':
                return 'Studio';
                break;
            case 'fld':
                return 'Field';
                break;
            case 'ind':
                return 'Independent Study';
                break;
            case 'psi':
                return 'Personalized System of Instruction';
                break;
        }
        throw new Exception('Unknown activity type! '.$activity);
    }
}