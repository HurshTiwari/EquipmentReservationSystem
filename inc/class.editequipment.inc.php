<?php
//class of users
class equipment{
private $_db;
 
 public function __construct($db=NULL)
    {
        if(is_object($db))
        {
            $this->_db = $db;
        }
        else
        {
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->_db = new PDO($dsn, DB_USER, DB_PASS);
        }
    }
	


	 public function display()
    {
		$sql = $this->_db->query("SELECT count(*) as theCount FROM equipments") ;
		$row=$sql->fetchColumn();
	    if($row ==0 ) {
                echo "<h2> Error </h2>"
                    . "<p> No equipments added."
                    . "Add another equipment. </p>";
				return;
		}/*gets the number of equipments in the table*/
			
        
		/*Ok so here what I do is display equipments dynamically. For this I query my db and then generate the output row as div(s). Three images were required in a row so i did that and added a row break as required */
        if($sql = $this->_db->query("SELECT * FROM equipments")) {
            try{
			$i=0;
			$sql->setFetchMode(PDO::FETCH_ASSOC);
			while($row = $sql->fetch()){
				$eid=$row['id'];
				$name=$row['name'];
				$img=$row['image'];
				$desc=$row['description'];
				if($i%3==0)
				{
				echo '<div class="row">';
				}
				
				echo
						'<form role="form" action="editequipmentform.php" method="post"><div class="col-sm-6 col-md-4">'
							.'<a>'
							.'<input type="image" id="img" name ="img" class="img-responsive" src="'.$img.'" alt="Sorry! Can\'t load the image ">'
							.'<h3>'.$name.'</h3>'
							.'<p>'
							.'Description: '.$desc
							.'</p>'
							.'<input id="img_t" name="img_t" type="hidden" value="'.$img.'">'
							.'<input id="desc" name="desc" type="hidden" value="'.$desc.'">'
							.'<input id="ename" name="ename" type="hidden" value="'.$name.'">'
							.'<input id="eid" name="eid" type="hidden" value="'.$eid.'">'
						.'</a></form></div>';
				if(($i+1)%3==0)
				{
				echo "</div>";
				}
			
				$i++;
			}
			} catch(PDOException $e) {echo "<div>".$e->getMessage()."</div>";
				echo "<h2> Error </h2><p> Couldn't fetch from "
                . "equipment information into the database. </p>";
				return;
				}
			}
        else {
            return "<h2> Error </h2><p> Couldn't insert the "
                . "user information into the database. </p>";
        }
	}
	
	
	function close(){$this->_db=null;}
	
}
		
		
    

	
?>