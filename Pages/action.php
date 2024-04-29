<?php

// action.php

include('function.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add' || $_POST["action"] == 'Update')
	{
		$output = array();

		$title = $_POST["title"];
		$author = $_POST["author"];
		$part_one = $_POST["p1"];
		$part_two = $_POST["p2"];
		$part_three = $_POST["p3"];
		$publish_date = $_POST["pdate"];
		$header = $_POST["header"];
		$image_link = $_POST["img"];

        if($title=="" || $author=="" || $part_one=="" || $part_two=="" || $part_three=="" || $publish_date=="" || $header=="" || $image_link=="")
        {
            if($title==""){
                $output["title_error"] = "Please fill the Title field...";
    
            }
            if($author==""){
                $output["author_error"] = "Please fill the Author Name field...";
            }
            if($part_one==""){
                $output["p1_error"] = "Please fill the First Part field...";
            }
            if($part_two==""){
                $output["p2_error"] = "Please fill the Second Part field...";
    
            }
            if($part_three==""){
                $output["p3_error"] = "Please fill the Thirs Part field...";
            }
            if($publish_date==""){
                $output["pdate_error"] = "Please fill the Publish Date field...";
            }
			if($header==""){
                $output["header_error"] = "Please fill the Header field...";
            }
            if($image_link==""){
                $output["image_link_error"] = "Please fill the Image Link field...";
            }

            echo json_encode($output);
        }

		else{
			$data = array(
				':title' => $title,
				':author' => $author,
				':part_one' => $part_one,
				':part_two' => $part_two,
				':part_three' => $part_three,
				':publish_date' => $publish_date,
				':header' => $header,
				':image_link' => $image_link
			);
	
			if($_POST['action'] == 'Add')
			{
				$query = "INSERT INTO news_table (TITLE, AUTHOR, PART_ONE, PART_TWO, PART_THREE, PUBLISH_DATE, HEADER, IMAGELINK) 
						  VALUES (:title, :author, :part_one, :part_two, :part_three, :publish_date, :header, :image_link)";
	
				$statement = $connect->prepare($query);
	
				if($statement->execute($data))
				{
					$output['success'] = '<div class="alert alert-success">New News Added</div>';
				}
	
				echo json_encode($output);
			}
	
			if($_POST['action'] == 'Update')
			{
				$id=$_POST["customer_id"];

				$query = "UPDATE news_table 
						  SET TITLE = :title, 
							  AUTHOR = :author, 
							  PART_ONE = :part_one, 
							  PART_TWO = :part_two, 
							  PART_THREE = :part_three, 
							  PUBLISH_DATE = :publish_date, 
							  HEADER = :header, 
							  IMAGELINK = :image_link 
						  WHERE ID = '".$id."'";
	
				$statement = $connect->prepare($query);
	
				if($statement->execute($data))
				{
					$output['success'] = '<div class="alert alert-success">News Updated</div>';
				}
	
				echo json_encode($output);
			}
		}
	}

	if($_POST['action'] == 'fetch')
	{
		$id=$_POST["id"];

		$query = "SELECT * FROM news_table WHERE ID = '".$_POST["id"]."'";

		$result = $connect->query($query);

		$data = array();

		foreach($result as $row)
		{
			$data['title'] = $row['TITLE'];
			$data['author'] = $row['AUTHOR'];
			$data['p1'] = $row['PART_ONE'];
			$data['p2'] = $row['PART_TWO'];
			$data['p3'] = $row['PART_THREE'];
			$data['pdate'] = $row['PUBLISH_DATE'];
			$data['header'] = $row['HEADER'];
			$data['img'] = $row['IMAGELINK'];
		}

		echo json_encode($data);
	}

	if($_POST['action'] == 'delete')
	{
		$query = "DELETE FROM news_table WHERE ID = '".$_POST["id"]."'";

		if($connect->query($query))
		{
			$output['success'] = '<div class="alert alert-success">News Deleted</div>';
		}

		echo json_encode($output);
	}
}


// carpooling handling

?>
