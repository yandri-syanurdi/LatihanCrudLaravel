<?php

/**
 * I will work with PHP in Object Oriented manner which is more familiar to
 * my subscribers who are java/c#/dart/phyton people.
 * We start by creating a Constants class to hold our database constants
 */

 class Constants
 {
    //DATABASE DETAILS
    static $DB_SERVER="localhost";
    // static $DB_NAME="spacecraftsDB";
    //static $DB_NAME="spacecraftsdb";
	static $DB_NAME="yuli_database";
    static  $USERNAME="root";
    static $PASSWORD="";

    //STATEMENTS
    //static $SQL_SELECT_ALL="SELECT * FROM spacecraftsTB";
    //static $SQL_SELECT_ALL="SELECT * FROM spacecraftstb";
	static $SQL_SELECT_ALL="SELECT * FROM events";
 }

 //class Spacecrafts
 class Events
 {
     /*Let's create a connect method, It has the following roles:
       1. CONNECT TO DATABASES.
       2. RETURN CONNECTION OBJECT
    */
    public function connect()
    {
        //mysql is a class that Represents a connection between PHP and MYSQL database.
        $con=new mysqli(Constants::$DB_SERVER,Constants::$USERNAME,Constants::$PASSWORD,
        Constants::$DB_NAME);
        if($con->connect_error)
        {
            // echo "Unable To Connect"; - For debug
            return null;
        }else
        {
            // echo "Connected"; - For debug
            return $con;
        }
    }
    /*
    Let's create a seach method. It will
        1.SELECT FROM DATABASE based on a category
        1.SELECT FROM DATABASE.
    */
    public function search($query)
    {
        //Am filtering using multiple columns
        $sql="SELECT * FROM events WHERE nama LIKE '%$query%' OR 
        list_category LIKE '%$query%' OR harga LIKE '%$query%' ";

        //To filterer using a single column:
        //$sql="SELECT * FROM spacecraftstb WHERE name LIKE '%$query%' ";

        $con=$this->connect();
        if($con != null)
        {
            $result=$con->query($sql);
            if($result->num_rows > 0 )
            {
                //$spacecrafts=array();
				$events = array();
                while($row=$result->fetch_array())
                {
                    //array_push Pushes one or more elements onto the end of array
                    //array_push($spacecrafts, array("id"=>$row['id'], "name"=>$row['name'],
                    //"propellant"=>$row['propellant'], "destination"=>$row['destination'],
                    //"image_url"=>$row['image_url'], "technology_exists"=>$row['technology_exists']));
					
					
					
					array_push($events, array("id"=>$row['id'], "nama"=>$row['nama'],
                    "list_category"=>$row['list_category'], "tanggal"=>$row['tanggal'], "waktu"=>$row['waktu'],
                    "tempat"=>$row['tempat'], "harga"=>$row['harga'], "gambar"=>$row['gambar']));
                }

                //json encode Returns the JSON representation of a value
                print(json_encode(array_reverse($events)));
            }else 
            {
                print(json_encode(array("No item Found that matches the query: ".$query)));
            }  
            $con->close();
        }else{
            print(json_encode(array("PHP EXCEPTION: CAN'T CONNECT TO MYSQL. NULL CONNECTION.")));
        }
    }
    
    /**
     * Let's create a method to handle incoming request
     */

     public function handleRequest() {
         if($_SERVER['REQUEST_METHOD'] == 'POST'){
             //get category
             $query=$_POST['query'];
             //return data based on that category
             $this->search($query);
         } else {
             //return all categories
             $this->search("");
             //$this->search("v");
         }
     }
 }

 $events= new Events();
 $events->handleRequest();
 //end
 
 
