<?php
/*
*   Name: dbconnect.php
*   Purpose: class file used to connect and fetch data from database.
*   Author: Saurabh Mehta
*/
	
	// connecting to the Filemaker Api
    require_once ('filemakerapi/FileMaker.php');
		
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
        public function addAttendee($attendee,$name, $contact)
        {   
            if(!$this->connDB()){
                return false;
            }
            $record = $this->connection->createRecord($attendee);
            $record->setField('name', $name);
            $record->setField('contact', $contact);
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
        public function showAttendee($attendee)
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
        //function to fetch data from both the layots by creating portal 
        public function portal($semiEvent, $id, $attendee)
        {
            if (!$this->connDB()) {
                $this->writeLog("Failed to fetch portal", $this->errorFile);
                return false;
            }
            $record = $this->connection->getRecordById($semiEvent, $event_id);
            if (FileMaker::isError($record)) {
                $this->writeLog("Unable to getRecordById", $this->errorFile);
                return false;
            }
            $this->writeLog("getRecordById method Successful", $this->logFile);
            $attendeeRecords = $record->getRelatedSet($attendee);
            if (FileMaker::isError($attendeeRecords)) {
                $this->writeLog("getRelatedSet was unsuccessful", $this->errorFile);
                return false;
            }
            return $attendeeRecords;
        } 
    }

        
      /*  public function findData($layout, $id)
        {   
            if(!$this->connDB()){
                return false;
            }
            $request = $this->connection->newFindCommand($layout);
            $request->addFindCriterion('cardId', $id);
            $result = $request->execute();
            $records = $result->getRecords();
            if (FileMaker::isError($records)) {
                echo $records->getMessage();
                return false;
            } 
            return $result->getRecords();
        }*/
        

       
        // function to delete the student data from database
       /* public function deleteCard($dataId)
        {   
            if(!$this->connDB()){
                return false;
            }
            $id = $dataId;
            $deleteRecord = $this->connection->newDeleteCommand('cardData', $id);
            $result = $deleteRecord->execute();
            header("Location: index.php");
        }*/
    