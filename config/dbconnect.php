<?php
/*
*   Name: dbconnect.php
*   Purpose: class file used to connect and fetch data from database.
*   Author: Saurabh Mehta
*/
	
// connecting to the Filemaker Api
require_once ('filemakerapi/FileMaker.php');
//creating class		
class Database {
    var $database;
    var $host;
    var $username;
    var $password;
    var $connection;
    // function to initialize database variables
    public function initDB($db, $host, $user, $pass)
    {
        $this->database = $db;
        $this->host = $host;
        $this->username = $user;
        $this->password = $pass;
    }
    // function to connect database 
    public function connDB()
    {
        $this->connection = new FileMaker($this->database, $this->host, $this->username, $this->password);

        if (FileMaker::isError($this->connection)) {
            return false;
        }
    return true;
    }
    // function to add seminar to the database
    public function addSeminar($semiEvent,$title, $presentedBy,$date, $time)
    {   
        if(!$this->connDB()){
            return false;
        }
        $record = $this->connection->createRecord($semiEvent);
        $record->setField('title', $title);
        $record->setField('presentedBy', $presentedBy);
        $record->setField('date', $date);
        $record->setField('time', $time);
        $result = $record->commit();
        
        if (FileMaker::isError($result)) { 
            return false;
        } else {
            return true;
        }
    }
    // function to add attendee to the database
    public function addAttendee($attendee,$name, $contact,$id)
    {   
        if(!$this->connDB()){
            return false;
        }
        $record = $this->connection->createRecord($attendee);
        $record->setField('name', $name);
        $record->setField('contact', $contact);
        $record->setField('event_id', $id);
        $result = $record->commit();
        
        if (FileMaker::isError($result)) { 
            return false;
        } else {
            return true;
        }
    }

    // function to fetch seminar list from the database
    public function showSeminar($semiEvent)
    {   
        if(!$this->connDB()){
            return false;
        }
        $request = $this->connection->newFindAllCommand($semiEvent);
        $result = $request->execute();
        $records = $result->getRecords();
        if (FileMaker::isError($records)) {
            echo $records->getMessage();
            return false;
        } 
        return $result->getRecords();
    }
    //function to fetch attendee list from the database
    public function showAttendee($semiEvent,$id)
    {   
        if(!$this->connDB()){
            return false;
        }
        
        $request = $this->connection->newFindCommand($semiEvent);
        $request ->addFindCriterion('event_id', $id);
       // $request->setRange(0, 5);
        $result = $request->execute();
        $records = $result->getRecords();
        if (FileMaker::isError($records)) {
            echo $records->getMessage();
            return false;
        } 
        return $result->getRecords();
    }
    //function to fetch complete list of attendees
    public function completeAttendees($attendee)
    {   
        if(!$this->connDB()){
            return false;
        }
        $request = $this->connection->newFindAllCommand($attendee);
        $result = $request->execute();
        $records = $result->getRecords();
        if (FileMaker::isError($records)) {
            echo $records->getMessage();
            return false;
        } 
        return $result->getRecords();
    }
}
